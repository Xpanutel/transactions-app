<?php

require_once __DIR__ . 'app/config/connect.php';

$sql = "CREATE TABLE portfolios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    stock_id INT NOT NULL,
    quantity INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (stock_id) REFERENCES stocks(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table portfolios created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$conn->close();