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

       
        if($row2["email"]==$Email and $row2["name"]==$Name and $row2["pwd"]==$Password1){
            echo "<script> {window.alert('已註冊，請重新登入'); location.href='index.php'} </script>";
            
        }else{
              
            $sql="insert into member(name,account,pwd,email,sex)values('$Name','$Account','$Password','$Email','$Sex')";       
            mysqli_query($link,$sql);
            echo "<script> {window.alert('註冊成功，請重新登入'); location.href='index.php'} </script>";
        }
        //echo $Name,$Password;
        
        
    }


?><!DOCTYPE html>
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

    
    <div class="container">

        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <h1>註冊</h1>
        <form method="post" action="">
            <div class="form-group">
                <label >姓名</label><input type="text" class="form-control" name="txtUserName"  placeholder="請輸入姓名" required="required"><br>
                <label>帳號</label><input type="text" class="form-control" name="txtAccount"   placeholder="請輸入帳號" required="required"><br>
                <label>密碼</label><input type="password" class="form-control" id="password" name="txtPassword" placeholder="密碼長度在6-30字元內，至少包含數字大小寫英文字母" required="required" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,30}$">
                <input type="checkbox" onclick="showpwd()">顯示<br><br>
                <!-- '@'前後可以是英文, 數字, 符號.或_或- -->
                <label>性別</label><input type="radio" name="sex" value="男">男<input type="radio" name="sex" value="女">女<br><br>
                <label>Email</label><input type="email" class="form-control" name="txtEmail"   placeholder="請輸入信箱" required="required"  pattern="/^([\w\.\-]){1,64}\@([\w\.\-]){1,64}$/"/><br> 
            </div>
          
            <div class="row-md-6" >
                <button type="submit" class="btn btn-default btn-lg" name="btnOK" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 註冊</button>
                <button type="reset" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 取消</button>
                <button type="reset" class="btn btn-default btn-lg" id="sign"><a href="index.php" class="glyphicon glyphicon-share-alt" style="text-decoration:none;" aria-hidden="true">登入頁</a></button> 
            </div>   
        </form>
        
        </div>
        <div class="col-md-3"></div>
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