<?php
    // session_start();
?>

<!DOCTYPE html>
<html lang="en-UK">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Dukes Liquors</title>

    <link rel="icon" href="../htdocs/Dukes/images/logo.png" type="image/png">
    <link rel="stylesheet" href="style.css">
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
            <a href="index.php" id="logo"><img src="../htdocs/Dukes/images/logo2.png" alt="Logo"></a>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="products.php">CATEGORIES</a></li>
                <li><a href="order.php">ORDER</a></li>
                <li><a href="#footer">ABOUT US</a></li>
                <li><a href=\"login.php\">LOGIN/SIGNUP</a></li>
                
                <!-- <?php
                    // if (isset($_SESSION["userusername"])) 
                    // {
                    //     echo "<li><a href=\"../includes/logout.inc.php\">LOGOUT</a></li>";
                    // }    
                    // else
                    // {
                    //     echo "<li><a href=\"login.php\">LOGIN/SIGNUP</a></li>";
                    // }
                ?>
                <li>
                    <a href="cart.php">
                        <span class="fas fa-shopping-basket"></span>
                        <sup>
                            <?php
                                // if(isset($_SESSION["cart"]))
                                // {
                                //     $count = $_SESSION["cart"];
                                //     echo "<span class=\"itemCount text-warning py-1 px-1\"> $count</span>";
                                // }
                                // else
                                // {
                                //     echo "<span class=\"itemCount text-warning py-1 px-1\"> 0</span>";
                                // }                            
                            ?>
                        </sup>
                    </a>
                </li> -->
            </ul>
        </div>
    </nav>