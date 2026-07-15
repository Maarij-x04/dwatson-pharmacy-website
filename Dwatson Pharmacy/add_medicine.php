<?php
include 'db.php';

$name = $_POST['name'];
$brand = $_POST['brand'];
$price = $_POST['price'];
$expiry = $_POST['expiry'];
$category_id = $_POST['category_id'];
$supplier_id = $_POST['supplier_id'];

try {
    $stmt = $conn->prepare("INSERT INTO Medicine (Name, Brand, CategoryID, SupplierID, Price, ExpiryDate) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $brand, $category_id, $supplier_id, $price, $expiry]);
    echo "✅ Medicine added successfully!";
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>
