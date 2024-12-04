<?php

namespace App\UserController;

use App\UserModel\UserModel;
require_once __DIR__ . '/app/config/connect.php';

class UserController {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection;
    }

    public function index() {
        $userModel = new UserModel($this->conn);
        return $userModel->index(); 
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            try {
                $this->userModel->createUser($username, $password, $email);
                echo "The user has been successfully registered.";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            // А тут логика будет какая нибудь
        }
    }
}
