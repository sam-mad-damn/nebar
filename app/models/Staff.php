<?php 
namespace App\models;

use App\helpers\Connection;

class Staff{

    public static function allByRole($role){
        $query = Connection::make()->prepare("SELECT * FROM staff  WHERE role = :role");
        $query->execute(["role"=>$role]);
        return $query->fetchAll();
    }

    public static function all(){
        $query = Connection::make()->query("SELECT * FROM staff");
        return $query->fetchAll();
    }

    public static function find($id){
        $query = Connection::make()->prepare("SELECT * FROM staff WHERE id = :id");
        $query->execute(["id"=>$id]);
        return $query->fetch();
    }

    public static function update($id, $data,$img){
        $query = Connection::make()->prepare("UPDATE staff SET image = :image, name = :name, role = :role, description = :description WHERE id= :id");
        $query->execute([
            "image"=>$img,
            "name"=>$data["name"],
            "id"=>$id,
            "role"=>$data["role"],
            "description" => $data["description"]
        ]);
    }

    public static function insert($data, $img){
        $query = Connection::make()->prepare("INSERT INTO staff (name, image, role, description) VALUES (:name, :image, :role, :description)");
        $query->execute([
            "name"=>$data["name"],
            "image"=>$img,
            "role" => $data["role"],
            "description"=> $data["description"]
        ]);
    }

    public static function delete($id)
    {
        $query = Connection::make()->prepare("DELETE FROM staff WHERE id=:id");
        $query->execute(["id"=>$id]);
    }
}