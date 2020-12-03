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
        $filename = $_FILES["profImg"]["name"];
        $username = $_POST["name"];
        $email = $_POST["email"];
        $city = $_POST["city"];
        $userPwd = $_POST["pwd"];
        $userPwdRepeat = $_POST["pwdRepeat"];
        $fileDestination = "../images/".$filename;

        //Check if any input is empty.
        if(emptySignUpInput($filename, $username, $email, $city, $userPwd, $userPwdRepeat) !== false)
        {
            header("location: ../Lab-1/signup.php?error=EmptyInputFound");
            exit();
        }
        //Check if user fullname is valid.
        if(invalidName($username) !== false)
        {
            header("location: ../Lab-1/signup.php?error=InvalidName");
            exit();
        }
        //Check if user email is valid.
        if(invalidEmail($email) !== false)
        {
            header("location: ../Lab-1/signup.php?error=InvalidEmail");
            exit();
        }
        //Check if user city of residence is valid.
        if(invalidCity($city) !== false)
        {
            header("location: ../Lab-1/signup.php?error=InvalidCity");
            exit();
        }
        //Check if user passwords match.
        if(pwdMatch($userPwd, $userPwdRepeat) !== false)
        {
            header("location: ../Lab-1/signup.php?error=PasswordMismatch");
            exit();
        }
        //Check if there is another user with the same name or email.
        if(userExists($pdo, $username, $email) !== false)
        {
            header("location: ../Lab-1/signup.php?error=NameEmailTaken");
            exit();
        }
 
        $user->register($pdo, $username, $filename, $email, $city, $userPwd);
        move_uploaded_file($_FILES["profImg"]["tmp_name"], $fileDestination);

        header("location: ../Lab-1/signup.php?success=AddSuccessful");
        exit();
    }
    else
    {
        header("location: ../Lab-1/signup.php");
        exit();
    }