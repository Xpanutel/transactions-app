<?php

require_once __DIR__ . '/project/config/connection.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_query($conn, "SET NAMES 'utf8'");

$seeders = [
    'UserSeeder.php',
    'CoinsSeeder.php',
    'PortfolioSeeder.php',
    'TransactionSeeder.php',
];

foreach ($seeders as $seeder) {
    echo $seeder . ": the download has started. \n\n";
    require_once __DIR__ . '/database/seeders/' . $seeder;
    echo "\n" . $seeder . ": successfully uploaded. \n\n";
}

$conn->close();