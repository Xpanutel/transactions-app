<?php

require_once __DIR__ . '/project/config/connection.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_query($conn, "SET NAMES 'utf8'");

if (!defined('DIR')) {
    define('DIR', __DIR__);
}

$sql = "SHOW TABLES";
$result = $conn->query($sql);

if ($result === false) {
    die("Error getting the list of tables: " . $conn->error);
}

$tables = [];
while ($row = $result->fetch_assoc()) {
    $tables[] = reset($row); 
}

$startTime = microtime(true);

foreach ($tables as $table) {
    $endTime = microtime(true);
    $executionTime = $endTime - $startTime;
    $dropSql = "DROP TABLE `$table`";
    if ($conn->query($dropSql) === true) {
        echo "Table '$table' successfully deleted [" . number_format($executionTime, 3) . " seconds]\n";
    } else {
        echo "Table deletion error '$table': " . $conn->error;
    }
}

$files = [
    '2024_12_03_000001_create_user_table.php',
    '2024_12_13_000004_create_coins_table.php',
    '2024_12_03_000002_create_portfolios_table.php',
    '2024_12_03_000003_create_transactions_table.php'
];

foreach ($files as $file) {
    $filePath = DIR . '/database/migrations/' . $file;
    
    if (file_exists($filePath)) {
        try {
            require_once $filePath;
        } catch (\Exception $e) {
            error_log("Error including file $file: " . $e->getMessage());
        }
    } else {
        echo "File $file not found.\n";
    }
}

$conn->close();