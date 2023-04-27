<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . "/app/config/db.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/helpers/Connection.php";

include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Advantage.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Product.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Table.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/User.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Staff.php";
