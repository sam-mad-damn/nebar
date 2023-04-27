<?php

use App\models\Advantage;
use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$style = "gl";
$title = "Главная";
$advantages = Advantage::show();
$product = Product::showLast();



include $_SERVER["DOCUMENT_ROOT"] . "/views/client/index.view.php";
