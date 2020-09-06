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

$sql="SELECT * FROM process where mid=$mid ORDER BY cdate ";
$result=mysqli_query($link,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Register</title>
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
            width:900px;
            height:500px;
            background-color:white;
            border-radius: 10px;
            display:flex;
            justify-content:center;   
        }
        .form{
            font-family:'Noto Sans TC',sans-serif;
            width:800px;
            height:600px;
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
            margin-top:40px;


        }

        .form img{
            margin-top:-60px;
            padding:15px;
            border-radius: 50%;
            margin-left:330px;
            background:white;
            justify-content: center;
            align-items: center; 
        }

        .total{
            height:200px;
            overflow: auto;
        }
       

        #detail {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
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

        .form-inline {
            position: absolute;
            right: 0px;
            width: 300px;
            padding:20px;
            margin-top:10px;
        }

</style> 
   <div>
        <div class="login"> 
            <form class="form">
                <img src="./image/detail.png" alt="..." width="130" height="130">
                <h2 id="title">交易明細</h2><br>
               
                <div class="total">
                <table class="table" id="detail">
                    <thead>
                    <tr>
                        <th>編號</th>
                        <th>存款/提款</th>
                        <th>交易金額</th>
                        <th>餘額</th>
                        <th>日期</th>
                    </tr>
                    </thead>
                    <tbody>
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
                        </tbody>

                </table>
                </div>
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








  


