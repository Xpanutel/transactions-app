<?php
namespace Project\Controllers;

use \Core\Controller;
use \Project\Models\User;
use \Exception; 

session_start();

class UserController extends Controller 
{
    public function connect() {
        $conn = mysqli_connect("localhost", "root", "", "transactions-app");
        
        if (!$conn) {
            throw new Exception("Ошибка подключения к базе данных: " . mysqli_connect_error());
        }

        mysqli_set_charset($conn, 'utf8');
        
        return $conn; 
    }

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

            $user = new User();

            $user->getByID($email);
            if(!empty($user)) {
                throw new Exception("Данный email уже используется!");
            } else if(!empty($login)) {
                throw new Exception("Данный login уже используется!");
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
                        $this->title = "Личный кабинет";
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

        if (!isset($_SESSION['userData'])) {
            header('Location: /login');
        } 

        return $this->render('users/index');
    }

    public function balance() 
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $_SESSION['userData'];
            $summa = $_POST['summa'];

            $conn = $this->connect();

            if ($summa > 0) {
                try {
                    $sql = "UPDATE `users` SET `balance` = `balance` + ? WHERE `id` = ?;";
                    $stmt = $conn->prepare($sql);
                    
                    if ($stmt === false) {
                        throw new Exception("Ошибка при подготовке запроса: " . $conn->error);
                    }
            
                    $stmt->bind_param('ii', $summa, $user['id']);
                    
                    if ($stmt->execute()) {
                        echo "Баланс успешно пополнен на " . $summa;
                    } else {
                        throw new Exception("Ошибка при выполнении запроса: " . $stmt->error);
                    }
                } catch (Exception $e) {
                    echo "Произошла ошибка: " . $e->getMessage();
                }
            } else {
                echo "Сумма пополнения должна быть больше 0";
            }            
        } else {
            $this->title = 'Пополнение баланса';
            return $this->render('users/balance');
        }
    }
}

