<?php
    function emptySignUpInput($filename, $userName, $userEmail, $userCity, $userPwd, $userPwdRepeat)
    {
        if(empty($filename) || empty($userName) || empty($userEmail) || empty($userCity) || empty($userPwd) || empty($userPwdRepeat)) return true;
        else return false;
    }

    function invalidName($userName)
    {
        if(!preg_match("/^[a-zA-Z0-9 ]*$/", $userName)) return true;
        return false;
    }

    function invalidEmail($userEmail)
    {
        if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) return true;
        return false;
    }

    function invalidCity($userCity)
    {
        if(!preg_match("/^[a-zA-Z]*$/", $userCity)) return true;
        return false;
    }

    function pwdMatch($userPwd, $userPwdRepeat)
    {
        if($userPwd !== $userPwdRepeat) return true;
        return false;
    }

    function userExists($pdo, $userName, $userEmail)
    {
        try 
        {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE usersFullname = ? OR usersEmail = ?;");
            $stmt->execute([$userName, $userEmail]);

            if($result = $stmt->fetch()) return $result;
            return false;
        } 
        catch (PDOException $e) 
        {
            return $e->getMessage();
        }
    }

    function emptyLoginInput($username, $pwd)
    {
        if(empty($username) || empty($pwd)) return true;
        return false;
    }