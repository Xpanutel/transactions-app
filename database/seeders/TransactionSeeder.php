<?php

$transactions = [
    [
        'user_id' => 1,
        'coin' => 1,
        'quantity' => 1,
        'transaction_type' => 'buy',
        'price' => 30000.00,
        'created_at' => '2023-10-01 10:00:00',
    ],
    [
        'user_id' => 2,
        'coin' => 2,
        'quantity' => 3,
        'transaction_type' => 'buy',
        'price' => 2000.00,
        'created_at' => '2023-10-02 11:30:00',
    ],
    [
        'user_id' => 3,
        'coin' => 3,
        'quantity' => 5,
        'transaction_type' => 'sell',
        'price' => 1.50,
        'created_at' => '2023-10-03 14:45:00',
    ],
    [
        'user_id' => 4,
        'coin' => 4,
        'quantity' => 2,
        'transaction_type' => 'buy',
        'price' => 150.00,
        'created_at' => '2023-10-04 09:15:00',
    ],
    [
        'user_id' => 5,
        'coin' => 5,
        'quantity' => 10,
        'transaction_type' => 'sell',
        'price' => 1.20,
        'created_at' => '2023-10-05 16:00:00',
    ],
    [
        'user_id' => 1,
        'coin' => 2,
        'quantity' => 2,
        'transaction_type' => 'buy',
        'price' => 2500.00,
        'created_at' => '2023-10-06 12:00:00',
    ],
    [
        'user_id' => 3,
        'coin' => 1,
        'quantity' => 1,
        'transaction_type' => 'buy',
        'price' => 32000.00,
        'created_at' => '2023-10-07 10:30:00',
    ],
    [
        'user_id' => 2,
        'coin' => 5,
        'quantity' => 5,
        'transaction_type' => 'buy',
        'price' => 1.50,
        'created_at' => '2023-10-08 15:45:00',
    ],
    [
        'user_id' => 4,
        'coin' => 3,
        'quantity' => 10,
        'transaction_type' => 'sell',
        'price' => 2.00,
        'created_at' => '2023-10-09 11:15:00',
    ],
    [
        'user_id' => 5,
        'coin' => 4,
        'quantity' => 5,
        'transaction_type' => 'buy',
        'price' => 180.00,
        'created_at' => '2023-10-10 14:00:00',
    ],
    [
        'user_id' => 1,
        'coin' => 5,
        'quantity' => 5,
        'transaction_type' => 'sell',
        'price' => 1.80,
        'created_at' => '2023-10-11 16:30:00',
    ],
    [
        'user_id' => 2,
        'coin' => 1,
        'quantity' => 2,
        'transaction_type' => 'buy',
        'price' => 33000.00,
        'created_at' => '2023-10-12 10:00:00',
    ],
];

$stmt = $conn->prepare("INSERT INTO transactions (user_id, quantity, transaction_type, price) VALUES (?, ?, ?, ?)");

foreach ($transactions as $transaction) {
    $stmt->bind_param('iisi', $transaction['user_id'], $transaction['quantity'], $transaction['transaction_type'], $transaction['price']);
    
    if ($stmt->execute()) {
        echo "Transaction for user_id " . $transaction['user_id'] . " added successfully.\n";
    } else {
        echo "Error adding transaction for user_id " . $transaction['user_id'] . ": " . $stmt->error . "\n";
    }
}