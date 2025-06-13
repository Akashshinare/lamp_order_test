<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['form']['email'])) {
    echo "<p>Session expired. Please go back to <a href='index.php'>Order Form</a>.</p>";
    exit;
}

$db = new DB();
$conn = $db->connect();

$email = $_SESSION['form']['email'];


$stmt = $conn->prepare("SELECT member_id FROM member WHERE email = ?");
$stmt->execute([$email]);
$member_id = $stmt->fetchColumn();

if (!$member_id) {
    echo "<p>No orders found for your session. Please try again.</p>";
    exit;
}


$stmt = $conn->prepare("SELECT product_name, price FROM member_orders WHERE member_id = ?");
$stmt->execute([$member_id]);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Initial Order Form</title>
    <link rel="stylesheet" href="assest/CSS/style3.css">
</head>

<body>
    <h1>Thank You for Your Order!</h1>
    <div class="container">
        <p>Here is a summary of your purchased products:</p>

        <?php if (count($orders) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price (₹)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= htmlspecialchars($order['product_name']) ?></td>
                    <td><?= htmlspecialchars(number_format($order['price'], 2)) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>No products found in your order.</p>
        <?php endif; ?>

        <p><a href="index.php">Place Another Order</a></p>
    </div>
</body>

</html>