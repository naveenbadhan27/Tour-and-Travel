<?php
session_start();
include "./config.php";

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Please log in first']);
    exit;
}

$user_id = $_SESSION['user_id'];
$package_id = $_POST['package_id'];
$total_price = $_POST['total_price'];
$travelers = $_POST['travelers']; // Array of travelers

// Insert into bookings table
$stmt = $db->prepare("INSERT INTO bookings (user_id, package_id, total_price, status) VALUES (?, ?, ?, 'Pending')");
$stmt->bind_param("iid", $user_id, $package_id, $total_price);
$stmt->execute();
$booking_id = $stmt->insert_id;

// Insert traveler details
foreach ($travelers as $traveler) {
    $stmt = $db->prepare("INSERT INTO travelers (booking_id, name, age, gender) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isis", $booking_id, $traveler['name'], $traveler['age'], $traveler['gender']);
    $stmt->execute();
}

echo json_encode(['status' => 'success']);
?>