<?php

use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$style = "profile";
$title="Продукты в бронировании";

$products = Product::allInOrder($_GET["id"]);
$totalPrice = Product::totalPrice($_GET['id']);
$totalCount = Product::totalCount($_GET['id']);
$_SESSION["table"] = $_GET["id"];
include $_SERVER["DOCUMENT_ROOT"] . "/views/client/order/order.view.php";
