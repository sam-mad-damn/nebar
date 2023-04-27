<?php

use App\models\User;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
unset($_SESSION["error"]);

if(isset($_POST["authBtn"])){
    $user = User::getUser($_POST["phone"],$_POST["password"]);
    if($user == null){
        $_SESSION["auth"] = false;
        $_SESSION["error"] = "Пользователь не найден";
        header("Location: /app/tables/client/user/auth.php");
        die();
    }
    else{
        $_SESSION["auth"] = true;
        $_SESSION["id"] = $user->id;
        header("Location: /app/tables/client/user/profile.php");
    }
}
?>
