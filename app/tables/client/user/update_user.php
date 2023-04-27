<?php

use App\models\User;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";


if (isset($_POST["saveBtn"])) {
    if (isset($_SESSION["auth"]) || $_SESSION["auth"]) {
        $_POST["id"] = $_SESSION["id"];
        $user = User::update($_POST);
        $_SESSION["name"] = $user->name;
        header("Location: /app/tables/client/user/profile.php");
        die();
    }
}


