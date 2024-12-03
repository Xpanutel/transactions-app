<?php

require_once __DIR__ . 'app/config/connect.php';

$sql = "CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    stock_id INT NOT NULL,
    quantity INT NOT NULL,
    transaction_type ENUM('buy', 'sell') NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (stock_id) REFERENCES stocks(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table transactions created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$conn->close();