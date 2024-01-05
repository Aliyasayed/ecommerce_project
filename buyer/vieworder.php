<!DOCTYPE html>
<html lang="en">
<head>
<style>
    .card {
        width: 300px;
        height: 350px;
        background-color: lightskyblue;
        display: inline-block;
        margin: 10px;
        padding: 10px;
    }

    img {
        width: 100%;
        height: 60%;
    }

    .name {
        font-size: 24px;
    }

    .price {
        font-size: 26px;
        font-weight: bold;
        color: crimson;
    }

    .price::after {
        content: " Rs";
    }

    .detail {
        font-size: 16px;
        margin-top: 10px;
    }
    .action {
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        }
    .quantity-container {
        display: flex;
        flex-direction: row;
        margin-top: 10px;
        justify-content: center; 
    }
    .quantity-btn {
        padding: 5px;
        margin: 0 5px;
        cursor: pointer;
    }
    .quantity-input {
        width: 40px;
        text-align: center;
    }
    .btn {
        margin-top: 5px;
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

if (isset($_GET['cartid'])) {
    $cartId = $_GET['cartid'];

    $sql_result = mysqli_query($conn, "SELECT cart.*, product.* FROM cart JOIN product ON cart.pid = product.pid WHERE cartid = $cartId AND userid = $_SESSION[userid]");

    while ($row = mysqli_fetch_assoc($sql_result)) {
        echo "<div class='card'>
                <div class='name'>$row[name]</div>
                <div class='price'>$row[price]</div>
                <img src='$row[impath]'>
                <div class='detail'>$row[detail]</div>
                <div class='action'>
                <form method='post' action='removecart.php?cartid=$row[cartid]'>
                        <button class='btn'>Cancle item</button>
                    </form>
                    <form method='post' action='placeorder.php'>
                        <input type='hidden' name='cartid' value='$row[cartid]'>
                        <input type='hidden' name='productName' value='$row[name]'>
                        <input type='hidden' name='productPrice' value='$row[price]'>
                        <input type='hidden' name='productImage' value='$row[impath]'>
                        <input type=' ' name='productQuantity' placeholder='TypeQuantity' value='" . (isset($row['quantity']) ? $row['quantity'] : 1) . "'>

                        <button class='btn' type='submit' name='place_order'>Place Order</button>
                    </form>
                </div>
            </div>";
    }
} else {
    echo "Invalid request.";
}
?>

<script>
    function decrementQuantity(cartId) {
        var input = document.getElementById('quantity-' + cartId);
        if (input.value > 1) {
            input.value--;
        }
    }

    function incrementQuantity(cartId) {
        var input = document.getElementById('quantity-' + cartId);
        input.value++;
    }
</script>