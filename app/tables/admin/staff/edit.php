<?php

use App\models\Staff;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["auth"]["admin"]) || !$_SESSION["auth"]["admin"]){
    header("Location: /");
    die();
}


$title = "Изменение персонала";
$style = "admin";


$pers = Staff::find($_GET["id"]);

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/admin/staff/edit.view.php';