<?php
include 'db.php';

try {
    $stmt = $conn->query("
        SELECT s.SaleID, c.Name AS CustomerName, e.Name AS EmployeeName, s.SaleDate,
               p.Amount, p.Method
        FROM Sale s
        JOIN Customer c ON s.CustomerID = c.CustomerID
        JOIN Employee e ON s.EmployeeID = e.EmployeeID
        LEFT JOIN Payment p ON s.SaleID = p.SaleID
        ORDER BY s.SaleID DESC
    ");

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>Sales Report</h2>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>Sale ID</th>
            <th>Customer</th>
            <th>Employee</th>
            <th>Sale Date</th>
            <th>Amount</th>
            <th>Payment Method</th>
          </tr>";

    foreach ($results as $row) {
        $amount = $row['Amount'] ?? 'Pending';
        $method = $row['Method'] ?? 'Pending';

        echo "<tr>
                <td>{$row['SaleID']}</td>
                <td>{$row['CustomerName']}</td>
                <td>{$row['EmployeeName']}</td>
                <td>{$row['SaleDate']}</td>
                <td>{$amount}</td>
                <td>{$method}</td>
              </tr>";
    }

    echo "</table>";

} catch (PDOException $e) {
    echo "<span style='color:red;'>Error: " . $e->getMessage() . "</span>";
}
?>
