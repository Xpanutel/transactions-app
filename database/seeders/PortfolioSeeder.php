<?php

require_once __DIR__ . '/app/config/connect.php';

$portfolios = [
    [
        'user_id' => 1, 
        'stock_id' => 1, 
        'quantity' => 10,
    ],
    [
        'user_id' => 1,
        'stock_id' => 2,
        'quantity' => 5,
    ],
    [
        'user_id' => 2, 
        'stock_id' => 1,
        'quantity' => 15,
    ],
    [
        'user_id' => 2,
        'stock_id' => 3,
        'quantity' => 7,
    ],
    [
        'user_id' => 3,
        'stock_id' => 4,
        'quantity' => 20,
    ],
    [
        'user_id' => 3,
        'stock_id' => 5,
        'quantity' => 3,
    ],
    [
        'user_id' => 1,
        'stock_id' => 6,
        'quantity' => 8,
    ],
];

$stmt = $conn->prepare("INSERT INTO portfolios (user_id, stock_id, quantity) VALUES (?, ?, ?)");

foreach ($portfolios as $portfolio) {
    $stmt->bind_param('iii', $portfolio['user_id'], $portfolio['stock_id'], $portfolio['quantity']);
    
    if ($stmt->execute()) {
        echo "Portfolio entry for user_id " . $portfolio['user_id'] . " and stock_id " . $portfolio['stock_id'] . " added successfully.\n";
    } else {
        echo "Error adding portfolio entry for user_id " . $portfolio['user_id'] . " and stock_id " . $portfolio['stock_id'] . ": " . $stmt->error . "\n";
    }
}

$stmt->close();
$conn->close();
