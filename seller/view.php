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
            content:"Rs";
        }
        .action{
            text-align: center;
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

$sql_result=mysqli_query($conn,"select * from product where owner = $_SESSION[userid]");

//DB_CURSOR
while($row=mysqli_fetch_assoc($sql_result)){
    echo "<div class='card'>
            <div class='name'>$row[name]</div>
            <div class='price'>$row[price]</div>
            <img src='$row[impath]'>";
          echo " <div class='detail'>$row[detail]</div>
          <div class='action'> 
                <a href='edit.php?pid=$row[pid]'>
                <button class='btn'>Edit</button>
                </a>
               <a href='delete.php?pid=$row[pid]'>
               <button class='btn'>Delete</button>
               </a>
          </div>
        </div>";
}

?>