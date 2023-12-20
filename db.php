<?php

$dbHost = "localhost";
$dbUser = "gaajen";
$dbPass = "123456";
$dbName = "book";

//Connection to database
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$conn) {
    die("Database connection failed!");
}

?>