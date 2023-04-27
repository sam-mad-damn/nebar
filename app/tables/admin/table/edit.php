<?php

use App\models\Table;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["auth"]["admin"]) || !$_SESSION["auth"]["admin"]){
    header("Location: /");
    die();
}

$title = "Изменение стола";
$style = "admin";

$table = Table::find($_GET["id"]);

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/admin/table/edit.view.php';