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
    <link rel="stylesheet" href="../css/createBusinessCardPageStyle.css">
    <title>Create Business Card</title>
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
    <div class="create-area">
        <div class="bgimage">    
            <div class="dropdownImages">
                <div>
                    <button onclick="showImages()" id="loadImages" class="loadBtn" >Load Images</button>
                    <div id="loadingImagesArea" class="loadingArea"></div>
                </div>
                <div class="bgcolor">
                    <label for="backgroundColor">...or choose background color:</label>
                    <input class="input-color" type="color" id="backgroundColor" value="#ffffff">
                    <button class="controlBtn" type="button" onclick="fill()">Fill</button>
                </div>
            </div>
        </div>
        <canvas id="canvas"></canvas>
        <div class="details">
            <form action="#">
                <table>
                    <tr>
                        <td>
                            <label for="uploader">Select logo:</label>
                            <input type="file" id="uploader">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="textColor">Choose a text color.</label>
                            <input class="input-color" type="color" id="textColor" value="#ffffff">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="name" placeholder="Enter your name">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="occupation" placeholder="Enter your occupation">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="address" placeholder="Enter your address">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="phone" placeholder="Enter your phone number">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="site" placeholder="Enter your website">
                        </td>
                    </tr>
                    <tr>
                        <td>    
                            <input type="text" id="mail" placeholder="Enter your email">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="controlBtn" type="button" onclick="fillDetails()">Done</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="controlBtns">
            <button class="controlBtn" id="download">Download PDF</button>
            <button class="controlBtn" id="generate_qr">Generate QR</button>
            <button class="controlBtn" onclick="resetCanvas()">Reset Canvas</button>
         </div>
         <!-- <div class="parseXML">
            <label for="textColorxml">Choose a text color.</label>
            <input class="input-color" type="color" id="textColorxml" value="#ffffff">
            <label for="xmluploader">Select xml file:</label>
            <input type="file" id="xmluploader" accept=".xml">
            <button class="controlBtn" type="button" onclick="generatePDFfromXML()">Generate PDF from XML</button>
         </div> -->
    </div>
    <div class="qr-container">
        <img id="qr_code">
    </div>
    
    <script src="../js/createBusinessCard.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<?php
require "footer.php"
?>