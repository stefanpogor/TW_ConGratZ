<?php

require '../phpmailer/PHPMailerAutoload.php';

$email=$_POST['mail'];
$comment=$_POST['comment'];

$mail=new PHPMailer;
$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->SMTPSecure='tls';

$mail->Username='congratz.office@gmail.com';
$mail->Password='congratz.office123';

$mail->setFrom($email);
$mail->addAddress('congratz.office@gmail.com');

$mail->isHTML(true);
$mail->Subject='Email from ConGratZ';
$newComment='Email sent from: '.$email.'<br>'.' Message: '.$comment;
$mail->Body=$newComment;

if(!$mail->send()){
    echo 'Message could not be sent';
} else {
    echo 'Message has been sent';
}
