<?php
include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";



if (isset($_SESSION["auth"]["admin"]) || $_SESSION["auth"]["admin"]) {
    session_unset();
    session_destroy();
    header("Location: /admin.php");
} else {
    session_unset();
    session_destroy();

    header("Location: /");
}
