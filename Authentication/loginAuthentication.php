<?php
session_start();
$conn = oci_connect("c##saiman', 'Stha_12', '//192.168.1.69/XE'");
if (!$conn) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
}

if (isset($_POST['login'])) {
    $email_username = $_POST['email_username'];
    $password = $_POST['password'];
    $role = $_POST['role']; 
    
    
    if($role == 'customer'){
        $query = "SELECT * FROM Customer WHERE  Email = :email OR Username = :username ";
    } elseif ($role == 'trader'){
        $query = "SELECT * FROM Trader WHERE  Email = :email OR Username = :username ";
    } elseif ($role == 'admin') {
        $query = "SELECT * FROM Management WHERE  Email = :email OR Username = :username ";
    } else {
        echo '<script>alert("Invalid role selected.");</script>';
        exit();
    }

    $statement = oci_parse($conn, $query);
    
    // Bind parameters
    oci_bind_by_name($statement, ":email", $email_username);
    oci_bind_by_name($statement, ":username", $email_username);
    
    oci_execute($statement);

    // Fetch the user record
    $user = oci_fetch_assoc($statement);

    if ($user) {
        //verify email
        if ($user['EMAIL_USERNAME'] === $email_username){
        // Then Verify password
        if ($user['PASSWORD'] === $password) {
            // if Authentication successful
            $_SESSION['user'] = $user; 
            // Redirect users to role based pages
            if($role == 'customer'){
                $_SESSION['customer_name'] = $row['Email'];
                header("Location: ../index.php");
            } elseif ($role == 'trader'){
                header("Location: ../Dashboard/Trader Dashboard.php");
            } elseif ($role == 'admin') {
                header("Location: ../admin_dashboard.php");
            }
            exit(); // Make sure to exit after redirection
        } else {
            // Password doesn't match
            $_SESSION['error'] = "wrong password please type correct password";
            // echo '<script>alert("Incorrect password. Please try again.";</script>';
        }
        }else{
            $_SESSION['error'] = "email not found please provide correct email address";
        }
    } else {
        // User not found
        // echo '<script>alert("User not found. Please register or check your email.");</script>';
        $_SESSION['error'] = "User Data not found";
    }

    oci_close($conn);
}
?>
