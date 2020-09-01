<?php

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
        <h1>login</h1>
        <form method="post" action="login.php">
            <div class="form-group">
                <label >Name</label>
                <input type="text" class="form-control" name="txtUserName"  aria-describedby="emailHelp" placeholder="Enter your name" required="required">
                
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="txtPassword" placeholder="Enter password" required="required">
            </div>

            

            <div class="row-md-6" >
                

                <button type="submit" class="btn btn-default btn-lg" name="btnOK" >
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 登入
                </button>

                <button type="reset" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 取消
                </button>

                <button type="reset" class="btn btn-default btn-lg" id="sign">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 註冊
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


        
    </script>
</body>

</html>