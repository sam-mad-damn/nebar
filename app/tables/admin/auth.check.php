<?php

use App\models\User;
include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

unset($_SESSION["error"]);

$_SESSION["phone"] = $_POST["phone"];

if(isset($_POST["btn"])){
 $user = User::getUser($_POST['phone'],$_POST['password']);
   
 if($user == null){
    $_SESSION["error"] = "такого аккаунта не существует";
    $_SESSION["auth"] = false;
    header("Location: /admin.php");
    die();
 }else{
    $_SESSION["auth"]["admin"] = true;
    $_SESSION["id"] = $user->id;
    header("Location: /app/tables/admin/menu/menu.php");
 }
}