```php
<?php

require_once __DIR__ . '/app/config/connect.php';

$transactions = [
    [
        'user_id' => 1,
        'stock_id' => 1,
        'quantity' => 5,
        'transaction_type' => 'buy',
        'price' => 150.25,
    ],
    [
        'user_id' => 1,
        'stock_id' => 2,
        'quantity' => 2,
        'transaction_type' => 'sell',
        'price' => 2800.50,
    ],
    [
        'user_id' => 2,
        'stock_id' => 3,
        'quantity' => 10,
        'transaction_type' => 'buy',
        'price' => 3400.00,
    ],
    [
        'user_id' => 2,
        'stock_id' => 4,
        'quantity' => 1,
        'transaction_type' => 'sell',
        'price' => 299.99,
    ],
    [
        'user_id' => 3,
        'stock_id' => 5,
        'quantity' => 3,
        'transaction_type' => 'buy',
        'price' => 730.00,
    ],
    [
        'user_id' => 3,
        'stock_id' => 6,
        'quantity' => 4,
        'transaction_type' => 'sell',
        'price' => 355.45,
    ],
];

$stmt = $conn->prepare("INSERT INTO transactions (user_id, stock_id, quantity, transaction_type, price) VALUES (?, ?, ?, ?, ?)");

foreach ($transactions as $transaction) {
    $stmt->bind_param('iiisi', $transaction['user_id'], $transaction['stock_id'], $transaction['quantity'], $transaction['transaction_type'], $transaction['price']);
    
    if ($stmt->execute()) {
        echo "Transaction for user_id " . $transaction['user_id'] . " and stock_id " . $transaction['stock_id'] . " added successfully.\n";
    } else {
        echo "Error adding transaction for user_id " . $transaction['user_id'] . " and stock_id " . $transaction['stock_id'] . ": " . $stmt->error . "\n";
    }
}

$stmt->close();
$conn->close();