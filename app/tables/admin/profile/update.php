<?php

use App\models\User;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["auth"]["admin"]) || !$_SESSION["auth"]["admin"]){
    header("Location: /");
    die();
}

$style = "admin";
$title="Изменение профиля";
$user = User::find($_SESSION["id"]);

include $_SERVER['DOCUMENT_ROOT'] . '/views/admin/profile/update.view.php';
