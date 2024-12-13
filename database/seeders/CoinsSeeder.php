<?php

$coins = [
    [
        "coin_id" => "bitcoin",
        "fullname" => "Bitcoin (BTC)"
    ],
    [
        "coin_id" => "ethereum",
        "fullname" => "Ethereum (ETH)"
    ],
    [
        "coin_id" => "ripple",
        "fullname" => "Ripple (XRP)"
    ],
    [
        "coin_id" => "litecoin",
        "fullname" => "Litecoin (LTC)"
    ],
    [
        "coin_id" => "cardano",
        "fullname" => "Cardano (ADA)"
    ],
    [
        "coin_id" => "polkadot",
        "fullname" => "Polkadot (DOT)"
    ],
    [
        "coin_id" => "chainlink",
        "fullname" => "Chainlink (LINK)"
    ],
    [
        "coin_id" => "dogecoin",
        "fullname" => "Dogecoin (DOGE)"
    ],
    [
        "coin_id" => "stellar",
        "fullname" => "Stellar (XLM)"
    ],
    [
        "coin_id" => "uniswap",
        "fullname" => "Uniswap (UNI)"
    ],
    [
        "coin_id" => "bitcoin-cash",
        "fullname" => "Bitcoin Cash (BCH)"
    ],
    [
        "coin_id" => "solana",
        "fullname" => "Solana (SOL)"
    ],
    [
        "coin_id" => "monero",
        "fullname" => "Monero (XMR)"
    ],
    [
        "coin_id" => "vechain",
        "fullname" => "VeChain (VET)"
    ],
    [
        "coin_id" => "tron",
        "fullname" => "Tron (TRX)"
    ],
    [
        "coin_id" => "dash",
        "fullname" => "Dash (DASH)"
    ],
    [
        "coin_id" => "tether",
        "fullname" => "Tether (USDT)"
    ],
    [
        "coin_id" => "ethereum-classic",
        "fullname" => "Ethereum Classic (ETC)"
    ],
    [
        "coin_id" => "algorand",
        "fullname" => "Algorand (ALGO)"
    ],
    [
        "coin_id" => "cosmos",
        "fullname" => "Cosmos (ATOM)"
    ],
    [
        "coin_id" => "neo",
        "fullname" => "Neo (NEO)"
    ],
    [
        "coin_id" => "aave",
        "fullname" => "Aave (AAVE)"
    ],
    [
        "coin_id" => "compound",
        "fullname" => "Compound (COMP)"
    ],
    [
        "coin_id" => "bitcoin-gold",
        "fullname" => "Bitcoin Gold (BTG)"
    ],
    [
        "coin_id" => "zilliqa",
        "fullname" => "Zilliqa (ZIL)"
    ],
    [
        "coin_id" => "holo",
        "fullname" => "Holo (HOT)"
    ],
    [
        "coin_id" => "elrond",
        "fullname" => "Elrond (EGLD)"
    ],
    [
        "coin_id" => "fantom",
        "fullname" => "Fantom (FTM)"
    ],
    [
        "coin_id" => "maker",
        "fullname" => "Maker (MKR)"
    ],
    [
        "coin_id" => "kusama",
        "fullname" => "Kusama (KSM)"
    ],
];

$stmt = $conn->prepare("INSERT INTO coins (coind_id, fullname) VALUES (?, ?)");

foreach ($coins as $coin) {
    $stmt->bind_param('ii', $coin['coind_id'],  $coin['fullname']);
    
    if ($stmt->execute()) {
        echo "Coin entry " . $coin['coind_id'] . " added successfully.\n";
    } else {
        echo "Error adding coin entry " . $coin['coind_id'] .  ": " . $stmt->error . "\n";
    }
}