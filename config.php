<?php

    session_start();

    $host = "<DATABASE NAME>";
    $user = "<DB USERNAME>";
    $password = "<DB PASSWORD";
    $dbname = "iek_usrs";

    //DATABASE CONNECT//

    $conn = mysqli_connect($host, $user, $password, $dbname);

    //ERRORS//

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
