<?php

namespace App\models;

use App\helpers\Connection;
use PDO;

class Table
{

    //достаем наши приемущества
    public static function all()
    {
        $query = Connection::make()->query("SELECT * FROM bar_tables");
        return $query->fetchAll();
    }

    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT * FROM bar_tables WHERE id = :id");
        $query->execute(["id" => $id]);
        return $query->fetch();
    }

    public static function addTable($data, $user_id)
    {
        $query = Connection::make()->prepare("INSERT INTO tables_reservation (time, date, duration, bar_table_id, user_id, created_at) VALUES (:time, :date, :duration, :bar_table_id, :user_id, :created_at)");
        $query->execute([
            "time" => $data["time"],
            "date" => $data["date"],
            "duration" => $data["duration"],
            "bar_table_id" => $data["table"],
            "user_id" => $user_id,
            "created_at"=> date("Y-m-d H:i:s")
        ]);
    }

    public static function showReservation($id)
    {
        $query = Connection::make()->prepare("SELECT tables_reservation.*,tables_reservation.id as id_reserv, bar_tables.number as number 
        FROM tables_reservation, bar_tables
        WHERE user_id = :id 
        AND bar_table_id  = bar_tables.id");
        $query->execute(["id" => $id]);
        return $query->fetchAll();
    }

    //вывод старых столов
    public static function showLastRes($id)
    {
        $query = Connection::make()->prepare("SELECT tables_reservation.*,tables_reservation.id as id_reserv, bar_tables.number as number 
        FROM tables_reservation, bar_tables
        WHERE user_id = :id 
        AND bar_table_id  = bar_tables.id AND `date` < CURRENT_DATE");
        $query->execute(["id" => $id]);
        return $query->fetchAll();
    }

    // вывод новых столов
    public static function showFutureRes($id)
    {
        $query = Connection::make()->prepare("SELECT tables_reservation.*,tables_reservation.id as id_reserv, bar_tables.number as number 
        FROM tables_reservation, bar_tables
        WHERE user_id = :id 
        AND bar_table_id  = bar_tables.id AND `date` >= CURRENT_DATE");
        $query->execute(["id" => $id]);
        return $query->fetchAll();
    }

    public static function showLast($user_id)
    {
        $query = Connection::make()->prepare("SELECT tables_reservation.*, bar_tables.number as number FROM tables_reservation, bar_tables WHERE user_id = :user_id AND tables_reservation.bar_table_id = bar_tables.id  ORDER BY created_at DESC LIMIT 1");
        $query->execute(["user_id" => $user_id]);
        return $query->fetch();
    }

    //поиск времени и продолжительности стола по дате
    public static function findTime($date, $table){
        $query = Connection::make()->prepare("SELECT `time`,`duration` FROM `tables_reservation` WHERE `date` = :date AND `bar_table_id` = :table");
        $query->execute(["date"=>$date, "table"=> $table]);
        return $query->fetchAll();
    }

    //изменение стола
    public static function update($tabl_id, $data, $img){
        $query = Connection::make()->prepare("UPDATE bar_tables SET count_seats = :count, image = :image, number = :number WHERE id = :id");
        $query->execute([
            "count" => $data["count"],
            "image"=> $img,
            "number"=> $data["number"],
            "id"=>$tabl_id
        ]);
    }

    // добавление стола
    public static function insert($data, $img){
        $query= Connection::make()->prepare("INSERT INTO bar_tables (count_seats, image, number) VALUES (:count, :image,:number)");
        $query->execute([
            "count"=>$data["count"],
            "image"=> $img,
            "number"=> $data["number"],
        ]);
    }

    //удаление стола
    public static function delete($id){
        $query = Connection::make()->prepare("DELETE FROM bar_tables WHERE id = :id");
        $query->execute(["id"=>$id]);
    }

    //вытаскиваем статус у заказа 
    public static function status($status){
        $query= Connection::make()->prepare("SELECT tables_reservation.*, users.phone, bar_tables.number 
        FROM tables_reservation 
        INNER JOIN users ON users.id = tables_reservation.user_id
        INNER JOIN bar_tables ON bar_tables.id = tables_reservation.bar_table_id
        WHERE status = :status ORDER BY id DESC");
        $query->execute(["status"=>$status]);
        return $query->fetchAll();
    }

    //вывод всех бронирований
    public static function allOrder(){
        $query = Connection::make()->query("SELECT tables_reservation.*, users.phone, bar_tables.number 
        FROM tables_reservation 
        INNER JOIN users ON users.id = tables_reservation.user_id
        INNER JOIN bar_tables ON bar_tables.id = tables_reservation.bar_table_id ORDER BY id DESC");
        return $query->fetchAll();
    }

    //изменение статуса 
    public static function updtStatus($status, $id){
        $query = Connection::make()->prepare("UPDATE tables_reservation SET status =:status WHERE id = :id");
        $query->execute([
            "status"=>$status,
            "id"=>$id
        ]);
    }

    //удаление записей, который были сделаны месяц назад
    public static function delete1Month(){
        $query = Connection::make()->query("DELETE FROM tables_reservation WHERE date < CURRENT_DATE - INTERVAL 1 MONTH");
    }

    //кол-во определенных записей по статусу
    public static function countStatus($status){
        $query = Connection::make()->prepare("SELECT COUNT(status) as count FROM tables_reservation WHERE status = :status");
        $query->execute(["status"=>$status]);
        return $query->fetch(\PDO::FETCH_COLUMN);
    }
}
