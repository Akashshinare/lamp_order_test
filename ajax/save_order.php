<?php
session_start();
require_once '../includes/db.php';

$db = new DB();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'] ?? null;
    $address = $_POST['address'] ?? null;
    $city = $_POST['city'] ?? null;
    $state = $_POST['state'] ?? null;
    $zip_code = $_POST['zip_code'] ?? null;

    $_SESSION['form'] = $_POST;

    try {
        $stmt = $conn->prepare("
            INSERT INTO member (full_name, email, phone, address, city, state, zip_code)
            VALUES (:full_name, :email, :phone, :address, :city, :state, :zip_code)
        ");
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':zip_code', $zip_code);
        $stmt->execute();

        $member_id = $conn->lastInsertId(); 

  
        $product_name = "Premium Health Supplement";
        $price = "499.00";

        $stmt2 = $conn->prepare("
            INSERT INTO member_orders (member_id, product_name, price)
            VALUES (:member_id, :product_name, :price)
        ");
        $stmt2->bindParam(':member_id', $member_id);
        $stmt2->bindParam(':product_name', $product_name);
        $stmt2->bindParam(':price', $price);
        $stmt2->execute();

        echo json_encode(['status' => 'success']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}