<?php
include 'db.php';

try {
    $stmt = $conn->query("
        SELECT b.BranchName, m.Name AS MedicineName, i.Quantity
        FROM Inventory i
        JOIN Branch b ON i.BranchID = b.BranchID
        JOIN Medicine m ON i.MedicineID = m.MedicineID
        ORDER BY b.BranchName, m.Name
    ");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>Inventory by Branch</h2>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>Branch</th><th>Medicine</th><th>Quantity</th></tr>";

    foreach ($results as $row) {
        echo "<tr>
                <td>{$row['BranchName']}</td>
                <td>{$row['MedicineName']}</td>
                <td>{$row['Quantity']}</td>
              </tr>";
    }

    echo "</table>";

} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>
