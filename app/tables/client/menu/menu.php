<?php

use App\models\Product;
use App\models\Table;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$style = "style";
$title = "Меню";

$category = 2;

if (isset($_GET["category"])) {
    $category = $_GET["category"];
}



if (isset($_SESSION["auth"]) || !empty($_SESSION["auth"])) {
    if (!empty($_SESSION["id"]) || isset($_SESSION["id"])) {
        $table = Table::showLast($_SESSION["id"]);
        if ($table != false) {
            $prods = Product::allOrder($table->id);
        } 
    }
}
$products = Product::productsByCategory($category);

include $_SERVER['DOCUMENT_ROOT'] . '/views/client/menu/menu.view.php';
