<?php 
session_start();

function checkIfUserIsLoggedIn(){
    if(!isset($_SESSION['user'])){
        header("Location: ../Login/customer_signin.php");
    }
    else{
        header("Location: ../index.php");
    }
}

?>