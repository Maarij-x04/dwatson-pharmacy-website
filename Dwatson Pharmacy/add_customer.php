<?php
include 'db.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];

try {
    $stmt = $conn->prepare("INSERT INTO Customer (Name, Phone, Address) VALUES (?, ?, ?)");
    $stmt->execute([$name, $phone, $address]);
    echo "✅ Customer added successfully!";
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>
