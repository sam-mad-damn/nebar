<?php

use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["auth"]["admin"]) || !$_SESSION["auth"]["admin"]){
    header("Location: /");
    die();
}


$title = "Просмотр продуктов";
$style = "admin";

$products = Product::allInOrder($_GET["id"]);

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/admin/book/all.product.view.php';
