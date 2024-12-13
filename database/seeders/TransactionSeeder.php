<?php

$transactions = [
    [
        'user_id' => 1,
        'coin_id' => 'bitcoin',
        'quantity' => 1,
        'transaction_type' => 'buy',
        'price' => 30000.00,
        'created_at' => '2023-10-01 10:00:00',
    ],
    [
        'user_id' => 2,
        'coin_id' => 'bitcoin',
        'quantity' => 3,
        'transaction_type' => 'buy',
        'price' => 2000.00,
        'created_at' => '2023-10-02 11:30:00',
    ],
    [
        'user_id' => 3,
        'coin_id' => 'bitcoin',
        'quantity' => 5,
        'transaction_type' => 'sell',
        'price' => 1.50,
        'created_at' => '2023-10-03 14:45:00',
    ],
    [
        'user_id' => 5,
        'coin_id' => 'ripple',
        'quantity' => 10,
        'transaction_type' => 'sell',
        'price' => 1.20,
        'created_at' => '2023-10-05 16:00:00',
    ],
    [
        'user_id' => 1,
        'coin_id' => 'ripple',
        'quantity' => 2,
        'transaction_type' => 'buy',
        'price' => 2500.00,
        'created_at' => '2023-10-06 12:00:00',
    ],
    [
        'user_id' => 3,
        'coin_id' => 'aave',
        'quantity' => 1,
        'transaction_type' => 'buy',
        'price' => 32000.00,
        'created_at' => '2023-10-07 10:30:00',
    ],
    [
        'user_id' => 1,
        'coin_id' => 'ethereum',
        'quantity' => 5,
        'transaction_type' => 'sell',
        'price' => 1.80,
        'created_at' => '2023-10-11 16:30:00',
    ],
    [
        'user_id' => 2,
        'coin_id' => 'ethereum',
        'quantity' => 2,
        'transaction_type' => 'buy',
        'price' => 33000.00,
        'created_at' => '2023-10-12 10:00:00',
    ],
];

$stmt = $conn->prepare("INSERT INTO transactions (user_id, coin_id, quantity, transaction_type, price) VALUES (?, ?, ?, ?, ?)");

foreach ($transactions as $transaction) {
    $stmt->bind_param('isisi', $transaction['user_id'], $transaction['coin_id'], $transaction['quantity'], $transaction['transaction_type'], $transaction['price']);
    
    if ($stmt->execute()) {
        echo "Transaction for user_id " . $transaction['user_id'] . " added successfully.\n";
    } else {
        echo "Error adding transaction for user_id " . $transaction['user_id'] . ": " . $stmt->error . "\n";
    }
}