<?php

require_once __DIR__ . '/app/config/connect.php';

$users = [
    [
        'username' => 'john_doe',
        'password' => password_hash('password123', PASSWORD_DEFAULT), 
        'email' => 'john@example.com',
    ],
    [
        'username' => 'jane_smith',
        'password' => password_hash('securepassword', PASSWORD_DEFAULT),
        'email' => 'jane@example.com',
    ],
    [
        'username' => 'alice_jones',
        'password' => password_hash('mypassword', PASSWORD_DEFAULT),
        'email' => 'alice@example.com',
    ],
    [
        'username' => 'bob_brown',
        'password' => password_hash('bobspassword', PASSWORD_DEFAULT),
        'email' => 'bob@example.com',
    ],
];

$stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");

foreach ($users as $user) {
    $stmt->bind_param('sss', $user['username'], $user['password'], $user['email']);
    if($stmt->execute()) {
        echo "User " .  $user['username'] . " created successfully.\n";
    }else{
        echo "Error creating user " . $user['username'] . ": " . $stmt->error . "\n";
    }
}


$stmt->close();
$conn->close();
