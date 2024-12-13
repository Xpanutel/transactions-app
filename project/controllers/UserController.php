<?php

namespace Project\Controllers;

use \Core\Controller;
use \Project\Models\User;

class UserController extends Controller 
{

    public function create() 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['userpass'];
            $email = $_POST['useremail'];

            if (empty($username) || empty($password) || empty($email)) {
                throw new Exception("All fields are required.");
            }

            try {
                $user = new User();
                $user->add($username, $password, $email);
                echo "The user has been successfully registered.";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            $this->title = 'Регистрация пользователя';
            return $this->render('users/reg');
        }
    }

    public function login($useremail) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = $_POST['userpass'];
            $email = $_POST['useremail'];

            if (empty($password) || empty($email)) {
                throw new Exception("All fields are required.");
            }

            try {
                $user = new User();
                $user->getById($email, $password);
                echo "The user has been successfully authorized.";
                $_SESSION['useremail'] = $email;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            $this->title = 'Авторизация пользователя';
            return $this->render('users/login');
        }
    }

    public function profile() {
        if(isset($_SESSION['user'])) {
            $userData = $_SESSION['user'];
        }
    }
}

