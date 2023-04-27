<?php

use App\models\Product;
use App\models\Table;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$tables = Table::showLast($_SESSION["id"]);

if(isset($_GET["btnAdd"])){
   Product::addProduct($_GET, $tables->id);
    header("Location: /app/tables/client/menu/menu.php");
}
