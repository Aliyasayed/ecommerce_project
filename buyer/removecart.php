<?php

include "authguard.php";
include "../shared/connection.php";

$cartid=$_GET['cartid'];

$status = mysqli_query($conn,"delete from cart where cartid = '$cartid' ");
if($status){
    echo "Cart removed Successfully!";
    header("Location:viewcart.php");
    exit();
}
else{
    echo mysqli_error($conn);
}

?>
