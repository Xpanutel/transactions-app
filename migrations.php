<?php

require_once __DIR__ . '/app/config/connect.php';

$files = [
    'database/migrations/2024_12_03_000001_create_user_table.php',
    'database/migrations/2024_12_03_000002_create_stocks_table.php',
    'database/migrations/2024_12_03_000003_create_portfolios_table.php',
    'database/migrations/2024_12_03_000004_create_transactions_table.php'
];

foreach ($files as $file) {
    if (file_exists($file)) {
        include $file;
    } else {
        echo "File $file not found.\n";
    }
}