<?php

namespace Project\Controllers;

use \Core\Controller;
use \Project\Models\Portfolio;
use \Project\Models\Crypto;

session_start();

class PortfolioController extends Controller 
{
    public function dostup() 
    {
        if (isset($_SESSION['userData'])) {
            $this->title = 'Авторизация пользователя'; 
            return $this->render('users/login', [
                'title' => $this->title 
            ]);
        }
    }
    
    public function buy() 
    {
        if (!isset($_SESSION['userData'])) {
            header('Location: /login');
        } else {
            $crypto = new Crypto();
            $price = null; 
            $cryptocurrencies = $crypto->getCryptocurrencies();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $quantity = intval($_POST['quantity']);
                $coin_id = $_POST['coin_id'];
                $user_id = $_SESSION['userData']['id'];

                $portfolio = new Portfolio();

                if($quantity != 0) {
                    $portfolio->add($user_id, $coin_id, $quantity);  
                    $price = $crypto->getPrice($coin_id);
                    echo 'Пользователь ' . $user_id . ' успешно купил ' . $coin_id . ' в количестве ' . $quantity . "\n\n";
                    echo 'Цена выбранной валюты: ' . $price . "\n\n";
                    echo 'Общая стоимость: ' . $price*$quantity;
                }
            } else {
                return $this->render('crypto/buy', [
                    'cryptocurrencies' => $cryptocurrencies,
                    'price' => $price,
                    $this->title = 'Покупка монеты',
                ]);
            }
        }    
    }
}