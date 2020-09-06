<?php
//login
session_start();
require("conn.php");



if(isset($_POST["btnOK"])){

    
    $Name=$_POST["txtUserName"];
    $Password=$_POST["txtPassword"];
    $Password=hash("sha256", $Password);


    //member
    $sql1="select * from member where name='$Name' and pwd='$Password'";
    require("conn.php");
    $result1=mysqli_query($link,$sql1);
    $row1=mysqli_fetch_assoc($result1);

   
    if($Name=$row1['name'] and $Password=$row1['pwd']){
       
        $_SESSION["mid2"]=$row1["mid"];
        $_SESSION["name2"]=$row1['name'];
        echo "<script> {window.alert('登入成功'); location.href='home.php'} </script>";
        exit(); 
    }
    else{


        echo "<script> {window.alert('未註冊，請先註冊'); location.href='sign.php'} </script>";
       
        exit();

    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<!-- css -->

<style type="text/css">
  
  html,body{
      height:100%;
  }
  body{
      background: rgb(95,181,241);
      background: linear-gradient(90deg, 
      rgba(95,181,241,1) 9%,
      rgba(177,233,237,1) 24%,
      rgba(217,169,234,1) 74%, 
      rgba(191,148,233,1) 86%);
      background-attachment:fixed;
      display:flex;
      justify-content:center;
      align-items:center;
      
  }
  h1{
      text-align:center;
      margin-top:-50px;
      margin-bottom:50px;
  }
  .login{
      width:900px;
      height:500px;
      background-color:white;
      border-radius: 10px;
      border:10px solid #fff;
      
     
      display:flex;
      justify-content:center;
      align-items:center;
      
     
  }
  #img img{
      width:200px;
      height:200px;
      border-radius: 50%;
      margin-left:80px;
      margin-top:30px;
      
  }
  #img h1{
     margin-top:30px; 
  }
  .form{
      font-family:'Noto Sans TC',sans-serif;
      width:400px;
      color:black;
  }
  .form h2{
      margin-bottom:50px;
      text-align:center;
      
  }
  .form .group{
      margin-bottom:30px;

  }
  .form label{
      line-height:2;
  }

  .form .btn-group{
      font-size:0;

  }
  .form .btn{
      font-size: 20px;
      border-radius: 5px;
      border: none;
      background-color: #6ab4fe;
      width: 190px;
      padding: 10px 0;
      color: #fff;
      margin-right:8px;
  }
  

</style>


<body>

    
<div>
        <div class="row">
            <div class="login">
                    <div class="col-sm-5"  id="img">
                        <img src="./image/banking2.jpg" alt="Italian Trulli"><br>
                        <h1>線上網銀系統</h1>
                       
                    </div>
                    <div class="col-sm-7" >
                        <form class="form" method="post">
                            <h2>會員登入</h2>
                            <div class="group">
                                <label for="user_id">帳號</label>
                                <input type="text" class="form-control" name="txtUserName" id="user_id" placeholder="請輸入帳號" required="required">
                            </div>
                            <div class="group">
                                <label for="user_password">密碼</label>
                                <input type="password" class="form-control" id="password" name="txtPassword" required="required" placeholder="密碼長度在6-30字元內，至少包含數字大小寫英文字母" required="required" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,30}$">
                                
                                <input type="checkbox" onclick="showpwd()">
                                <label for="password_show">顯示</label>
                            </div>
                            
                            <div class="btn-group">
                                <button type="submit"  class="btn" name="btnOK" >登入</button>
                            </div>  
                            <div class="btn-group">
                                <a href="sign.php" class="btn" style="text-decoration:none; color:white;" aria-hidden="true">註冊</a>
                            </div> 
                            
                        </form>
                    </div>
            </div>

        </div>
    </div>
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        function showpwd() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        }
    </script>
</body>

</html>