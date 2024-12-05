<?php

class CryptoModel {
    public $cryptocurrencies = [
        'bitcoin' => 'Bitcoin (BTC)',
        'ethereum' => 'Ethereum (ETH)',
        'ripple' => 'Ripple (XRP)',
        'litecoin' => 'Litecoin (LTC)',
        'cardano' => 'Cardano (ADA)',
        'polkadot' => 'Polkadot (DOT)',
        'chainlink' => 'Chainlink (LINK)',
        'dogecoin' => 'Dogecoin (DOGE)',
        'stellar' => 'Stellar (XLM)',          
        'uniswap' => 'Uniswap (UNI)',          
        'bitcoin-cash' => 'Bitcoin Cash (BCH)', 
        'solana' => 'Solana (SOL)',            
        'monero' => 'Monero (XMR)',            
        'vechain' => 'VeChain (VET)',          
        'tron' => 'Tron (TRX)',                
        'dash' => 'Dash (DASH)',                
        'tether' => 'Tether (USDT)',            
        'ethereum-classic' => 'Ethereum Classic (ETC)', 
        'algorand' => 'Algorand (ALGO)',       
        'cosmos' => 'Cosmos (ATOM)',            
        'neo' => 'Neo (NEO)',                  
        'aave' => 'Aave (AAVE)',               
        'compound' => 'Compound (COMP)',       
        'bitcoin-gold' => 'Bitcoin Gold (BTG)', 
        'zilliqa' => 'Zilliqa (ZIL)',          
        'holo' => 'Holo (HOT)',                 
        'elrond' => 'Elrond (EGLD)',           
        'fantom' => 'Fantom (FTM)',            
        'maker' => 'Maker (MKR)',              
        'kusama' => 'Kusama (KSM)',            
    ];

    public function getCryptocurrencies() {
        return $this->cryptocurrencies;
    }

    public function getPrice($currency) {
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