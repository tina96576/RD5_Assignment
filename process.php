<?php
//存款或取款

session_start();
require("conn.php");

if(isset($_GET["logout"])){
  unset($_SESSION["name2"]);
  unset($_SESSION["mid2"]);
  
  header("location: index.php");
  exit();
}

if(!isset($_SESSION["name2"])){
    header("location:index.php");
}

$mid=$_SESSION["mid2"];
$name=$_SESSION["name2"];

// echo "mid".$mid."<br>";
// echo "name".$name;
$sql="SELECT * FROM process where mid=$mid ORDER BY cdate DESC limit 1";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($result);


//echo "sql".$row['mid'];

if(isset($_GET["id"])){ //home傳id=存款或提款
  $id=$_GET["id"];

  if($id=="存款"){
    $img_src="./image/deposit.png";
  }else{
    $img_src="./image/withdraw.png";
  }
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Register</title>
</head>
<body>
    <style type="text/css">
  
        html,body{
            height:100%;
        }
        body{
            background: rgb(95,174,241);
            background: radial-gradient(circle, rgba(95,174,241,1) 9%, rgba(61,127,201,1) 86%);
            background-attachment:fixed;
            display:flex;
            justify-content:center;
            align-items:center;
            
        }
     
        .login{
            width:500px;
            height:400px;
            background-color:white;
            border-radius: 10px;
            display:flex;
            justify-content:center;
            
        }
        .form{
            font-family:'Noto Sans TC',sans-serif;
            width:400px;
            color:black;
           
        }
        .form h2{
            margin-bottom:0px;
            margin-top:30px;
            color:black;
            text-align:center;
            font-weight:bold;
            
        }
        #fname{
            width:150px;
           
        }
        .form .group{
            margin-top:40px;
            padding-left:60px;
            font-size:20px;
        }
      
        .form .btn{
            margin-top:40px;
            font-size:20px;
            border-radius:5px;
            border:none;
            background-color:#6ab4fe;
            width:185px;
            padding:10px 0;
            color:#fff;

        }
        .form .btn + .btn{
            margin-left:20px;
        }

        
        h2{
            margin-bottom:20px;
            font-size:35px;
        }
        .form #sex{
            margin:10px;
        } 
        .form img{
            margin-top:-60px;
            padding:15px;
            border-radius: 50%;
            margin-left:140px;
            background:white;
        }

   </style> 
   <div>
        <div class="login">
            
            <form class="form" action="process.php?id=<?=$id?>" method="post">
                
                <img src="<?= $img_src ?>" height="130">
                <h2><?=$id?></h2><br>
               
                <div class="group">
                <label for="fname" id="money">金額：＄</label>
                <input type="text" id="fname" name="fname" pattern="^[1-9]|[1-9][0-9]*$">
                <label for="fname" id="money"> 元</label>
                </div> 

                <div >
                    <button type="submit" class="btn btn-default btn-lg" id="sign" name="btnok" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>確認</button>
                    <button type="reset" class="btn btn-default btn-lg" ><a href="home.php" class="glyphicon glyphicon-home"  style="text-decoration:none; color:white;" aria-hidden="true">回首頁</a></button> 
                </div>  

            </form>
        </div>
    </div>
</body>

</html>





  


