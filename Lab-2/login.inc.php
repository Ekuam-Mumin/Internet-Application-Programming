<?php
    include_once "dbh.inc.php";
    include_once "user.php";
    include_once "functions.inc.php";

    //Connecting to database.
    $conn = new DBConnector();
    $pdo = $conn->connectToDB();

    //Creating object of new user.
    $user = new User();

    if(isset($_POST["submit"]))
    {
        $username = $_POST["username"];
        $pwd = $_POST["pwd"];

        if(emptyLoginInput($username, $pwd) !== false)
        {
            $_SESSION["alert"] = "Empty Input field encountered.";
            header("location: ../Lab-1/login.php?error=EmptyInput");
            exit();
        }
        
        $user->login($pdo, $username, $pwd);

        header("location: ../Lab-1/index.php");
        exit();
    }
    else
    {
        header("location: ../Lab-1/login.php?error=EmptyInput");
        exit();
    }