<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/homePage.css">
    <title>Home</title>
</head>
<body>
    <header>
        <img class="logo" src="../resources/ConGratZ-logo.svg" alt="logo"> 
        <nav>
            <ul class="nav_links">
                <?php
                    if(isset($_SESSION['username'])){
                        echo 
                        '<li><a href="homePage.php">HOME</a></li>
                        <li><a href="createGreetingsCardPage.php">CREATE GREETINGS CARD</a></li>
                        <li><a href="createBusinessCardPage.php">CREATE BUSINESS CARD</a></li>
                        <li><a href="contactPage.php">CONTACT</a></li>
                        <li><a>'.strtoupper($_SESSION['username']).'</a></li>
                        <li>
                        <form method="post" action="../includes/logout.inc.php">
                            <button class="signoutbtn" type="submit">SIGNOUT</button>
                        </form>
                        </li>';
                    } else{
                        echo
                        '<li><a href="homePage.php">HOME</a></li>
                        <li><a href="createGreetingsCardPage.php">CREATE GREETINGS CARD</a></li>
                        <li><a href="createBusinessCardPage.php">CREATE BUSINESS CARD</a></li>
                        <li><a href="contactPage.php">CONTACT</a></li>
                        <li><a href="loginPage.php">LOGIN</a></li>
                        <li><a href="signUpPage.php">SIGNUP</a></li>';
                    }
                ?>
            </ul>
        </nav>
        <a class="menu-icon">
            <i class="fa fa-bars"></i>
        </a>
    </header>
<main>
    <div class="grid-container">
        <div class="backgroundimage"></div>
        <div class="info">
            <div class="h1-title">
                <h1>ConGratZ - Welcome to our website!</h1>
            </div>
            <div class="p-desc">
                <p>Here you can create your own greeting cards or business cards.</p>
            </div>
            <div class="createBtn">
                <button class="homepagebtn" id="colorCreateB" onclick="location.href='createGreetingsCardPage.php'">
                    START CREATING YOUR OWN CARDS!
                </button>
            </div>
            <div class="seeBtn">
                <button class="homepagebtn" id="colorSeeB" onclick="location.href='createBusinessCardPage.php'">
                    START CREATING YOUR OWN BUSINESS CARDS!
                </button>
            </div>
        </div>
    </div>
</main>

<?php
require "footer.php"
?>