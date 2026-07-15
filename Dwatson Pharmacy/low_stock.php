<?php
include 'db.php';

// Fetch low stock items (threshold: 10 units)
$query = "
    SELECT m.MedicineID, m.Name AS MedicineName, s.TotalStock
    FROM Stock s
    JOIN Medicine m ON s.MedicineID = m.MedicineID
    WHERE s.TotalStock < 10
";
$stmt = $conn->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<h2>⚠️ Low Stock Alert</h2>";

if ($results) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>Medicine ID</th><th>Medicine Name</th><th>Current Stock</th></tr>";

    foreach ($results as $row) {
        echo "<tr>
                <td>{$row['MedicineID']}</td>
                <td>{$row['MedicineName']}</td>
                <td>{$row['TotalStock']}</td>
              </tr>";
    }

    echo "</table>";

    // Redirect Button to Update Inventory
    echo "<br><a href='update_inventory_form.html'><button>Update Inventory</button></a>";

} else {
    echo "<p>✅ All medicines have sufficient stock.</p>";
}
?>
