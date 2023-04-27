<?php

use App\models\Product;


include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$oldImg = Product::findId($_POST["id"])->image;
$extensions = ["jpeg", "jpg", "png", "webp", "jfif"];
$types = ["image/jpeg", "image/png", "image/webp", "image/jfif"];

if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"])) {
    $name = $_FILES["image"]["name"];
    $tmpName = $_FILES["image"]["tmp_name"];
    $error = $_FILES["image"]["error"];
    $size = $_FILES["image"]["size"];

    $path_parts = pathinfo($name);
    $ext = $path_parts["extension"];
    $mim = mime_content_type($tmpName);
   

    if (in_array($ext, $extensions) && in_array($mim, $types)) {

        $newName = $name;
        if ($error == 0) {
            if ($size > 3145728) {
                $_SESSION["error"]["img"] = "Файл слишком большой";
            } else {
                if (!move_uploaded_file($tmpName, $_SERVER["DOCUMENT_ROOT"] . "/upload/" . $newName)) {
                    $_SESSION["error"] = "Не удалось переместить файл";
                    header("Location: /app/tables/admin/menu/edit.php");
                } else {
                    unlink("D:/OSPanel/domains/siteBar2/upload/" . $oldImg);
                }
            }
        } else {
            $_SESSION["error"] = "есть ошибка";
        };
    } else {
        $_SESSION["error"] = "Расширение файла должно быть: " . implode(", ", $extensions);
    };
};

if (isset($_POST["saveBtn"])) {
    if ($_POST["id"] != null) {
        if (empty($_FILES["image"]["name"])) {
            Product::updateProd($_POST, $oldImg);
            header("Location: /app/tables/admin/menu/menu.php");
        } else {
            Product::updateProd($_POST, $newName);
            header("Location: /app/tables/admin/menu/menu.php");
        }
    }
}