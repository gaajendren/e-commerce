<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "dress";

//Connection to database
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$conn) {
    die("Database connection failed!");
}

?>