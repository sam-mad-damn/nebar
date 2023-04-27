<?php

use App\models\Table;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$title = "Бронирование";
$style = "style";

$tables = Table::all();

include $_SERVER["DOCUMENT_ROOT"] . "/views/client/book/book.view.php";