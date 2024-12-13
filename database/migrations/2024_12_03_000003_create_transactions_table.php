<?php

$startTime = microtime(true);

$sql = "CREATE TABLE transactions (
    transaction_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    coin_id VARCHAR(10) NOT NULL,
    quantity INT NOT NULL,
    transaction_type ENUM('buy', 'sell') NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (coin_id) REFERENCES coins(coin_id),
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($sql) === TRUE) {
    $endTime = microtime(true);
    $executionTime = $endTime - $startTime;
    echo "Table transactions created successfully [" . number_format($executionTime, 3) . " seconds]\n";;
} else {
    echo "Error creating table: " . $conn->error . "\n";
}