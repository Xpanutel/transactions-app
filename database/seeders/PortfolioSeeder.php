<?php

$portfolios = [
    [
        'user_id' => 1,
        'coin' => 1,
        'quantity' => 2,
    ],
    [
        'user_id' => 2,
        'coin' => 2,
        'quantity' => 5,
    ],
    [
        'user_id' => 3,
        'coin' => 3,
        'quantity' => 10,
    ],
    [
        'user_id' => 4,
        'coin' => 4,
        'quantity' => 7,
    ],
    [
        'user_id' => 5,
        'coin' => 5,
        'quantity' => 15,
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
