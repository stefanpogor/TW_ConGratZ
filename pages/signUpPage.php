<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - ConGratZ</title>
    <link rel="stylesheet" href="../css/SignUpPage.css">
</head>

<body>
    <div class="grid-container">
        <div class="onTop-buttons-box">
            <form method="GET" action="loginPage.php">
                <button class="login-onTop">LOGIN</button>
            </form>
            <button class="signup-onTop">SIGN UP</button>
        </div>
        <div class="design-element"></div>

        <main class="signup-area">
            <div class="signup-grid">
                <div class="logo">
                    <img src="../resources/ConGratZ-logo.svg" alt="ConGratZ logo" />
                </div>
                <div class="signup-text">
                    <p>SIGN UP</p>
                </div>
                <div class="input-area">
                <?php
                        if(isset($_GET['error'])){
                            $email="";
                            $name="";
                            if($_GET['error'] == 'emptyfields'){
                                echo '<p class="errortext">Fill in all fileds!</p>';
                                $email=$_GET['mail'];
                                $name=$_GET['fullname'];
                            } else if($_GET['error'] == 'invalidmailandname'){
                                echo '<p class="errortext">Invalid email and full name!</p>';
                            } else if($_GET['error'] == 'invalidmail'){
                                echo '<p class="errortext">Invalid email!</p>';
                                $name=$_GET['fullname'];
                            } else if($_GET['error'] == 'invalidname'){
                                echo '<p class="errortext">Invalid full name!</p>';
                                $email=$_GET['mail'];
                            } else if($_GET['error'] == 'passwordcheck'){
                                echo '<p class="errortext">Passwords don`t match!</p>';
                                $email=$_GET['mail'];
                                $name=$_GET['fullname'];
                            } else if($_GET['error'] == 'emailtaken'){
                                echo '<p class="errortext">Already exists an account with same email!</p>';
                                $name=$_GET['fullname'];
                            }
                            echo
                            '
                            <form action="../includes/signup.inc.php" method="post">
                            <input class="input-first-boxes" placeholder="Email" name="mail" type="email" value='.$email.'>
                            <input class="input-first-boxes" placeholder="Full Name" name="fullname" type="text" value="'.$name.'">
                            <input class="input-second-boxes" name="pwd" type="password" placeholder="Password">
                            <input class="input-second-boxes" name="confpwd" type="password" placeholder="Confirm Password">
                            <button class="signupBtn" type="submit" name="signup-submit">SIGN UP</button>
                            </form>
                            ';
                        } else if(isset($_GET['signup'])){
                            echo 
                            '
                            <p class="succestext">You signed up successfully! Go to <a href="loginPage.php">LOGIN</a> and complete your account information.
                            </p>
                            ';
                            echo
                            '
                            <form action="../includes/signup.inc.php" method="post">
                            <input class="input-first-boxes" name="mail" type="email" placeholder="Email">
                            <input class="input-first-boxes" name="fullname" type="text" placeholder="Full Name">
                            <input class="input-second-boxes" name="pwd" type="password" placeholder="Password">
                            <input class="input-second-boxes" name="confpwd" type="password" placeholder="Confirm Password">
                            <button class="signupBtn" type="submit" name="signup-submit">SIGN UP</button>
                            </form>
                            ';
                        } else {
                            echo
                            '<form action="../includes/signup.inc.php" method="post">
                            <input class="input-first-boxes" name="mail" type="email" placeholder="Email">
                            <input class="input-first-boxes" name="fullname" type="text" placeholder="Full Name">
                            <input class="input-second-boxes" name="pwd" type="password" placeholder="Password">
                            <input class="input-second-boxes" name="confpwd" type="password" placeholder="Confirm Password">
                            <button class="signupBtn" type="submit" name="signup-submit">SIGN UP</button>
                            </form>
                            ';
                        }
                    ?>
                </div>

                <a id="continue" href="homePage.php">
                    Continue without signing up...
                </a>

            </div>
        </main>
        <footer>
            <i>
                The right card, everytime!
            </i>
        </footer>
    </div>

</body>

</html>