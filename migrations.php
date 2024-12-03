<?php

require_once __DIR__ . '/app/config/connect.php';

$files = [
    '2024_12_03_000001_create_user_table.php',
    '2024_12_03_000003_create_portfolios_table.php',
    '2024_12_03_000004_create_transactions_table.php'
];

foreach ($files as $file) {
    if (file_exists($file)) {
        require_once __DIR__ . '/database/migrations/' . $file;
    } else {
        echo "File $file not found.\n";
    }
}