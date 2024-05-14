<?php 
session_start();
if(!isset($_SESSION['user'])){
    header("Location: ../Login/customer_signin.php");
    exit(); // Make sure to exit after redirection
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>hello</h1>
</body>
</html>
