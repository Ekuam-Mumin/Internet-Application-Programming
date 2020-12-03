<?php
    session_start();
    $username = $_SESSION["user"]["name"];
?>

<!DOCTYPE html>
<html lang="en-UK">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Password</title>

    <link rel="icon" href="../images/logo.png" type="image/png">
    <link rel="stylesheet" href="../Lab-1/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/2445de8395.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <div class="container-fluid">
            <a href="index.php" id="logo"><img src="../images/logo2.png" alt="Logo"></a>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <?php
                    if(isset($_SESSION["user"]))
                    {
                        echo "<li><a href=\"../Lab-2/logout.inc.php\">LOGOUT</a></li>";
                    }    
                    else
                    {
                        echo "<li><a href=\"../Lab-1/login.php\">LOGIN/SIGNUP</a></li>";
                    }
                ?>
            </ul>
        </div>
    </nav>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="password.inc.php" method="POST">
                    <span class="login100-form-logo mb-3">
                    <?php
                        if(isset($_SESSION["user"]))
                        {
                            echo "<img class='profImg' src='../images/".$_SESSION["user"]["pic"]."' style='width: 125px; height: 125px' alt='Account Icon'>";
                        }
                        else
                        {
                           echo "<img class='profImg' src='../images/account.jpg' style='width: 125px; height: 125px' alt='Account Icon'>";                      
                        }
                    ?>
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27 mb-3">
                        Change Password
                    </span>

                    <?php
                        if(isset($_GET["success"]) && $_GET["success"] == "pwdChanged")
                        {
                            ?>
                            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                <strong>Password successfully changed:)</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                            unset($_SESSION["message"]);
                        }
                    ?>

                    <div class="wrap-input100 validate-input" data-validate="Password Required">
                        <input class="input100" type="password" name="currPwd" placeholder="Current Password...">
                        <span class="focus-input100" data-placeholder="&#xf13e;"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate="Password Required">
                        <input class="input100" type="password" name="newPwd" placeholder="New Password...">
                        <span class="focus-input100" data-placeholder="&#xf13e;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password Required">
                        <input class="input100" type="password" name="newPwdRepeat" placeholder="New Password...">
                        <span class="focus-input100" data-placeholder="&#xf13e;"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="submit">
                            Change
                        </button>
                        
                        <?php
                            if(isset($_SESSION["user"]))
                            {
                                echo "<input type='hidden' name='username' value='".$username."'>";
                            }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
    
    <footer class="page-footer">
        <div class="container text-center text-sm-left">
            <div class="row">
                <div class="col-sm-3 mx-auto logo">
                    <img src="../images/logo2.png"  alt="Logo">
                </div>
    
                <hr class="clearfix w-100 d-md-none">
    
                <div class="col-sm-3 mx-auto">
                    <h4 class="text-center text-uppercase mt-3 mb-4">About Us</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab quaerat quisquam quae quod neque illo necessitatibus doloremque recusandae, numquam fugit asperiores. Corporis nobis maiores exercitationem pariatur nihil odit ratione obcaecati!</p>
                </div>
    
                <div class="col-sm-3 mx-auto">
                    <h4 class="text-center text-uppercase mt-3 mb-4">Contacts</h4>
                    <ul>
                        <li><a href=""><i class="fas fa-mobile fa-2x"></i></a> 0717263131</li>
                        <li><a href=""><i class="fas fa-at fa-2x"></i></a> ekuam.mumin@gmail.com</li>
                        <li><a href=""><i class="fas fa-map-marked-alt fa-2x"></i></a> Icipe Rd., Kasarani, Nairobi.</li>
                    </ul>
                </div>
    
                <div class="col-sm-3 mx-auto">
                    <h4 class="text-center text-uppercase mt-3 mb-4">Follow Us</h4>
                    <ul class="socials">
                        <li><a href=""><i class="fab fa-facebook-f fa-2x"></i></a></li>
                        <li><a href=""><i class="fab fa-instagram fa-2x"></i></a></li>
                        <li><a href=""><i class="fab fa-twitter fa-2x"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    
        <div class="footer-copyright text-center text-white py-3">© 2020 Copyright:
            <a href=""> @Turkish_Mantra</a>
        </div>
    </footer>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script></body>
</html>