<?php 
session_start();

function checkUserRole($requiredRole){
    if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== $requiredRole ){
        header('Location: ../messages/unauthorized.php');
    }
}



?>