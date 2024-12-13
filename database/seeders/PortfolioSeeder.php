<?php

$portfolios = [
    [
        'user_id' => 1,
        'coin_id' => 'bitcoin',
        'quantity' => 2,
    ],
    [
        'user_id' => 2,
        'coin_id' => 'ethereum',
        'quantity' => 5,
    ],
    [
        'user_id' => 3,
        'coin_id' => 'litecoin',
        'quantity' => 10,
    ],
    [
        'user_id' => 4,
        'coin_id' => 'bitcoin',
        'quantity' => 7,
    ],
    [
        'user_id' => 5,
        'coin_id' => 'polkadot',
        'quantity' => 15,
    ],
];


$stmt = $conn->prepare("INSERT INTO portfolios (user_id, coin_id, quantity) VALUES (?, ?, ?)");

foreach ($portfolios as $portfolio) {
    $stmt->bind_param('isi', $portfolio['user_id'],  $portfolio['coin_id'], $portfolio['quantity']);
    
    if ($stmt->execute()) {
        echo "Portfolio entry for user_id " . $portfolio['user_id'] . " added successfully.\n";
    } else {
        echo "Error adding portfolio entry for user_id " . $portfolio['user_id'] .  ": " . $stmt->error . "\n";
    }
}
