<!DOCTYPE html>
<html lang="en">
<head>
   <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        form {
            width: 20%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .card img {
            width: 100%;
            height: auto;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .card input,
        .card textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .card button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .card button:hover {
            background-color: #45a049;
        }

   </style>
</head>
<body>

<?php
include "authguard.php";
include "menu.html";
include "../shared/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['pid'])) {
        $pid = $_POST['pid'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $detail = $_POST['detail'];

        $update_query = "UPDATE product SET name='$name', price='$price', detail='$detail' WHERE pid=$pid";
        $result = mysqli_query($conn, $update_query);

        if ($result) {
            header("Location: view.php");
            exit();
        } else {
            echo "Error updating product: " . mysqli_error($conn);
        }
    }
}

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    $sql_result = mysqli_query($conn, "SELECT * FROM product WHERE pid = $pid");

    if ($row = mysqli_fetch_assoc($sql_result)) {
        echo "<form action='edit.php' method='post'>
                <input type='hidden' name='pid' value='$row[pid]'>
                <div class='card'>
    <h2><strong>Edit</strong> Product</h2>
    <div class='name'>
        <label for='name'>Product Name:</label>
        <input type='text' id='name' name='name' value='$row[name]'>
    </div>
    <div class='price'>
        <label for='price'>Product Price:</label>
        <input type='text' id='price' name='price' value='$row[price]'>
    </div>
    <img src='$row[impath]' alt='Product Image'>
    <div class='detail'>
        <label for='detail'>Product Description:</label>
        <textarea id='detail' name='detail'>$row[detail]</textarea>
    </div>
    <div class='action'> 
        <button type='submit' class='btn'>Save</button>
    </div>
</div>
            </form>";
    } else {
        echo "Product not found.";
    }
} else {
    echo "Product ID not provided.";
}

?>

</body>
</html>
