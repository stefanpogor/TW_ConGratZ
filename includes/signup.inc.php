<?php

if(isset($_POST['signup-submit'])){

    require 'database.inc.php';

    $username= $_POST['fullname'];
    $email= $_POST['mail'];
    $password= $_POST['pwd'];
    $confpasword= $_POST['confpwd'];

    if(empty($username) || empty($email) || empty($password) || empty($confpasword)){
        header("Location: ../pages/signUpPage.php?error=emptyfields&fullname=".$username."&mail=".$email);
        exit();
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z ]*$/", $username)){
        header("Location: ../pages/signUpPage.php?error=invalidmailandname");
        exit();
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../pages/signUpPage.php?error=invalidmail&fullname=".$username);
        exit();
    } else if(!preg_match("/^[a-zA-Z ]*$/", $username)){
        header("Location: ../pages/signUpPage.php?error=invalidname&mail=".$email);
        exit();
    } else if($password !== $confpasword){
        header("Location: ../pages/signUpPage.php?error=passwordcheck&fullname=".$username."&mail=".$email);
        exit();
    } else{
        $sql="SELECT emailUsers FROM users WHERE emailUsers=?";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../pages/signUpPage.php?error=sqlerror");
            exit();
        } else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck=mysqli_stmt_num_rows($stmt);
            if($resultcheck>0){
                header("Location: ../pages/signUpPage.php?error=emailtaken&fullname=".$username);
                exit();
            } else{
                $sql="INSERT INTO users (fullnameUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
                $stmt=mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../pages/signUpPage.php?error=sqlerror");
                    exit();
                } else{
                    $hashpwd=password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashpwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../pages/signUpPage.php?signup=succes");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../pages/signUpPage.php");
            exit();
}