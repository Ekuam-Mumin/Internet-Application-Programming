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
        $currPwd = $_POST["currPwd"];
        $newPwd = $_POST["newPwd"];
        $newPwdRepeat = $_POST["newPwdRepeat"];
        $username = $_POST["username"];

        if(emptyLoginInput($currPwd, $newPwd) !== false)
        {
            header("location: password.php?error=emptyinput");
            exit();
        }
        
        $user->changePassword($pdo, $username, $currPwd, $newPwd, $newPwdRepeat);
        header("location: password.php?success=pwdChanged");
        exit();
    }
