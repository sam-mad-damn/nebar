<?php

use App\models\User;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (isset($_POST["updt"])) {
    if ($_POST["name"] == null) {
        $_SESSION["error"]["name"] = "Заполните поле";
        header("Location: /app/tables/admin/profile/profile.php");
    }
    if ($_POST["surname"] == null) {
        $_SESSION["error"]["surname"] = "Заполните поле";
        header("Location: /app/tables/admin/profile/profile.php");
    }
    if ($_POST["phone"] == null) {
        $_SESSION["error"]["phone"] = "Заполните поле";
        header("Location: /app/tables/admin/profile/profile.php");
    }
    if ($_POST["email"] == null) {
        $_SESSION["error"]["email"] = "Заполните поле";
        header("Location: /app/tables/admin/profile/profile.php");
    }
    if ($_POST["password"] == $_POST["password_confirmation"]) {
        if (!User::getUser($_POST["phone"], $_POST["password"]) != null) {
            if (User::insertAdmin($_POST)) {
                $user = User::getUser($_POST["phone"], $_POST["password"]);
                header("Location: /app/tables/admin/profile/profile.php");
                die();
            }
        } else {
            $_SESSION["data"]["name"] = $_POST["name"];
            $_SESSION["data"]["phone"] = $_POST["phone"];
            $_SESSION["data"]["email"] = $_POST["email"];
            $_SESSION["error"]["glob"] = "Вы уже зарегитрированы";
            header("Location: /app/tables/admin/profile/profile.php");
            die();
        }
    } else {
        $_SESSION["data"]["name"] = $_POST["name"];
        $_SESSION["data"]["phone"] = $_POST["phone"];
        $_SESSION["data"]["email"] = $_POST["email"];
        $_SESSION["error"]["glob"] = "Пароли не совпадают";
        header("Location: /app/tables/admin/profile/profile.php");
        die();
    }
}
