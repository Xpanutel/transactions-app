<?php

namespace Project\Models;

use \Core\Model;

class Portfolio extends Model
{
    public function getById($id)
	{
        return $this->findOne("SELECT * FROM portfolios WHERE coin_id = '$id'");
	}
		
	public function getAll()
	{
		return $this->findMany("SELECT * FROM portfolios");
	}

    public function add($user_id, $coin_id, $quantity) 
    {
        return $this->create("INSERT INTO portfolios (user_id, coin_id, quantity) VALUES ('$user_id', '$coin_id', '$quantity');");
    }
}