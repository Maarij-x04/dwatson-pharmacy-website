<?php
include 'db.php';

// Capture form data
$customer_id = $_POST['customer_id'];
$medicine_id = $_POST['medicine_id'];
$quantity = $_POST['quantity'];
$payment_method = $_POST['payment_method'];

try {
    // Step 1: Find employee who is recording this sale (default to EmployeeID 1 for now)
    $employee_id = 1;

    // Step 2: Insert into Sale
    $stmt = $conn->prepare("INSERT INTO Sale (CustomerID, EmployeeID, SaleDate) VALUES (?, ?, GETDATE())");
    $stmt->execute([$customer_id, $employee_id]);
    $sale_id = $conn->lastInsertId();

    // Step 3: Get medicine price
    $stmt = $conn->prepare("SELECT Price FROM Medicine WHERE MedicineID = ?");
    $stmt->execute([$medicine_id]);
    $medicine = $stmt->fetch();
    $unit_price = $medicine['Price'];

    // Step 4: Insert into SaleItem
    $stmt = $conn->prepare("INSERT INTO SoldItem (SaleID, MedicineID, Quantity, UnitPrice) VALUES (?, ?, ?, ?)");
    $stmt->execute([$sale_id, $medicine_id, $quantity, $unit_price]);

    // Step 5: Calculate total
    $total_amount = $unit_price * $quantity;

    // Step 6: Insert into Payment
    $stmt = $conn->prepare("INSERT INTO Payment (SaleID, Amount, PaymentDate, Method) VALUES (?, ?, GETDATE(), ?)");
    $stmt->execute([$sale_id, $total_amount, $payment_method]);

    echo "✅ Sale recorded successfully! Total: Rs. $total_amount";
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>
