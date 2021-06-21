<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/createGreetingsCardPageStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Create Greetings Card</title>
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
            <div>
                <table>
                    <tr>
                        <td>
                            <div class="dropdownCovers">
                                <button onclick="showCovers()" id="loadCovers" class="loadBtnCovers" >Load Covers</button>
                                <div id="loadingCoversArea" class="loadingAreaCovers"></div>
                            </div>
                            <div class="bgcolor">
                                <label for="backgroundColor">...or choose background color:</label>
                                <input class="input-color" type="color" id="backgroundColor" value="#ffffff">
                                <button class="controlBtn" type="button" onclick="fill()">Fill</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="xcoordSt" placeholder="X coord Sticker">
                            <input type="text" id="ycoordSt" placeholder="Y coord Sticker">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="wdthSt" placeholder="Width Sticker">
                            <input type="text" id="hghtSt" placeholder="Height Sticker">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="dropdownStickers">
                                <button onclick="showStickers()" id="loadStickers" class="loadBtnStickers" >Load Stickers</button>
                                <div id="loadingStickersArea" class="loadingAreaStickers"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="xcoordGf" placeholder="X coord Gif">
                            <input type="text" id="ycoordGf" placeholder="Y coord Gif">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="wdthGf" placeholder="Width Gif">
                            <input type="text" id="hghtGf" placeholder="Height Gif">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="dropdownGifs">
                                <button onclick="showGifs()" id="loadGifs" class="loadBtnGifs" >Load Gifs</button>
                                <div id="loadingGifsArea" class="loadingAreaGifs"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="xcoordIm" placeholder="X coord Image">
                            <input type="text" id="ycoordIm" placeholder="Y coord Image">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="wdthIm" placeholder="Width Image">
                            <input type="text" id="hghtIm" placeholder="Height Image">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="uploader">Choose image to upload:</label>
                            <input type="file" id="uploader">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <canvas id="canvasGreet"></canvas>
        <div class="details">
            <form action="#">
                <table>
                    <tr>
                        <td>
                            <input type="text" id="xcoordTx" placeholder="X coord Text">
                            <input type="text" id="ycoordTx" placeholder="Y coord Text">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="txtsize" placeholder="Text size">
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
                            <input type="text" id="text" placeholder="Enter your message">
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
            <button class="controlBtn" onclick="onDownload()" id="download">Download as PNG</button>
            <button class="controlBtn" onclick="resetCanvas()">Reset Canvas</button>
         </div>
    </div>

    <script src="../js/createGreetingsCard.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<?php
require "footer.php"
?> 