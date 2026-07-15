<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $saleId = $_POST['sale_id'];
    $medicineId = $_POST['medicine_id'];
    $quantity = $_POST['quantity'];
    $unitPrice = $_POST['unit_price'];

    try {
        $stmt = $conn->prepare("INSERT INTO SaleItem (SaleID, MedicineID, Quantity, UnitPrice) VALUES (?, ?, ?, ?)");
        $stmt->execute([$saleId, $medicineId, $quantity, $unitPrice]);
        echo "✅ Sold item added to Sale ID: $saleId successfully.";
    } catch (PDOException $e) {
        echo "❌ Error: " . $e->getMessage();
    }
}
?>
