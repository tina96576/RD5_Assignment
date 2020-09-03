<?php

session_start();
require("conn.php");

$mid=$_SESSION["mid"];
$name=$_SESSION["name"];

// echo "mid".$mid."<br>";
// echo "name".$name;

if(!isset($_SESSION["name"])){
    header("location:index.php");
}
if(isset($_GET["logout"])){
    unset($_SESSION["name"]);
    unset($_SESSION["mid"]);
    
    header("location: index.php");
    exit();
}

$sql="SELECT * FROM process where mid=$mid ORDER BY cdate ";
$result=mysqli_query($link,$sql);

$id=$_GET["id"];

$sql2="SELECT * FROM process where mid=$mid ORDER BY cdate DESC";
$result2=mysqli_query($link,$sql2);
$row2=mysqli_fetch_assoc($result2);

$balance2=$row2['balance'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bank</title>
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
  overflow-y: auto;
  
  
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

.form-inline {
    position: absolute;
    right: 0px;
    width: 300px;
    padding:20px;
    margin-top:10px;
}

</style>
<div class="container-fluid">
    <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand">Bank</a>
    <form class="form-inline">
    <p>用戶帳號：<?= $_SESSION['name']?><p>&nbsp; 
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
                <td>
                <?php 
                    if($row['depositWithdraw']=="存款"){
                        echo "+".$row['pmoney'];
                    }else{
                        echo "-".$row['pmoney'];
                    }
                ?>
                </td>
                
                <td><?=$row['balance']?></td>
                <td><?=$row['cdate']?></td>
            </tr>
            <?php $i++; endwhile?>      
        </table>

        <?php }else{?>

        <h3 id="rankid1">*****</h3>
       
        <?php }?>
        
        
    </div>
</div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.toast.js"></script>
    <script type="text/javascript">

    var x="<?=$id;?>";
  
    var balance2="<?=$balance2?>";
    if(x==2){
        document.getElementById("title").innerHTML="餘額";
    }

    
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








  


