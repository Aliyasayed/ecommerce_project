<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .heading {
            background-color: blue;
            color: white;
            text-align: center;
            padding: 10px;
        }
        .delivery-details {
            width: 50%;
            margin: 0 auto;
            margin-top: 30px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
}
        .delivery-details label {
            display: block;
            margin-bottom: 5px;
}
        .delivery-details,
        .order-details {
            width: 50%;
            margin: 0 auto;
            margin-top: 30px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            background-color:rgb(179, 229, 252);
            
        }

        .product-image {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .product-info {
            display: flex;
            align-items: center;
        }

        .bold-line {
            margin: 15px 0;
            border-top: 2px solid #000;
        }

        .total-price {
            font-weight: bold;
            font-size: 18px;
        }

        .payment-mode {
            margin-top: 20px;
            
        }
        #confirmation-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        #confirmation-popup p {
            margin: 0;
        }
       
    </style>
</head>

<body>
    <div class="heading">
        <h2>Place Order</h2>
    </div>

    <div class="delivery-details">
    <h3>Delivery Details</h3>
    <form method="post" action="preprocessor.php">

    <?php
            // Check if the form is submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $productName = isset($_POST['productName']) ? $_POST['productName'] : '';
                $productPrice = isset($_POST['productPrice']) ? $_POST['productPrice'] : 0;
                $productImage = isset($_POST['productImage']) ? $_POST['productImage'] : '';
                $productQuantity = isset($_POST['productQuantity']) ? $_POST['productQuantity'] : 0;

                echo '<input type="hidden" name="productName" value="' . $productName . '">';
                echo '<input type="hidden" name="productPrice" value="' . $productPrice . '">';
                echo '<input type="hidden" name="productImage" value="' . $productImage . '">';
                echo '<input type="hidden" name="productQuantity" value="' . $productQuantity . '">';
            }
            ?>  
            
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Customer Name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Customer email" required>

        <label for="phone">Phone Number:</label>
        <input type="text" name="phone" placeholder="Customer Phone Number" required>

        <label for="address">Address:</label>
        <textarea name="address" rows="4" placeholder="Customer Address" required></textarea>
</div>


    <div class="bold-line"></div>

    <div class="order-details">
        <h3>Order Details</h3>
        <?php
        
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productImage = $_POST['productImage'];
        $productQuantity = $_POST['productQuantity'];

        echo "<div class='product-info'>
                <img src='$productImage' alt='Product Image' class='product-image'>
                <div>
                    <p>$productName</p>
                    <p>Price: $productPrice Rs</p>
                    <p>Quantity: $productQuantity</p>
                </div>
            </div>";

        $totalPrice = $productPrice * $productQuantity;

        echo "<div class='total-price'>Total Price: $totalPrice Rs</div>";
        ?>
    </div>

    <div class="bold-line"></div>

    <div class="payment-mode">
        <h3>Payment Mode</h3>
        
        <label for="paymentMethod">Select Payment Method:</label>
        <select name="paymentMethod" required>
            <option value="creditCard">Credit Card</option>
            <option value="paypal">PayPal</option>
            <option value="paypal">Phonepe</option>
            <option value="paypal">Paytm</option>
           
        </select>

        <!-- Add confirmation button -->
        <button type="button" onclick="confirmOrder()">Confirm Order</button>
    </div>

    <!-- Confirmation popup -->
    <div id="confirmation-popup">
        <p>Your order is confirmed! Thank you for shopping with us.</p>
        <button href="sep_pro/index.html">OK</button>
    

    <!-- JavaScript to show/hide confirmation popup and redirect -->
    <script>
        function confirmOrder() {
            document.getElementById('confirmation-popup').style.display = 'block';
            
        }
        function redirectToThankYou() {
            window.location.href = 'thankyou.php'; // Replace 'thankyou.php' with your actual thank you page URL
        }
    </script>
</body>

</html>