<?php

use App\models\User;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (isset($_POST["btn"])) {
    if ($_POST["name"] == "") {
        $_SESSION["error"]["name"] = "Заполните поле";
        header("Location: /app/tables/client/user/create.php");
    }
    if ($_POST["surname"] == "") {
        $_SESSION["error"]["surname"] = "Заполните поле";
        header("Location: /app/tables/client/user/create.php");
    }
    if ($_POST["phone"] == "") {
        $_SESSION["error"]["phone"] = "Заполните поле";
        header("Location: /app/tables/client/user/create.php");
    }
    if ($_POST["email"] == "") {
        $_SESSION["error"]["email"] = "Заполните поле";
        header("Location: /app/tables/client/user/create.php");
    }

    if (!preg_match('/(?=.*[a-z])(?=.*\d)[a-zA-Z\d]{5,}/gm', $_POST["password"])) {
        $_SESSION["data"]["name"] = $_POST["name"];
        $_SESSION["data"]["phone"] = $_POST["phone"];
        $_SESSION["data"]["email"] = $_POST["email"];
        $_SESSION["auth"] = false;
        $_SESSION["error"]["password"] = "Введите пароль";
        header("Location: /app/tables/client/user/create.php");
    }

    if ($_POST["password"] == $_POST["password_confirmation"]) {
        if (!User::getUser($_POST["phone"], $_POST["password"]) != null) {
            if (User::insert($_POST)) {
                $user = User::getUser($_POST["phone"], $_POST["password"]);
                $_SESSION["auth"] = true;
                $_SESSION["id"] = $user->id;
                $_SESSION["name"] = $_POST["name"];
                header("Location: /");
                die();
            }
        } else {
            $_SESSION["data"]["name"] = $_POST["name"];
            $_SESSION["data"]["phone"] = $_POST["phone"];
            $_SESSION["data"]["email"] = $_POST["email"];
            $_SESSION["auth"] = false;
            $_SESSION["error"]["glob"] = "Вы уже зарегитрированы";
            header("Location: /app/tables/client/user/create.php");
            die();
        }
    } else {
        $_SESSION["data"]["name"] = $_POST["name"];
        $_SESSION["data"]["phone"] = $_POST["phone"];
        $_SESSION["data"]["email"] = $_POST["email"];
        $_SESSION["auth"] = false;

        $_SESSION["error"]["glob"] = "Пароли не совпадают";
        header("Location: /app/tables/client/user/create.php");
        die();
    }
}
