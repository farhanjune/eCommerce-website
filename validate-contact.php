<?php
session_start();
require('database.php');
$_SESSION['error'] = array();
$_SESSION['success'] = array();

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_INT);
$comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);

if (is_null($name) || !$name){
    $_SESSION['error']['name_error'] = 'Please enter a name';
}

if (is_null($email) || !$email){
    $_SESSION['error']['email_error'] = 'Please enter an email address';
}

if (is_null($phone) || !$phone){
    $_SESSION['error']['phone_error'] = 'Please enter a phone number';
}

if (is_null($comment) || !$comment){
    $_SESSION['error']['comment_error'] = 'Please enter a comment';
}

if (empty($_SESSION['error'])){
    $queryContact = 'INSERT INTO contacts
                        (contactName, contactEmail, contactPhone, contactComment)
                        VALUES (:name, :email, :phone, :comment)';
    $statement = $db -> prepare($queryContact);
    $statement -> bindValue(':name', $name);
    $statement -> bindValue(':email', $email);
    $statement -> bindValue(':phone', $phone);
    $statement -> bindValue(':comment', $comment);
    if ($statement -> execute()) {
        $statement->closeCursor();
        $_SESSION['success']['message'] = 'Thank you for contacting us!';
        $_SESSION['success']['link'] = 'index';
        header("location: success.php");
    }
    else{
        header("location: database-error.php");
    }
}
else{
    header("location: contact.php");
}
