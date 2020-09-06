<?php

session_start();
require("conn.php");

    if(isset($_POST["btnOK"])){
        
        $Name=$_POST["txtUserName"];
        $Account=$_POST["txtAccount"];
        $Password=$_POST["txtPassword"];
        $Password=hash("sha256", $Password);
        
       // echo $Password1;
        $Sex=$_POST["sex"];
        $Email=$_POST["txtEmail"];
    
  
        $sql2="select * from member where email='$Email'";
       
        $result2=mysqli_query($link,$sql2);
        $row2=mysqli_fetch_assoc($result2);

       
        if($row2["email"]==$Email and $row2["name"]==$Name){
            echo "<script> {window.alert('註冊失敗，該用戶已註冊'); location.href='index.php'} </script>";
            
        }else{
              
            $sql="insert into member(name,account,pwd,email,sex)values('$Name','$Account','$Password','$Email','$Sex')";       
            mysqli_query($link,$sql);
            echo "<script> {window.alert('註冊成功，請重新登入'); location.href='index.php'} </script>";
        }
        //echo $Name,$Password;
        
        
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>sign</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<!-- css -->
<link rel="stylesheet" href="style1.css">


<body>
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

  .login{
      width:500px;
      height:580px;
      background-color:white;
      border-radius: 10px;
      display:flex;
      justify-content:center;
      border-top-style:solid;
      border-width: 50px;
      border-color:#4682B4;
     
      
     
  }
  .form{
      font-family:'Noto Sans TC',sans-serif;
      width:400px;
      color:black;
     
  }
  .form h2{
      margin-bottom:0px;
      margin-top:-40px;
      color:whitesmoke;
      text-align:center;
      
  }
  .form .group{
      margin-bottom:15px;

  }
  .form label{
      line-height:2;
  }
  .form-control{
      width:100%;
      border:1px solid #aaa;
      line-height: 2;
      border-radius:5px;
  }
  .form .btn-group{
      font-size:0;

  }
  .form .btn{
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
  }
  .form #sex{
      margin:10px;
  } 

</style> 
<div>
  <div class="login">
      
      <form class="form" method="post">
          <h2>註冊會員</h2><br>
          <div class="group">
              <label for="user">姓名</label>
              <input type="text" id="user_id" class="form-control" name="txtUserName"  placeholder="請輸入姓名" required="required">
          </div>
          <div class="group">
              <label for="user_id">帳號</label>
              <input type="text" id="user_id" class="form-control" name="txtAccount"   placeholder="請輸入帳號" required="required">
          </div>
          <div class="group">
              <label for="user_password">密碼</label>
              <input type="password" class="form-control" id="password" name="txtPassword" required="required" placeholder="密碼長度在6-30字元內，至少包含數字大小寫英文字母" required="required" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,30}$">
              <input type="checkbox" onclick="showpwd()">顯示  
          </div>
          <div class="group">
              <label for="Email">信箱</label>
              <input type="email" class="form-control" name="txtEmail"   placeholder="請輸入信箱" required="required"  pattern="/^([\w\.\-]){1,64}\@([\w\.\-]){1,64}$/"/>
          </div>
          <div class="group">
              <label for="user_sex">性別</label>
              <input type="radio"  name="sex" id="sex" value="男">男
              <input type="radio"  name="sex" id="sex" value="女">女
          </div>
          <div >
              <button type="submit" class="btn btn-default btn-lg" id="sign" name="btnOK" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 註冊</button>
              <button type="reset" class="btn btn-default btn-lg" ><a href="index.php" class="glyphicon glyphicon-share-alt"  style="text-decoration:none; color:white;" aria-hidden="true">回登入頁</a></button> 
          </div>  

      </form>
  </div>
</div>
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
   
    <script>
        function showpwd() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            }else {
                x.type = "password";
            }
        }
    </script>
      
</body>
</html>