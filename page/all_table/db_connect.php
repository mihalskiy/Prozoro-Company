<?php

/* Database connection start */
$servername = "127.0.0.1";
$username = "root";
$password = "12345";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>