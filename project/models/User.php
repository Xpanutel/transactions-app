<?php

namespace Project\Models;
use \Core\Model;
	
class User extends Model
{
	public function getById($username)
	{
		return $this->findOne("SELECT * FROM users WHERE username = $username");
	}
		
	public function getAll()
	{
		return $this->findMany("SELECT * FROM users");
	}

    public function add($username, $userpass, $useremail) 
    {
        // Хэшируем пароль перед сохранением
        $hashedPassword = password_hash($userpass, PASSWORD_DEFAULT);

        return $this->create("INSERT INTO users (username, password, email) VALUES ('$username', '$hashedPassword', '$useremail')");
    }


    public function delete($id) 
    {
        return $this->delete("DELETE FROM users WHERE id = $id");
    }
}