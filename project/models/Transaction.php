<?php

namespace Project\Models;

use \Core\Model;

class Transaction extends Model 
{
    public function add($user_id, $coin_id, $quantity, $transaction_type, $price) 
    {
        $sql = "INSERT INTO transactions (user_id, coin_id, quantity, transaction_type, price) 
        VALUES ('$user_id', '$coin_id', '$quantity', '$transaction_type', '$price')";
        $this->create($sql);
    }

    public function getById($id)
	{
        return $this->findOne("SELECT * FROM transactions WHERE transaction_id = '$email'");
	}
		
	public function getAll()
	{
		return $this->findMany("SELECT * FROM transactions");
	}
}
