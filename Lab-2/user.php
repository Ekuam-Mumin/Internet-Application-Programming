<?php
    include_once "dbh.inc.php";

    interface Account
    {
        public function register($pdo, $username, $filename, $email, $city, $password);
        public function login($pdo, $username, $pwd);
        public function changePassword($pdo, $username, $currPwd, $newPwd, $newPwdRepeat);
        public function logout($pdo);
    }

    class User implements Account
    {
        function __construct() {}

        public function register($pdo, $username, $filename, $email, $city, $password)
        {
            //Register User
            try
            {
                $sql = "INSERT INTO users (usersImg, usersFullname, usersEmail, usersCity, usersPwd) VALUES (?,?,?,?,?);";
                $stmt = $pdo->prepare($sql);
                
                //Encrypt the passwords before insertion to the database.
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                $stmt->execute(array($filename, $username, $email, $city, $hashedPwd));                
            } 
            catch (PDOException $e) 
            {
                echo $e->getMessage();
            }
        }

        public function login($pdo, $username, $pwd)
        {
            //Login user.
            try 
            {
                //Search if user exists in database.
                $sql = "SELECT * FROM users WHERE usersFullname = ? OR usersEmail = ?;";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array($username, $username));

                //If user exists...
                if($result = $stmt->fetch()) 
                {
                    //Check if password input and password in database match.
                    $hashedPwd = $result["usersPwd"];
                    $checkPwd = password_verify($pwd, $hashedPwd);

                    //If do not passwords match...
                    if($checkPwd == false)
                    {
                        header("location: ../Lab-1/login.php?error=InvalidPassword");
                        exit();
                    }
                    else if($checkPwd == true) //If passwords match...
                    {
                        session_start();
                        $_SESSION["user"] = ["id" => $result["id"], "pic" => $result["usersImg"], "name" => $result["usersFullname"]];
                    }   
                }
                else
                {
                    header("location: ../Lab-1/login.php?error=InvalidLogin");
                    exit();
                }
            } 
            catch (PDOException $e) 
            {
                echo $e->getMessage();
            }
        }
        
        public function changePassword($pdo, $username, $currPwd, $newPwd, $newPwdRepeat)
        {
            try
            {
                //Check if user credentials exist in database.
                $sql = "SELECT * FROM users WHERE usersFullname = ?;";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array($username));
                
                //If they exist...
                if($result = $stmt->fetch()) 
                {
                    //Check if password input and password in database match.
                    $checkPwd = password_verify($currPwd, $result["usersPwd"]);
                    
                    //If passwords do not match.
                    if($checkPwd == false)
                    {
                        header("location: password.php?error=InvalidPassword");
                        exit();
                    }
                    //If Passwords match...
                    else if($checkPwd == true)
                    {
                        //Check if current password and new password match.
                        if($newPwd == $newPwdRepeat)
                        {
                            $sql = "UPDATE users SET usersPwd = ? WHERE usersFullname = ?;";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute(array(password_hash($newPwd, PASSWORD_DEFAULT), $username));
                        }
                        else
                        {
                            header("location: password.php?error=pwdDoNotMatch");
                            exit();
                        }
                    }   
                }
                else
                {
                    header("location: password.php?error=InvalidLogin");
                    exit();
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function logout($pdo)
        {
            session_start();
            session_unset();
            session_destroy();

            header("location: ../Lab-1/index.php");
            exit();
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function setPic($pic)
        {
            $this->profPic = $pic;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function setCity($city)
        {
            $this->city = $city;
        }

        public function setPwd($pwd)
        {
            $this->password = $pwd;
        }

        public function setPwdRepeat($pwdRepeat)
        {
            $this->passwordRepeat = $pwdRepeat;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getPic()
        {
            return $this->profPic;
        }
        
        public function getEmail()
        {
            return $this->email;
        }

        public function getCity()
        {
            return $this->city;
        }
    }
