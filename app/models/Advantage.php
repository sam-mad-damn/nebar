<?php 
namespace App\models;

use App\helpers\Connection;

class Advantage{

    //достаем наши приемущества
    public static function show(){
        $query = Connection::make()->query("SELECT * FROM advantages");
        return $query->fetchAll();
    }
}