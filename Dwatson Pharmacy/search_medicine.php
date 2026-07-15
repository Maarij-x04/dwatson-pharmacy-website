<?php
include 'db.php';

if (isset($_GET['name'])) {
    $name = $_GET['name'];

    try {
        $stmt = $conn->prepare("
            SELECT m.MedicineID, m.Name, m.Brand, c.CategoryName, m.Price, m.ExpiryDate
            FROM Medicine m
            JOIN Category c ON m.CategoryID = c.CategoryID
            WHERE m.Name LIKE ?
        ");
        $stmt->execute(['%' . $name . '%']);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($results) {
            echo "<h2>Search Results</h2>";
            echo "<table border='1' cellpadding='10'>";
            echo "<tr><th>ID</th><th>Name</th><th>Brand</th><th>Category</th><th>Price</th><th>Expiry Date</th></tr>";
            foreach ($results as $row) {
                echo "<tr>
                        <td>{$row['MedicineID']}</td>
                        <td>{$row['Name']}</td>
                        <td>{$row['Brand']}</td>
                        <td>{$row['CategoryName']}</td>
                        <td>{$row['Price']}</td>
                        <td>{$row['ExpiryDate']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "❌ No medicines found for '{$name}'.";
        }
    } catch (PDOException $e) {
        echo "❌ Error: " . $e->getMessage();
    }
} else {
    echo "❌ Please enter a search term.";
}
?>
