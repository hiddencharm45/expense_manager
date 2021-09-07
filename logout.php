<?php
session_start();
//If Session not set
if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
//If session already set then destroy session and redirect to Index page
session_destroy();
header('location: index.php');
?>