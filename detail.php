<?php

session_start();
require("conn.php");

if(!isset($_SESSION["name"])){
    header("location:index.php");
}

$mid=$_SESSION["mid"];
$sql="SELECT * FROM process where mid=1 ORDER BY cdate  ASC ";
$result=mysqli_query($link,$sql);

$id=$_GET["id"];

$sql2="SELECT * FROM process where mid=1 ORDER BY `process`.`cdate` DESC";
$result2=mysqli_query($link,$sql2);
$row2=mysqli_fetch_assoc($result2);
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

h3{
    text-align:center;
    padding-top:30px;  
    padding-bottom:20px;
}
#detail {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 60%;
  margin-left: auto;
  margin-right: auto;
  
  
}

#detail td, #detail th {
  border: 1px solid #ddd;
  padding: 8px;
}

#detail tr:nth-child(even){background-color: #f2f2f2;}

#detail tr:hover{background-color: #ddd;}

#detail th{
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #0066CC;
  color: white;
}
</style>
<div class="container-fluid">
    <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand">Bank</a>
    <form class="form-inline" method="post"> 
        <a href="home.php" class="btn btn-outline-primary my-2 my-sm-0" role="button" name="logout">回首頁</a>
    </form>
    </nav>
  
  
    <div class="container-fluid">
        <!-- Control the column width, and how they should appear on different devices -->
        
        <h3 id="title">交易明細</h3> 
        <table id="detail">

        <?php if($id=="1"){?>   
            <tr>
                <th>編號</th>
                <th>存款/提款</th>
                <th>交易金額</th>
                <th>餘額</th>
                <th>日期</th>
            </tr>
            <tr>
            <?php $i=1; while($row=mysqli_fetch_assoc($result)):?>
                <td><?= $i;?></td>
                <td><?=$row['depositWithdraw']?></td>
                <td><?=$row['pmoney']?></td>
                <td><?=$row['balance']?></td>
                <td><?=$row['cdate']?></td>
            </tr>
            <?php $i++; endwhile?>      
        </table>

        <?php }else{?>

        <table id="detail">
            <tr><th>餘額</th><th>日期</th></tr>
            <tr><td><?=$row2['balance']?></td><td><?=$row2['cdate']?></td></tr>
        </table>
        <?php }?>
        
        
    </div>
</div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.toast.js"></script>
    <script type="text/javascript">

    var x="<?=$id;?>";
  
    if(x==2){
        document.getElementById("title").innerHTML="餘額";
    }

    </script>

</body>
</html>








  


