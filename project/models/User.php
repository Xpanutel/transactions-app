<?php

namespace Project\Models;
use \Core\Model;
	
class User extends Model
{
	public function getById($email)
	{
        return $this->findOne("SELECT * FROM users WHERE email = '$email'");
	}
		
	public function getAll()
	{
		return $this->findMany("SELECT * FROM users");
	}

    public function add($login, $name, $surname, $userpass, $useremail) 
    {
        // Хэшируем пароль перед сохранением
        $hashedPassword = password_hash($userpass, PASSWORD_DEFAULT);
        return $this->create("INSERT INTO users (login, name, surname, password, email) VALUES 
            ('$login', '$name', '$surname', '$hashedPassword', '$useremail')");
    }

    public function delete($id) 
    {
        return $this->delete("DELETE FROM users WHERE id = $id");
    }
}