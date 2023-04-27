<?php

use App\models\User;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$style = "style";
$title="Изменение профиля";
$user = User::find($_SESSION["id"]);

include $_SERVER['DOCUMENT_ROOT'] . '/views/client/user/update.view.php';
