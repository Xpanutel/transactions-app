<?php

namespace App\UserModel;

class UserModel {
    private $conn;

    private function __construct($connection) {
        $this->conn = $connection;
    }

    public function index() {
        $stmt = $this->conn->prepare('SELECT * FROM users');
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function create() {
        if (empty($username) || empty($password) || empty($email)) {
            throw new Exception("All fields are required.");
        }

        $stmt = $this->conn->prepare('INSERT INTO users (username, password, email) VALUES (?, ?, ?)');

        if ($stmt === false) {
            throw new Exception("Error preparing statement: " . $this->conn->error);
        }

        $stmt->bind_param('sss', $username, $password, $email);

        if (!$stmt->execute()) {
            throw new Exception("Error during registration: " . $stmt->error);
        }

        $stmt->close();
    }


    public function show($username) {
        $stmt = $this->conn->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # code...
        }
    }

    public function daleted() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # code...
        }
    }
}
