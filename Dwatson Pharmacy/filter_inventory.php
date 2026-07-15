<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $branchId = $_POST['branch_id'];

    try {
        $stmt = $conn->prepare("
            SELECT i.InventoryID, m.Name AS MedicineName, i.Quantity
            FROM Inventory i
            JOIN Medicine m ON i.MedicineID = m.MedicineID
            WHERE i.BranchID = ?
        ");
        $stmt->execute([$branchId]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<h2>Inventory for Branch ID: $branchId</h2>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>Inventory ID</th><th>Medicine Name</th><th>Quantity</th></tr>";

        if ($results) {
            foreach ($results as $row) {
                echo "<tr>
                        <td>{$row['InventoryID']}</td>
                        <td>{$row['MedicineName']}</td>
                        <td>{$row['Quantity']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No inventory found for this branch.</td></tr>";
        }

        echo "</table>";

    } catch (PDOException $e) {
        echo "❌ Error: " . $e->getMessage();
    }
}
?>
