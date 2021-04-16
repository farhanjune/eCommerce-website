<?php
session_start();
unset($_SESSION['flag']);
unset($_SESSION['username']);
header('Location: index.php');

?>