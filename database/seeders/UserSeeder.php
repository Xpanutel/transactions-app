<?php

$users = [
    [
        'login' => 'john_doe',
        'name' => 'John',
        'surname' => 'Doe',
        'password' => password_hash('password123', PASSWORD_DEFAULT), 
        'email' => 'john@example.com',
    ],
    [
        'login' => 'jane_smith',
        'name' => 'Jane',
        'surname' => 'Smith',
        'password' => password_hash('securepassword', PASSWORD_DEFAULT),
        'email' => 'jane@example.com',
    ],
    [
        'login' => 'alice_jones',
        'name' => 'Alice',
        'surname' => 'Jones',
        'password' => password_hash('mypassword', PASSWORD_DEFAULT),
        'email' => 'alice@example.com',
    ],
    [
        'login' => 'bob_brown',
        'name' => 'Bob',
        'surname' => 'Brown',
        'password' => password_hash('bobspassword', PASSWORD_DEFAULT),
        'email' => 'bob@example.com',
    ],
    [
        'login' => 'charlie_black',
        'name' => 'Charlie',
        'surname' => 'Black',
        'password' => password_hash('charliespassword', PASSWORD_DEFAULT),
        'email' => 'charlie@example.com',
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
