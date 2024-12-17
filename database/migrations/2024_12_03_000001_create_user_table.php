<?php

$startTime = microtime(true);

$sql = "CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL, 
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    balance DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    $endTime = microtime(true);
    $executionTime = $endTime - $startTime;
    echo "Table users created successfully [" . number_format($executionTime, 3) . " seconds]\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}
?>
