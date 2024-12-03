<?php

require_once __DIR__ . '/app/config/connect.php';

$seeders = [
    'UserSeeder.php',
    'StockSeeder.php',
    'PortfolioSeeder.php',
    'TransactionSeeder.php',
];

foreach ($seeders as $seeder) {
    require_once __DIR__ . '/seeders/' . $seeder;
}

$conn->close();
