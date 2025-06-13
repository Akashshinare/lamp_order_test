<?php
session_start();
require_once '../includes/db.php';

if (!isset($_SESSION['form'])) {
    echo json_encode(['status' => 'error', 'message' => 'Session not set.']);
    exit;
}

$db = new DB();
$conn = $db->connect();

try {
    $email = $_SESSION['form']['email'];

   
    $stmt = $conn->prepare("SELECT member_id FROM member WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $member = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$member) {
        echo json_encode(['status' => 'error', 'message' => 'Member not found']);
        exit;
    }

    $member_id = $member['member_id'];

   
    $product_name = "Wellness Gummies";
    $price = "199.00";

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
    echo json_encode(['status' => 'error', 'message' => 'DB error: ' . $e->getMessage()]);
}