<?php

use App\models\Product;
use App\models\Table;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["auth"]["admin"]) || !$_SESSION["auth"]["admin"]){
    header("Location: /");
    die();
}

$title = "Удаление продукта";
$style = "admin";


$oldImg = Product::findId($_GET["id"])->image;
unlink("/upload/" . $oldImg);
Product::delete($_GET["id"]);
header("Location: /app/tables/admin/menu/menu.php");
