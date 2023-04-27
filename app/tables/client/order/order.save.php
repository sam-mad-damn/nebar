<?php

use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$stream = file_get_contents("php://input");

if ($stream != null) {
    //декодируем полученные данные
    if ($action = json_decode($stream)->action != "clear") {
        $product_id = json_decode($stream)->data->product_id;
        $weight_id = json_decode($stream)->data->weight_id;
        $tabel = $_SESSION["table"];
        $action = json_decode($stream)->action;
    } else {
        $tabel = $_SESSION["table"];
        $action = json_decode($stream)->action;
    }


    $products = match ($action) {
        "add" => Product::add($tabel, $weight_id, $product_id),
        "dec" => Product::dec($tabel, $weight_id, $product_id),
        "del" => Product::deletePosition($tabel, $weight_id, $product_id),
        "clear" => Product::clear($tabel)
    };

    echo json_encode([
        "products" => $products,
        "totalPrice" => Product::totalPrice($tabel),
        "totalCount" => Product::totalCount($tabel)
    ], JSON_UNESCAPED_UNICODE);
}
