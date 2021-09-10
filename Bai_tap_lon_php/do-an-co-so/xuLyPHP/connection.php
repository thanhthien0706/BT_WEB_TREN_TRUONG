<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$database = "bai_tap_lon";

$conn = mysqli_connect($serverName, $userName, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>