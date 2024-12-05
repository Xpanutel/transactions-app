<?php

namespace Project\Controllers;

use \Core\Controller;

class CryptoController extends Controller 
{
    private $model;

    public function __construct() 
    {
        $this->model = new CryptoModel();
    }

    public function index() 
    {
        $price = null; // Инициализация переменной

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['currency'])) {
            $currency = $_POST['currency'];
            $price = $this->model->getPrice($currency);
        }

        $cryptocurrencies = $this->model->getCryptocurrencies();
        
        // Подключаем представление
        include __DIR__ . '/../Views/CryptoView.php';
    }
}