<?php

require_once __DIR__ . '/app/config/connect.php';

$seeders = [
    'UserSeeder.php',
    'PortfolioSeeder.php',
    'TransactionSeeder.php',
];

foreach ($seeders as $seeder) {
    require_once __DIR__ . '/database/seeders/' . $seeder;
}

$conn->close();
