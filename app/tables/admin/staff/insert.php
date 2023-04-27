<?php

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["auth"]["admin"]) || !$_SESSION["auth"]["admin"]){
    header("Location: /");
    die();
}

$title = "Добавление работника";
$style = "admin";

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/admin/staff/insert.view.php';