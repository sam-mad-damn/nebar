<?php

use App\models\Table;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["auth"]["admin"]) || !$_SESSION["auth"]["admin"]){
    header("Location: /");
    die();
}

$title = "Удаление стола";
$style = "admin";

$oldImg = Table::find($_GET["id"])->image;
unlink("/upload/" . $oldImg);
$table = Table::delete($_GET["id"]);
header("Location: /app/tables/admin/table/table.php");
