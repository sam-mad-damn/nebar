<?php

use App\models\Table;
use App\models\User;

session_start();

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$style = "profile";
$title="Профиль";

if(!isset($_SESSION["auth"]) || !$_SESSION["auth"]){
    header("Location: /app/tables/client/user/create.php");
    die();
}

$user = User::find($_SESSION["id"]);
$_SESSION["name"]= $user->name;

if(!isset($_GET["res"]) || empty($_GET["res"])){
    $reserv = Table::showReservation($_SESSION["id"]);
}else if($_GET["res"] == 1){
    $reserv = Table::showLastRes($_SESSION["id"]);
}
else if($_GET["res"] == 2){
    $reserv = Table::showFutureRes($_SESSION["id"]);
}




include $_SERVER["DOCUMENT_ROOT"] . "/views/client/user/profile.view.php";
