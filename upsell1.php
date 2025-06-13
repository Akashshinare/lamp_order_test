<?php
session_start();

if (!isset($_SESSION['form'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Initial Order Form</title>
    <link rel="stylesheet" href="assest/CSS/style1.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assest/JS/script.js"></script>
</head>

<body>

    <div class="container">
        <div class="product-info">
            <h2>Special Add-on: Immunity Booster</h2>
            <p><strong>Only ₹299.00</strong></p>
        </div>

        <div class="actions">
            <button class="btn-primary" id="addToUpsell1Btn">Add to my Order</button>
            <a class="btn-link" href="upsell2.php">No Thank You</a>
        </div>
    </div>
</body>

</html>