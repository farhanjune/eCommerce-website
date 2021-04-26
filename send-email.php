<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../classes/PHPMailer/src/Exception.php';
require '../classes/PHPMailer/src/PHPMailer.php';
require '../classes/PHPMailer/src/SMTP.php';

function send_email($to, $name, $subject, $message, $attachment = null){

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Username = '903defb5cb1d2a'; // Frank: 903defb5cb1d2a, Nahiyaan: 4b536fd476840a
    $mail->Password = '8a04411e9f48ca'; // Frank: 8a04411e9f48ca, Nahiyaan: 50a5fdb9917052
    $mail->SMTPSecure = 'tls';
    $mail->Port = 2525;

    $mail->setFrom('info@buytech.com', 'BuyTech');
    $mail->addAddress($to, $name);
    $mail->Subject = $subject;

    $mail->isHTML(TRUE);
    $mail->Body = $message;

    if (!is_null($attachment)){
        $mail->addAttachment($attachment);
    }
    $mail->send();
}
