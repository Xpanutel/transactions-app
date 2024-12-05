<?php

namespace Project\Controllers;

use \Core\Controller;

class UserController extends Controller 
{
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

            if (empty($username) || empty($password) || empty($email)) {
                throw new Exception("All fields are required.");
            }

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
