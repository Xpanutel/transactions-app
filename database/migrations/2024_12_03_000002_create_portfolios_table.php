<?php

$startTime = microtime(true);

$sql = "CREATE TABLE portfolios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    quantity INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($sql) === TRUE) {
    $endTime = microtime(true);
    $executionTime = $endTime - $startTime;
    echo "Table portfolios created successfully [" . number_format($executionTime, 3) . " seconds]\n";;
} else {
    echo "Error creating table: " . $conn->error . "\n";
}