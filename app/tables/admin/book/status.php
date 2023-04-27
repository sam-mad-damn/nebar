<?php

use App\models\Table;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["auth"]["admin"]) || !$_SESSION["auth"]["admin"]){
    header("Location: /");
    die();
}


$title = "Просмотр бронирования";
$style = "admin";

Table::updtStatus($_POST["status"], $_POST["id"]);

header("Location: /app/tables/admin/book/book.php");
