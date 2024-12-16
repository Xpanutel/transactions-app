<?php

namespace Project\Controllers;

use \Core\Controller;
use \Project\Models\Transaction;
use \Project\Models\Crypto;
use \Exception; 

session_start();

class TransactionController extends Controller 
{
    public function add() 
    {
        $crypto = new Crypto();
        $transaction = new Transaction();
        $cryptocurrencies = $crypto->getCryptocurrencies();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['userData']['id'];
            $coin_id = $_POST['coin_id'];
            $quantity = $_POST['quantity'];
            $transaction_type = $_POST['transaction_type'];

            $price = 0;

            if (empty($coin_id) || empty($quantity) || empty($transaction_type)) {
                throw new Exception("All fields are required.");
            } 

            try {
                $cena = $crypto->getPrice($coin_id);
                $price = $cena * $quantity;
                $transaction->add($user_id, $coin_id, $quantity, $transaction_type, $price);
                echo 'Операция ' . $transaction_type . ' пользователем ' . $user_id . ' по ' . $coin_id . ' за ' . $price . ' успешна выполнена';
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            $this->title = 'Покупка монеты';
            return $this->render('crypto/buy', [
                'cryptocurrencies' => $cryptocurrencies,
            ]);
        }
    }
}
