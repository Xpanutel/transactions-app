<?php

namespace Project\Models;

use \Core\Model;

class Crypto extends Model 
{
    public function getCryptocurrencies() 
    {
        return $this->findMany("SELECT * FROM coins;");
    }
    
    public function getPrice($currency) 
    {
        $url = "https://api.coingecko.com/api/v3/simple/price?ids={$currency}&vs_currencies=usd";
        $response = file_get_contents($url);
        
        if ($response !== FALSE) {
            $data = json_decode($response, true);
            if (isset($data[$currency])) {
                return $data[$currency]['usd'];
            }
        }
        return null;
    }
}