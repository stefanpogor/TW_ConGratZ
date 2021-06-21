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
    <link rel="stylesheet" href="../css/contactPage.css">
    <title>Contact</title>
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
            <div class="design-element"></div>
        <div class="contact-area">
            <div class="contact-grid">
                <div class="contactus-text">
                    <p>Contact Us</p>
                </div>
                <div class="input-area">
                    <form action="../includes/contact.inc.php" method="post">
                        <input class="input-boxes" name="name" type="text" placeholder="Your Name">
                        <input class="input-boxes" name="mail" type="text" placeholder="Email">
                        <textarea class="message-box" name="comment" placeholder="Message" cols="40" rows="5"></textarea>
                        <button class="submit-button">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
    include "footer.php"
?>