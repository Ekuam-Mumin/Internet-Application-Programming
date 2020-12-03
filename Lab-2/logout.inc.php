<?php
    include_once "dbh.inc.php";
    include_once "user.php";

    //Connecting to database.
    $conn = new DBConnector();
    $pdo = $conn->connectToDB();

    //Creating object of new user.
    $user = new User();
    $user->logout($pdo);