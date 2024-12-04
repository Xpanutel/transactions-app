<?php

$transactions = [
    [
        'user_id' => 1,
        'quantity' => 5,
        'transaction_type' => 'buy',
        'price' => 150.25,
    ],
    [
        'user_id' => 1,
        'quantity' => 2,
        'transaction_type' => 'sell',
        'price' => 2800.50,
    ],
    [
        'user_id' => 2,
        'quantity' => 10,
        'transaction_type' => 'buy',
        'price' => 3400.00,
    ],
    [
        'user_id' => 2,
        'quantity' => 1,
        'transaction_type' => 'sell',
        'price' => 299.99,
    ],
    [
        'user_id' => 3,
        'quantity' => 3,
        'transaction_type' => 'buy',
        'price' => 730.00
    ],
    [
        'user_id' => 3,
        'quantity' => 4,
        'transaction_type' => 'sell',
        'price' => 355.45,
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