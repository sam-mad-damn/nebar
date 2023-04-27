<?php

use App\models\Table;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["auth"]["admin"]) || !$_SESSION["auth"]["admin"]){
    header("Location: /");
    die();
}


$title = "Просмотр бронирования";
$style = "admin";

if (isset($_GET["waiting"])) {
    $st = "В ожидании";
}
else if (isset($_GET["confirmed"])){
    $st = "Подтвержден";
}
else if (isset($_GET["cancelled"])){
    $st = "Отменен";
}

if(isset($_GET["waiting"]) || isset($_GET["confirmed"]) ||isset($_GET["cancelled"])){
    $orders = Table::status($st);
}
else {
    $orders = Table::allOrder();
}

if(isset($_GET["delete"])){
    Table::delete1Month();
}

$waiting = Table::countStatus("В ожидании");
$confirmed = Table::countStatus("Подтвержден");
$cancelled = Table::countStatus("Отменен");

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/admin/book/book.view.php';
