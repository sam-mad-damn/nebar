<?php

use App\models\Table;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$title = "Оформление бронирования";
$style = "style";

if (!isset($_SESSION["auth"]) || empty($_SESSION["auth"])){
    header("Location: /app/tables/client/user/auth.php");
}

$table = Table::find($_GET["id"]);

$time = date_create("00:00");
$timeArr = [];

for ($i = 0; $i < 24; $i++) {
    date_add($time, date_interval_create_from_date_string("+ 1hours"));
    array_push($timeArr, date_format($time, "H:i"));
}


if (isset($_POST["arrange"])) {
    $_POST["date"] =  date_create($_POST["date"])->Format('Y-m-d');
    Table::addTable($_POST, $_SESSION["id"]);

    header("Location: /app/tables/client/menu/menu.php");
}

include $_SERVER["DOCUMENT_ROOT"] . "/views/client/book/arrange.view.php";
