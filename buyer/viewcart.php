<!DOCTYPE html>
<html lang="en">
<head>
   <style>
        .card{
            width :300px;
            height : 300px;
            background-color: lightskyblue;
            display: inline-block;
            margin: 10px;
            padding: 10px;
        }
        img{
            width:100%;
            height: 70%;
        }
        .name{
            font-size:24px;
        }
        .price{
            font-size:26px;
            font-weight: bold;
            color: crimson;
        }
        .price::after{
            content:" Rs";
        }
        .action{
            text-align: center;
        }
        .btn{
            background-color: green;
        }
   </style>
</head>
<body>
    
</body>
</html>


<?php

include "authguard.php";
include "menu.html";
include "../shared/connection.php";

$sql_result=mysqli_query($conn,"select * from cart join product on cart.pid=product.pid where userid=$_SESSION[userid]");

while($row=mysqli_fetch_assoc($sql_result)){
    echo "<div class='card'>
                <div class='name'>$row[name]</div>
                <div class='price'>$row[price]</div>
                <img src='$row[impath]'>
                <div class='detail'>$row[detail]</div>
                <div class='action'>
                <a href='removecart.php?cartid=$row[cartid]'>
                <button class='btn'>Remove item</button>
                </a>
                <a href='vieworder.php?cartid=$row[cartid]'>
                <button class='btn'>View Order</button> 
                </a>
            </div>
    </div>";
}
?>