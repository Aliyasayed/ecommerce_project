<?php

include "authguard.php";
include "menu.html";

$userid = $_SESSION['userid'];

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

    include "../shared/connection.php";
    $status = mysqli_query($conn, "insert into cart(userid, pid) value($userid, $pid)");

    if ($status) {
        echo "Added to cart Successfully";
        // Add your link below
        echo '<br><a href="viewcart.php">Go to View Cart Page</a>';
    } else {
        echo mysqli_error($conn);
    }
}

?>
