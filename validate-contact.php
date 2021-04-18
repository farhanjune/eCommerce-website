<?php
session_start();
require('database.php');
include_once 'number_validation.php';
include_once 'send-email.php';
$_SESSION['error'] = array();
$_SESSION['success'] = array();

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$phone = phone_validate($_POST['phone']);
$comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);

if (empty($_POST['name'])){
    $_SESSION['error']['name_error'] = 'Please enter a name';
}
elseif (!$name){
    $_SESSION['error']['name_error'] = 'Invalid entry format';
}

if (empty($_POST['email'])){
    $_SESSION['error']['email_error'] = 'Please enter an email address';
}
elseif (!$email){
    $_SESSION['error']['email_error'] = 'Invalid entry format';
}

if ($phone == 'null'){
    $_SESSION['error']['phone_error'] = 'Please enter a phone number';
}
elseif (!$phone){
    $_SESSION['error']['phone_error'] = 'Invalid entry format';
}

if (empty($_POST['comment'])){
    $_SESSION['error']['comment_error'] = 'Please enter a comment';
}
elseif (!$comment){
    $_SESSION['error']['comment_error'] = 'Invalid entry format';
}

if (empty($_SESSION['error'])){
    $message =
        '<p>AUTOMATED MESSAGE</p>
        <p>Hello ' . $name . ',</p>
        <p>Thank you for reaching out! 
        Please allow for 3-5 business days before you hear back from us.</p><br>
        <p>SUBMISSION INFORMATION:</p>
        <p>Email: '.$email.'</p>
        <p>Phone: '.$phone.'</p>
        <p>Comment: '.$comment.'</p><br>
        <p>- BuyTech Team</p>';
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
                                        Please check your email for messages from us.';
    $_SESSION['success']['link'] = 'index';
    header("location: success.php");
}
else{
    header("location: contact.php");
}
