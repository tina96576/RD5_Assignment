<?php

session_start();

if(!isset($_SESSION["name"])){
    header("location:index.php");
}


if(isset($_GET["id"])){
  $id=$_GET["id"];

  if($id==1){
    $a="存款";
  }else{
    $a="提款";
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
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">返回</button>
  </form>
</nav>
  
  
  <div class="container-fluid">
    <!-- Control the column width, and how they should appear on different devices -->
    
    <h2><?=$a?></h2>

    <form action="#">

      <label for="fname">金額：</label>
      <input type="text" id="fname" name="fname"><br>
      <input type="submit" value="確認">
      <input type="reset" value="取消">
    </form> 

  </div>
</div>

</body>
</html>








  


