<?php
include "authguard.php";
include "../shared/connection.php";

if (isset($_GET['pid']) && is_numeric($_GET['pid'])) {
    $product_id = $_GET['pid'];
    
    // Perform deletion
    $status = mysqli_query($conn,"delete from cart where cartid = '$product_id' ");
    
    if ($status) {
        echo "Product deleted successfully!";
    } else {
        echo "Error deleting product: " . mysqli_error($conn);
    }
} else {
    echo "Invalid product ID.";
}
