<?php

    session_start();

    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "iek_usrs";

    $conn = mysqli_connect($host, $user, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>