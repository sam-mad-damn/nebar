<?php

use App\models\User;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$title = "Профиль";
$style = "admin";

if(!isset($_SESSION["auth"]["admin"]) || !$_SESSION["auth"]["admin"]){
    header("Location: /");
    die();
}

$user = User::find($_SESSION["id"]);
$_SESSION["name"]= $user->name;


require_once $_SERVER['DOCUMENT_ROOT'] . '/views/admin/profile/profile.view.php';
