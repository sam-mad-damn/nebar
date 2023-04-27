<?php

namespace App\models;

use App\helpers\Connection;

//все методы необходимые для работы с пользователем
class User
{

    public static function insert($data)
    {
        $query = Connection::make()->prepare("INSERT INTO users (name, phone, email, password) VALUES (:name,:phone,:email, :password)");

        return $query->execute([
            "name" => $data["name"],
            "email" => $data["email"],
            "phone" => $data["phone"],
            "password" => password_hash($data["password"], PASSWORD_DEFAULT)
        ]);
    }

    //дабаление админа
    public static function insertAdmin($data)
    {
        $query = Connection::make()->prepare("INSERT INTO users (name, phone, email, password, role_id) VALUES (:name,:phone,:email, :password, 1)");

        return $query->execute([
            "name" => $data["name"],
            "email" => $data["email"],
            "phone" => $data["phone"],
            "password" => password_hash($data["password"], PASSWORD_DEFAULT)
        ]);
    }

    public static function getUser($login, $password)
    {
        $query = Connection::make()->prepare("SELECT * FROM users WHERE phone = :phone");
        $query->execute(["phone" => $login]);
        $user = $query->fetch();
        if (password_verify($password, $user->password)) {
            return $user;
        }
        return null;
    }

    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT users.* FROM users WHERE users.id = :userID");
        $query->execute(["userID" => $id]);
        $user = $query->fetch();
        return $user;
    }

    public static function update($data)
    {
        $query = Connection::make()->prepare("UPDATE users SET users.name = :name , phone = :phone, email = :email WHERE users.id = :id");
        $query->execute([
            "name" => $data["name"],
            "phone" => $data["phone"],
            "email" => $data["email"],
            "id" => $data["id"]
        ]);
        $user = $query->fetch();
        return $user;
    }
}
