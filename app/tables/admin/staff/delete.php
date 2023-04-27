<?php

use App\models\Staff;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["auth"]["admin"]) || !$_SESSION["auth"]["admin"]){
    header("Location: /");
    die();
}

$title = "Удаление работника";
$style = "admin";

$oldImg = Staff::find($_GET["id"])->image;
unlink("/upload/" . $oldImg);
Staff::delete($_GET["id"]);

header("Location: /app/tables/admin/staff/staff.php");
