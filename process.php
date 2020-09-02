<?php
//存款或取款

session_start();
require("conn.php");

if(!isset($_SESSION["name"])){
    header("location:index.php");
}

$mid=$_SESSION["mid"];

$sql="SELECT * FROM process where mid=$mid ORDER BY cdate DESC limit 1";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($result);


if(isset($_GET["id"])){ //home傳id=存款或提款
  $id=$_GET["id"];
  //echo $id;
}

if(isset($_POST["btnok"])){
  $money=$_POST['fname']; //輸入的金額
  $balance=$row['balance'];//餘額

  if($balance==""){ //沒有餘額
    if($id=='存款'){ //判斷存款or提款
      $sql2="insert into process(mid,depositWithdraw,pmoney,balance)values('$mid','$id',$money,$money)";  
      mysqli_query($link,$sql2);   
      echo "<script> {window.alert('存款成功');} </script>";
    }else{ //提款
      echo "<script> {window.alert('無存款資料，請先存款');location.href='home.php'} </script>";
    }
               
  }else{ //帳戶有餘額
    if($id=='存款'){ //判斷存款or提款  
      $total=$balance+$money;
      $sql3="insert into process(mid,depositWithdraw,pmoney,balance)values('$mid','$id',$money,$total)";  
      mysqli_query($link,$sql3);   
      echo "<script> {window.alert('存款成功');} </script>";
    }else{ //提款
      if($money<$balance){ //判斷輸入金額是否超過餘額
        $sql4="insert into process(mid,depositWithdraw,pmoney,balance)values('$mid','$id',$money,($balance-$money))";  
        mysqli_query($link,$sql4);
        echo "<script> {window.alert('提款成功');} </script>";   
      }else{ //超過餘額
        echo "<script> {window.alert('餘額不足，請先存款');location.href='home.php'} </script>";
      } 
    }
  }  
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<style>

</style>
<div class="container-fluid">
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand">Navbar</a>
  <form class="form-inline" method="post"> 
    <a href="home.php" class="btn btn-outline-primary my-2 my-sm-0" role="button" name="logout">回首頁</a>
  </form>
</nav>
  
  
  <div class="container-fluid">
    <!-- Control the column width, and how they should appear on different devices -->
    
    <h2><?=$id?></h2>

    <form action="process.php?id=<?=$id?>" method="post">

      <label for="fname">金額：</label>
      <input type="text" id="fname" name="fname"><br>
      <input type="submit" name="btnok"value="確認">
      <input type="reset" value="取消">
    </form> 

  </div>
</div>

</body>
</html>








  


