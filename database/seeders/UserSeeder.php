<?php

$users = [
    [
        'login' => 'john_doe',
        'name' => 'John',
        'surname' => 'Doe',
        'password' => password_hash('password123', PASSWORD_DEFAULT), 
        'email' => 'john@example.com',
        'balance' => 10.2,
    ],
    [
        'login' => 'jane_smith',
        'name' => 'Jane',
        'surname' => 'Smith',
        'password' => password_hash('securepassword', PASSWORD_DEFAULT),
        'email' => 'jane@example.com',
        'balance' => 63.25,
    ],
    [
        'login' => 'alice_jones',
        'name' => 'Alice',
        'surname' => 'Jones',
        'password' => password_hash('mypassword', PASSWORD_DEFAULT),
        'email' => 'alice@example.com',
        'balance' => 8.11,
    ],
    [
        'login' => 'bob_brown',
        'name' => 'Bob',
        'surname' => 'Brown',
        'password' => password_hash('bobspassword', PASSWORD_DEFAULT),
        'email' => 'bob@example.com',
        'balance' => 130.26,
    ],
    [
        'login' => 'charlie_black',
        'name' => 'Charlie',
        'surname' => 'Black',
        'password' => password_hash('charliespassword', PASSWORD_DEFAULT),
        'email' => 'charlie@example.com',
        'balance' => 9.99,
    ],
];


$stmt = $conn->prepare("INSERT INTO users (login, name, surname, password, email, balance) VALUES (?, ?, ?, ?, ?, ?)");

foreach ($users as $user) {
    $stmt->bind_param('sssssi', $user['login'], $user['name'], $user['surname'], $user['password'], $user['email'], $user['balance']);
    if($stmt->execute()) {
        echo "User " .  $user['login'] . " created successfully.\n";
    }else{
        echo "Error creating user " . $user['login'] . ": " . $stmt->error . "\n";
    }
}
