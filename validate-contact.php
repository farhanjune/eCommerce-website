<?php
session_start();
require('database.php');
include_once 'numbers-validate.php';
include_once 'send-email.php';
$_SESSION['error'] = false;
$_SESSION['success'] = array();

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$phone = phone_validate($_POST['phone']);
$comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);

if (empty($_POST['name'])){
    $_SESSION['error'] = true;
}
elseif (!$name){
    $_SESSION['error'] = true;
}

if (empty($_POST['email'])){
    $_SESSION['error'] = true;
}
elseif (!$email){
    $_SESSION['error'] = true;
}

if ($phone == 'null'){
    $_SESSION['error'] = true;
}
elseif (!$phone){
    $_SESSION['error'] = true;
}

if (empty($_POST['comment'])){
    $_SESSION['error'] = true;
}
elseif (!$comment){
    $_SESSION['error'] = true;
}

if (!$_SESSION['error']){
    $logo = file_get_contents('logo.txt');
    $message =
        '<p>AUTOMATED MESSAGE</p>
        <p>Hello ' . $name . ',</p>
        <p>Thank you for reaching out! 
        Please allow for 3-5 business days before you hear back from us.</p><br>
        <p>SUBMISSION INFORMATION:</p>
        <p>Email: '.$email.'</p>
        <p>Phone: '.$phone.'</p>
        <p>Comment: '.$comment.'</p><br>
        <p>- BuyTech Team</p><br>
        <img src="'.$logo.'">';
    send_email($email, $name, 'Contact', $message);

    $queryContact = 'INSERT INTO contacts
                        (contactName, contactEmail, contactPhone, contactComment)
                        VALUES (:name, :email, :phone, :comment)';
    $statement = $db -> prepare($queryContact);
    $statement -> bindValue(':name', $name);
    $statement -> bindValue(':email', $email);
    $statement -> bindValue(':phone', $phone);
    $statement -> bindValue(':comment', $comment);
    $statement -> execute();
    $statement->closeCursor();
    $_SESSION['success']['message'] = 'Thank you for letting us know how you feel!
                                        <h1>Please check your email for messages from us.</h1>';
    $_SESSION['success']['link'] = 'index';
    header("location: success.php");
}
else{
    header("location: contact.php");
}
