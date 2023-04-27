<?php

use App\models\Table;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (isset($_GET['date']) && isset($_GET['id'])) {

    $date = json_decode($_GET['date']);
    $id = json_decode($_GET['id']);
    $timeDur = Table::findTime($date,$id);
    
    echo json_encode($timeDur,JSON_UNESCAPED_UNICODE);

}