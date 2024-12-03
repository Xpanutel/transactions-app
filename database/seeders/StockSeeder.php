<?php

require_once __DIR__ . '/app/config/connect.php';

$stocks = [
    [
        'ticker' => 'AAPLE',
        'name' => 'Apple Inc.',
        'current_price' => 150.25,
    ],
    [
        'ticker' => 'GOOGLE',
        'name' => 'Alphabet Inc.',
        'current_price' => 2800.50,
    ],
    [
        'ticker' => 'AMZN',
        'name' => 'Amazon.com Inc.',
        'current_price' => 3400.00,
    ],
    [
        'ticker' => 'MSFT',
        'name' => 'Microsoft Corporation',
        'current_price' => 299.99,
    ],
    [
        'ticker' => 'TSLA',
        'name' => 'Tesla Inc.',
        'current_price' => 730.00,
    ],
    [
        'ticker' => 'FB',
        'name' => 'Meta Platforms Inc.',
        'current_price' => 355.45,
    ],
    [
        'ticker' => 'NVDA',
        'name' => 'NVIDIA Corporation',
        'current_price' => 220.15,
    ],
];

$stmt = $conn->prepare("INSERT INTO stocks (ticker, name, current_price) VALUES (?, ?, ?)");

foreach ($stocks as $stock) {
    $stmt->bind_param('ssd', $stock['ticker'], $stock['name'], $stock['current_price']);
    
    if ($stmt->execute()) {
        echo "Stock " . $stock['ticker'] . " added successfully.\n";
    } else {
        echo "Error adding stock " . $stock['ticker'] . ": " . $stmt->error . "\n";
    }
}

$stmt->close();
$conn->close();
