<?php

use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["auth"]["admin"]) || !$_SESSION["auth"]["admin"]){
    header("Location: /");
    die();
}


$title = "Добавление продукта";
$style = "admin";

$categories = Product::category();
$weights = Product::weight();

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/admin/menu/insert.view.php';