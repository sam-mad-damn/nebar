<?php

use App\models\Staff;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["auth"]["admin"]) || !$_SESSION["auth"]["admin"]){
    header("Location: /");
    die();
}

$title = "Просмотр персонала";
$style = "admin";

if(!isset($_SESSION["auth"]["admin"]) || !$_SESSION["auth"]["admin"]){
    header("location: /");
    die();
}

if (isset($_GET["shef"])) {
    $st = "Повар";
}
else if (isset($_GET["barmen"])){
    $st = "Бармен";
}

if(isset($_GET["shef"]) || isset($_GET["barmen"])){
    $staff = Staff::allByRole($st);
}
else {
    $staff = Staff::all();    
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/admin/staff/staff.view.php';
