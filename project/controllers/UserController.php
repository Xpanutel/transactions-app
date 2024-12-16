<?php
namespace Project\Controllers;

use \Core\Controller;
use \Project\Models\User;

session_start();

class UserController extends Controller 
{

    public function create() 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['login'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $password = $_POST['userpass'];
            $email = $_POST['useremail'];

            if (empty($name) || empty($surname) || empty($login) || empty($password) || empty($email)) {
                throw new Exception("All fields are required.");
            }

            try {
                $user = new User();
                $user->add($login, $name, $surname, $password, $email);
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
                $userData = $user->getById($email);

                if ($userData) {
                    if (password_verify($password, $userData['password'])) {
                        echo "The user has been successfully authorized.";
                        $this->title = "Узнать цену крипты";
                        $_SESSION['userData'] = $userData;
                        return $this->render('users/index', [
                            'userData' => $userData,
                        ]);
                    } else {
                        throw new Exception("Неверный пароль.");
                    }
                } else {
                    throw new Exception("Пользователь не найден.");
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            $this->title = 'Авторизация пользователя';
            return $this->render('users/login');
        }
    }

    public function profile() {
        return $this->render('users/index');
    }
}

