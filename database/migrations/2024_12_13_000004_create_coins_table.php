<?php

$startTime = microtime(true);

$sql = "CREATE TABLE coins (
    coin_id VARCHAR(10) NOT NULL PRIMARY KEY, 
    fullname VARCHAR(50) UNIQUE
};"

if($conn->querry($sql) === TRUE) {
    $endTime = microtime(true);
    $executionTime = $endTime - $startTime;
    echo "Table coins created successfully [" . number_format($executionTime, 3) . "  seconds]\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}