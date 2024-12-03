<?php

require_once __DIR__ . 'app/config/connect.php';

$sql = "CREATE TABLE stocks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ticker VARCHAR(10) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    current_price DECIMAL(10, 2) NOT NULL,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table stocks created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$conn->close();