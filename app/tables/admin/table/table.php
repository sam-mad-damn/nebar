<?php

use App\models\Table;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["auth"]["admin"]) || !$_SESSION["auth"]["admin"]){
    header("Location: /");
    die();
}

$title = "Просмотр столов";
$style = "admin";

$tables = Table::all();

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/admin/table/table.view.php';
