<?php
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "dukes";

    $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

    if(!$conn)
    {
        die("Connection Failed: ". mysqli_connect_error());
    }