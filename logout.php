<?php
session_start();
unset($_SESSION['flag']);
unset($_SESSION['username']);
unset($_SESSION['error']);
unset($_SESSION['success']);
header('location: index.php');
