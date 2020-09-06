<?php

session_start();
require("conn.php");

$mid=$_SESSION["mid2"];
$name=$_SESSION["name2"];

// echo "mid".$mid."<br>";
// echo "name".$name;

if(!isset($_SESSION["name2"])){
    header("location:index.php");
}
if(isset($_GET["logout"])){
    unset($_SESSION["name2"]);
    unset($_SESSION["mid2"]);
    
    header("location: index.php");
    exit();
}


$sql2="SELECT * FROM process where mid=$mid ORDER BY cdate DESC";
$result2=mysqli_query($link,$sql2);
$row2=mysqli_fetch_assoc($result2);

$balance2=$row2['balance'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Balance</title>
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
        margin-top:30px;
        color:black;
        text-align:center;
        font-weight:bold;
        margin-bottom:20px;
        font-size:35px;    
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
           
        font-size:20px;
        border-radius:5px;
        border:none;
        background-color:#6ab4fe;
        width:185px;
        padding:10px 0;
        color:#fff;
        margin: auto;
        display: flex;
        justify-content: center;
        align-items: center; 
    }
    #rankid1{
        text-align:center;
        margin-bottom:40px;
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
            <form class="form">
                <img src="./image/balance.png" alt="..." width="130" height="130">
                <h2 id="title">餘額</h2><br>
                <h3 id="rankid1">*****</h3>
                <div>
                    <button type="reset" class="btn btn-default btn-lg" ><a href="home.php" class="glyphicon glyphicon-home"  style="text-decoration:none; color:white;" aria-hidden="true">回首頁</a></button> 
                </div>  
            </form>     
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.toast.js"></script>
    <script type="text/javascript">

   
  
    var balance2="<?=$balance2?>";
   
    document.getElementById("rankid1").onclick = function() {changeAmount1()};
    
    function changeAmount1() {
        document.getElementById('rankid1').innerHTML = "$ "+balance2+" 元";
        document.getElementById("rankid1").onclick = function() {changeAmount2()};
    }
    function changeAmount2() {
        document.getElementById('rankid1').innerHTML = "****";
        document.getElementById("rankid1").onclick = function() {changeAmount1()};

    }
    

    </script>

</body>
</html>








  


