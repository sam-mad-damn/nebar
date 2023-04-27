<?php

use App\models\Staff;
use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["auth"]["admin"]) || !$_SESSION["auth"]["admin"]){
    header("Location: /");
    die();
}


$title = "Изменение продукта";
$style = "admin";

$categories = Product::category();
$weights = Product::weight();
$prod = Product::findId($_GET["id"]);

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/admin/menu/edit.view.php';