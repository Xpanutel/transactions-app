<?php

namespace Project\Controllers;

use \Core\Controller;
use \Project\Models\User;

class UserController extends Controller 
{

    public function show() 
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (empty($username) || empty($password)) {
                throw new Exception("All fields are required.");
            }
            
             try {
                User::getById($username);
             } catch (\Throwable $th) {
                echo $th->getMessage();
             }
        }
    }

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
            return $this->render('users/index');
        }
    }
}
