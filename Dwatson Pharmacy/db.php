<?php
$serverName = "PC-1\\SQLEXPRESS";  // Use double backslashes to escape the backslash

try {
    $conn = new PDO("sqlsrv:server=$serverName;Database=Dwatson");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "✅ Connected successfully!";
} catch (PDOException $e) {
    die("❌ Connection failed: " . $e->getMessage());
}
?>
