<?php

use App\models\Staff;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$title = "Персонал";
$style = "style";

if ($_GET["role"] == "повар") {
    $role = "повар";
} else {
    $role = "бармен";
}

$staff = Staff::allByRole($role);
include $_SERVER["DOCUMENT_ROOT"] . "/views/client/staff/staff.view.php";
