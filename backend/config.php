<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'hair');

$con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($con->connect_error) {
    die("Database connection failed: " . $con->connect_error);
}



?>