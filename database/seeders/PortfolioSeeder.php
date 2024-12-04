<?php

$portfolios = [
    [
        'user_id' => 1, 
        'quantity' => 10
    ],
    [
        'user_id' => 1,
        'quantity' => 5
    ],
    [
        'user_id' => 2, 
        'quantity' => 15
    ],
    [
        'user_id' => 2,
        'quantity' => 7
    ],
    [
        'user_id' => 3,
        'quantity' => 20
    ],
    [
        'user_id' => 3,
        'quantity' => 3
    ],
    [
        'user_id' => 1,
        'quantity' => 8
    ],
];

$stmt = $conn->prepare("INSERT INTO portfolios (user_id, quantity) VALUES (?, ?)");

foreach ($portfolios as $portfolio) {
    $stmt->bind_param('ii', $portfolio['user_id'],  $portfolio['quantity']);
    
    if ($stmt->execute()) {
        echo "Portfolio entry for user_id " . $portfolio['user_id'] . " added successfully.\n";
    } else {
        echo "Error adding portfolio entry for user_id " . $portfolio['user_id'] .  ": " . $stmt->error . "\n";
    }
}
