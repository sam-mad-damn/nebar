<?php

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["auth"]["admin"]) || !$_SESSION["auth"]["admin"]){
    header("Location: /");
    die();
}

$title = "Добавление стола";
$style = "admin";

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/admin/table/insert.view.php';