<?php

session_start();


if(!isset($_SESSION["name2"])){
    header("location:index.php");
    echo 'no-name';
}

if(isset($_GET["logout"])){
    unset($_SESSION["name2"]);
    unset($_SESSION["mid2"]);
    
    header("location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Service</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    body{
       
        background: rgb(95,174,241);
        background: radial-gradient(circle, rgba(95,174,241,1) 9%, rgba(61,127,201,1) 86%);
    }
  
    .row{
        width:1200px;
    }


    #n2{
        -webkit-animation: slide-left 0.5s linear 0.3s both;
	    animation: slide-left 0.5s linear 0.3s both;

    }

    #n3{
        -webkit-animation: slide-left 0.5s linear 0.4s both;
	    animation: slide-left 0.5s linear 0.4s both;

    }

    #n4{
        -webkit-animation: slide-left 0.5s linear 0.5s both;
	    animation: slide-left 0.5s linear 0.5s both;

    }

    #n5{
        -webkit-animation: slide-left 0.5s linear 0.6s both;
	    animation: slide-left 0.5s linear 0.6s both;

    }

    @-webkit-keyframes slide-left {
        0% {
            -webkit-transform: translateX(1500px);
            transform: translateX(1500px);
        }
        100% {
            -webkit-transform: translateX(0px);
            transform: translateX(0px);
        }
    }
    @keyframes slide-left {
        0% {
            -webkit-transform: translateX(1500px);
            transform: translateX(1500px);
        }
        100% {
            -webkit-transform: translateX(0px);
            transform: translateX(0px);
        }
    }

    .thumbnail .btn{
        position: relative;
        border-radius: 20px;
        border:1px solid 2894FF;
        background-color:cornflowerblue;
        color:white;
        width:240px;
        height:50px;
        font-size:25px; 
        text-align:center; 
        padding-top:8px;
        margin-top:20px;
        
    }

    .thumbnail:hover{
        background-color: 		#C4E1FF;
    }

    .thumbnail .btn:hover{
        border:2px solid #000079;
    }

    .thumbnail img{
        margin-top:20px;
        margin-bottom:20px;
    }
    .thumbnail{
        margin-top:30px;
    }

    .container-fluid{
        border-top-style:solid;
        border-width: 20px;
        border-color:white;
    }

    .navbar{
        margin-top:-25px;
       
    }

    #logout{
        background-color: #E0E0E0;
        font-weight:bold;
    }
    h2{
        color:white;
        font-size:35px;
        text-align:center;
        font-weight:bold;
    }

</style>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" >Bank</a>
          </div>
          
          <ul class="nav navbar-nav">
            <li><a>用戶帳號：<?= $_SESSION['name2']?></a></li>
            <li>
                <a href="index.php?logout=1" id="logout" role="button"  name="logout">登出</a> 
            </li>
          </ul>
         
        </div>
      </nav>   

<div class="container">

  <h2> 服務項目 </h2>
  <div class="row">
    <div class="col-sm-12 col-md-3" id="n2">
        <div class="thumbnail">
          <img src="./image/deposit.png" alt="..." width="200" height="200" >
          <div class="caption">
            <p><a href="process.php?id=存款" class="btn" role="button">存款</a></p>
          </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-3" id="n3">
        <div class="thumbnail">
          <img src="./image/withdraw.png" alt="..." width="200" height="200">
          <div class="caption">
            <p><a href="process.php?id=提款" class="btn" role="button">提款</a></p>
          </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-3" id="n4">
        <div class="thumbnail">
          <img src="./image/balance.png" alt="..." width="200" height="200">
          <div class="caption">
            <p><a href="balance.php" class="btn" role="button" >查詢餘額</a></p>
          </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-3" id="n5">
        <div class="thumbnail">
          <img src="./image/detail.png" alt="..."  width="200" height="200">
          <div class="caption">
            <p><a href="detail.php" class="btn" role="button">交易明細</a></p>
          </div>
        </div>
    </div>
  </div>
</div>

</body>
</html>








  


