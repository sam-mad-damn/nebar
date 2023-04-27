<?php

use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["auth"]["admin"]) || !$_SESSION["auth"]["admin"]){
    header("Location: /");
    die();
}


$title = "Меню";
$style = "admin";

if (isset($_GET["dish"])) {
    $st = "1";
}
else if (isset($_GET["drink"])){
    $st = "2";
}

if(isset($_GET["dish"]) || isset($_GET["drink"])){
    $products = Product::productsByCategory($st);
}
else {
    $products = Product::allAdmin();    
}


require_once $_SERVER['DOCUMENT_ROOT'] . '/views/admin/menu/menu.view.php';
