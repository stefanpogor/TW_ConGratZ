<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginPageStyle.css"/>
    <title>Login - ConGratZ</title>
</head>
<body>
    <div class="grid-container">
        <div class="onTop-buttons-box">
            <button class="login-onTop">LOGIN</button>
            <form method="GET" action="signUpPage.php">
                <button class="signup-onTop">SIGN UP</button>
            </form>
        </div>
        <div class="design-element"></div>
        <main class="login-area">
            <div class="login-grid">
                <div class="logo">
                    <img src="../resources/ConGratZ-logo.svg" alt="ConGratZ logo" />
                </div>
                <div class="login-text">
                    <p>LOGIN</p>
                </div>
                <div class="input-area">
                    <form action="../includes/login.inc.php" method="post">
                        <input class="input-boxes" name="mail" type="email" placeholder="Email">
                        <input class="input-boxes" name="pwd" type="password" placeholder="Password">
                        <button class="loginBtn" type="submit" name="login-submit">LOGIN</button>
                    </form>
                </div>
                <a id="forgot-password" href="#">Forgot your password?</a>
                <div class="continue-area">
                    <a id="continue" href="homePage.php">Continue without logging...</a>
                </div>
            </div>
        </main>
        <footer>
            <i>The right card, everytime!</i>
        </footer>
    </div>
</body>
</html>