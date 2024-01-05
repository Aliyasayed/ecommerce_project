<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .success-box {
            background-color: #4CAF50;
            color: #fff;
            padding: 20px;
            border-radius: 5px;
            display: flex;
            align-items: center;
        }

        .success-box .icon {
            margin-right: 15px;
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div class="success-box">
        <div class="icon">&#10004;</div>
        <p>Order placed successfully!</p>
    </div>
</body>

</html>

<?php

include "../shared/connection.php";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $conn->real_escape_string($_POST['name']);  
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']);
$address = $conn->real_escape_string($_POST['address']);

$productName = isset($_POST['productName']) ? $conn->real_escape_string($_POST['productName']) : '';
$productPrice = isset($_POST['productPrice']) ? $conn->real_escape_string($_POST['productPrice']) : 0;
$productQuantity = isset($_POST['productQuantity']) ? $conn->real_escape_string($_POST['productQuantity']) : 0;

$productPrice = is_numeric($productPrice) ? $productPrice : 0;
$productQuantity = is_numeric($productQuantity) ? $productQuantity : 0;

$totalPrice = $productPrice * $productQuantity;

$sql = "INSERT INTO orders (username, useremail, phonenumber, address, productname, productprice, quantity, totalamount)
        VALUES ('$name', '$email', '$phone', '$address', '$productName', '$productPrice', '$productQuantity', '$totalPrice')";

if ($conn->query($sql) === TRUE) {
    echo "<!DOCTYPE html>
    <html lang='en'>
    
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Order Status</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
                margin: 0;
            }
    
            .success-box {
                background-color: #4CAF50;
                color: #fff;
                padding: 20px;
                border-radius: 5px;
                display: flex;
                align-items: center;
            }
    
            .success-box .icon {
                margin-right: 15px;
                font-size: 30px;
            }
        </style>
    </head>
    
    <body>
        
           
        </div>
    </body>
    
    </html>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
