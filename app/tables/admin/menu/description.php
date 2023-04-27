<?php

use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["auth"]["admin"]) || !$_SESSION["auth"]["admin"]){
    header("Location: /");
    die();
}


$title = "Просмотр продукта";
$style = "admin";

$_SESSION["prod"] = $_GET["id"]??$_POST["id"];

if(isset($_POST["updt"])){
    Product::updateDescription($_POST["description"], $_POST["id"]);
}

$product = Product::findId($_SESSION["prod"]);

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/admin/menu/description.view.php';