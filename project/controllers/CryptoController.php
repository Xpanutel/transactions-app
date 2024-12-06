<?php

namespace Project\Controllers;

use \Core\Controller;
use Project\Models\Crypto;

class CryptoController extends Controller 
{

    public function index() 
    {
        $crypto = new Crypto();
        $price = null; 
        $cryptocurrencies = $crypto->getCryptocurrencies();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['currency'])) {
            $currency = $_POST['currency'];
            $price = $crypto->getPrice($currency);
            return $this->render('crypto/index', [
                'cryptocurrencies' => $cryptocurrencies,
                'price' => $price,
                'currency' => $currency,
            ]);
        } else {
            $this->title = "Узнать цену крипты";
            return $this->render('crypto/index', [
                'cryptocurrencies' => $cryptocurrencies,
                'price' => $price,
            ]);
        }
    }
}