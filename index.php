<?php
//login
session_start();
require("conn.php");

if(isset($_POST["btnOK"])){


    $Name=$_POST["txtUserName"];
    $Password=$_POST["txtPassword"];
  
    //member
    $sql1="select * from member where name='$Name' and pwd='$Password'";
    require("conn.php");
    $result1=mysqli_query($link,$sql1);
    $row1=mysqli_fetch_assoc($result1);


    if($Name=$row1['name'] and $Password=$row1['pwd']){
       
        $_SESSION["mid"]=$row1["mid"];
        $_SESSION["name"]=$Name;
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
<link rel="stylesheet" href="style1.css">


<body>

    
    <div class="container">

        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <h1>登入</h1>
        <form method="post">
            <div class="form-group">
                <label >帳號</label>
                <input type="text" class="form-control" name="txtUserName"  aria-describedby="emailHelp" placeholder="請輸入帳號" required="required">
                
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">密碼</label>
                <input type="password" class="form-control" id="password" name="txtPassword" required="required" placeholder="密碼長度在6-30字元內，至少包含數字大小寫英文字母" required="required" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,30}$">
                <input type="checkbox" onclick="showpwd()">顯示<br><br>
            </div>
           

            

            <div class="row-md-6" >
                

                <button type="submit" class="btn btn-default btn-lg" name="btnOK" >
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 登入
                </button>

                <button type="reset" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 取消
                </button>

                <button type="reset" class="btn btn-default btn-lg" name="sign">
                    <a href="sign.php" class="glyphicon glyphicon-user" style="text-decoration:none;" aria-hidden="true">註冊</a>
                </button>
               
                

                
                
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
        } else {
            x.type = "password";
        }
        }
    </script>
</body>

</html>