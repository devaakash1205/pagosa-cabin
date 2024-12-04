<?php
session_start();
include("../config.php");

if (!isset($_SESSION['auth_token'])) {
    logout_user();
}

$auth_token = $_SESSION['auth_token'];

// logout_user function
function logout_user() {
    session_unset();
    session_destroy();
    header("Location: ../");
    exit;
}
?>
