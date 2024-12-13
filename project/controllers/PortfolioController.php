<?php

namespace Project\Controllers;

use \Core\Controller;
use \Project\Models\Portfolio;
use \Project\Models\Crypto;

class PortfolioController extends Controller 
{
    public function buy() 
    {
        $crypto = new Crypto();
        $price = null; 
        $cryptocurrencies = $crypto->getCryptocurrencies();

        $this->title = 'Покупка монеты';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $quantity = intval($_POST['quantity']);
            $coin_id = $_POST['coin_id'];

            if($quantity != 0) {
                $portfolio = new Portfolio();
                $portfolio->add($coin_id, 2, $quantity);
            }
        } else {
            return $this->render('crypto/buy', [
                'cryptocurrencies' => $cryptocurrencies,
                'price' => $price,
            ]);
        }
        
    }
}