<?php
session_start();

function checkIfLoggedIn() {
    if (!isset($_SESSION['user'])) {
        header('Location: ../Login/customer_signin.php');
        exit();
    }
}
?>
