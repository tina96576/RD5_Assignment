<?php

session_start();


if(!isset($_SESSION["name"])){
    header("location:index.php");
    echo 'no-name';
}

if(isset($_GET["logout"])){
    unset($_SESSION["name"]);
    unset($_SESSION["mid"]);
    
    header("location: index.php");
    exit();
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
    .col-sm-3{
        margin-top:0px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px;
        
    }
    .btn-lg{
        width:150px;
        height:100px;
        border-radius:10px;
        text-align:center;
        line-height:90px;
        box-shadow:3px 3px 5px 6px #cccccc;
    }

    .btn-lg:hover{
        color:#003C9D;
        background-color:#fff;
        border:2px #003C9D solid;
    }


</style>
<div class="container-fluid">
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand">Navbar</a>
  <form class="form-inline"> 
    <a href="index.php?logout=1" class="btn btn-outline-success my-2 my-sm-0" role="button" name="logout">登出</a>
  </form>
</nav>
  
  
  <div class="container-fluid">
    <!-- Control the column width, and how they should appear on different devices -->
    <div class="row">
      <div class="col-sm-2" ></div>
      <div class="col-sm-3">
      <a href="process.php?id=存款" class="btn btn-warning btn-lg" role="button">存款</a></div>
      <div class="col-sm-2" ></div>
      <div class="col-sm-3"><a href="process.php?id=提款" class="btn btn-warning btn-lg" role="button">提款</a></div>
      <div class="col-sm-2" ></div>
    </div>
    <div class="row">
      <div class="col-sm-2" ></div>
      <div class="col-sm-3" ><a href="detail.php?id=1" class="btn btn-warning btn-lg" role="button">交易明細</a></div>
      <div class="col-sm-2" ></div>
      <div class="col-sm-3" ><a href="detail.php?id=2" class="btn btn-warning btn-lg" role="button">查詢餘額</a></div>
      <div class="col-sm-2" ></div>
    </div>
    <br>
   
  </div>
</div>

</body>
</html>








  


