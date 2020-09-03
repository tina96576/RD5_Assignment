<?php
//存款或取款

session_start();
require("conn.php");

if(isset($_GET["logout"])){
  unset($_SESSION["name"]);
  unset($_SESSION["mid"]);
  
  header("location: index.php");
  exit();
}

if(!isset($_SESSION["name"])){
    header("location:index.php");
}

$mid=$_SESSION["mid"];
$name=$_SESSION["name"];

// echo "mid".$mid."<br>";
// echo "name".$name;
$sql="SELECT * FROM process where mid=$mid ORDER BY cdate DESC limit 1";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($result);


//echo "sql".$row['mid'];

if(isset($_GET["id"])){ //home傳id=存款或提款
  $id=$_GET["id"];
  //echo $id;
}

if(isset($_POST["btnok"])){
  $money=$_POST['fname']; //輸入的金額
  $balance=$row['balance'];//餘額
  //echo $balance;
  if($balance==""){ //沒有紀錄
   
    if($id=='存款'){ //判斷存款or提款
      if($money>=1000){ //判斷下限存款金額
        $sql2="insert into process(mid,depositWithdraw,pmoney,balance)values('$mid','$id',$money,$money)";  
        mysqli_query($link,$sql2);   
        echo "<script> {window.alert('存款成功');} </script>";

      }else{
        echo "<script> {window.alert('存款金額請大於$1000元');} </script>";
      }
    }else{ //提款
      echo "<script> {window.alert('無存款資料，請先存款');location.href='home.php'} </script>";
    }
               
  }else{ //帳戶有紀錄
   
    if($id=='存款'){ //判斷存款or提款  
      if($money>=1000){//判斷提款下限金額

        $total=$balance+$money;
        $sql3="insert into process(mid,depositWithdraw,pmoney,balance)values('$mid','$id',$money,$total)";  
        mysqli_query($link,$sql3);   
        echo "<script> {window.alert('存款成功');location.href='home.php'} </script>";

      }else{
        echo "<script> {window.alert('存款金額請大於$1000元');} </script>";
      }
    }else{ //提款
      if($money>=1000 and $money<=30000){//判斷輸入的提款金額是否符合上下限值
        if($money<=$balance){ //判斷輸入金額是否超過餘額
          $sql4="insert into process(mid,depositWithdraw,pmoney,balance)values('$mid','$id',$money,($balance-$money))";  
          mysqli_query($link,$sql4);
          echo "<script> {window.alert('提款成功');location.href='home.php'} </script>";   
        }else{ //超過餘額
          echo "<script> {window.alert('超過餘額');} </script>";
        } 
      }else{//小於提款下限金額
        echo "<script> {window.alert('每日提款金額請介於1000~30000之間');} </script>";
      }
    }
  }  
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Process</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<style>
     .form-inline {
    position: absolute;
    right: 0px;
    width: 300px;
    padding:20px;
    margin-top:10px;
    }

</style>
<div class="container-fluid">
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand">Bank</a>
  <form class="form-inline" method="post"> 
    <p>用戶帳號：<?= $_SESSION['name']?><p>&nbsp; 
    <a href="home.php" class="btn btn-outline-primary my-2 my-sm-0" role="button" name="logout">回首頁</a>
  </form>
</nav>
  
  
  <div class="container-fluid">
    <!-- Control the column width, and how they should appear on different devices -->
    
    <h2><?=$id?></h2>



    <form action="process.php?id=<?=$id?>" method="post">
      <label for="fname">金額：＄</label>
      <input type="text" id="fname" name="fname"> 元<br>
      <input type="submit" name="btnok"value="確認">
      <input type="reset" value="取消">
    </form> 

  </div>
</div>

</body>
</html>








  


