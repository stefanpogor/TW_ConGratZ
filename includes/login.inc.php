<?php

if(isset($_POST['login-submit'])){

    require 'database.inc.php';

    $email=$_POST['mail'];
    $password=$_POST['pwd'];

    if(empty($email) || empty($password)){
        header("Location: ../pages/loginPage.php?error=emptyfields");
        exit();
    } else{
        $sql="SELECT * FROM users WHERE emailUsers=?";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../pages/loginPage.php?error=sqlerror");
            exit();
        } else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($results)){
                $pwdcheck=password_verify($password, $row['pwdUsers']);
                if($pwdcheck == false){
                    header("Location: ../pages/loginPage.php?error=wrongpwd");
                    exit();
                } else if ($pwdcheck == true){
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['username'] = $row['fullnameUsers'];

                    header("Location: ../pages/homePage.php?login=succes");
                    exit();
                } else{
                    header("Location: ../pages/loginPage.php?error=wrongpwd");
                    exit();
                }
            } else{
                header("Location: ../pages/loginPage.php?error=nouser");
                exit();
            }
        }
    }

} else{
    header("Location: ../pages/loginPage.php");
    exit();
}