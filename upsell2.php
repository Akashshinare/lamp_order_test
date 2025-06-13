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
    <link rel="stylesheet" href="assest/CSS/style2.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assest/JS/script.js"></script>
</head>

<body>

    <div class="container">
        <div class="product-info">
            <h2>Special Add-on: Wellness Gummies</h2>
            <p><strong>Only ₹199.00</strong></p>
        </div>

        <div class="actions">
            <button class="btn-primary" id="addToUpsell2Btn">Add to my Order</button>
            <a class="btn-link" href="thankyou.php">No Thank You</a>
        </div>
    </div>

</body>

</html>