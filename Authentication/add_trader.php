<?php
session_start();

$conn = oci_connect('saiman', 'Stha_12', '127.0.0.1:1521/xe');
if (!$conn) {
    $m = oci_error();
    $_SESSION['error']=$m['message'];
    exit;
} else {
    // print "Connected to Oracle!";
    $_SESSION['notification'] = "Connected to Oracle!";
}


if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $fname = $_POST['first-name'];
    $lname = $_POST['last-name'];
    $number = $_POST['contact-number'];
    $address = $_POST['address'];
    $dateOfBirth = date('Y-m-d', strtotime($_POST['dob']));
    $gender = $_POST["gender"];
    $Uname = $_POST['username'];
    $registry = date('d-M-Y');
    $cpassword = $_POST['cpassword'];

    // Check if email, username, or contact number already exists
    $query_check = "SELECT Email, Username, Contact_Number FROM Trader WHERE Email = '$email' OR Username = '$Uname' OR Contact_Number = '$number'";
    $statement_check = oci_parse($conn, $query_check);
    oci_execute($statement_check);
    $row = oci_fetch_assoc($statement_check);

    if ($row !== false) {
        $message = "Email, username, or contact number already exists. Please use different ones.";
        if ($email === $row['Email']) {
            $message = "Email already exists. Please use a different email.";
        } elseif ($Uname === $row['Username']) {
            $message = "Username already exists. Please use a different username.";
        } elseif ($number === $row['Contact_Number']) {
            $message = "Contact number already exists. Please use a different one.";
        }
        // echo '<script>alert("' . $message . '")</script>';
        $_SESSION['error'] = $message;
        exit();
    }

    // password validation
    if ($password !== $cpassword) {
        // echo '<script>alert("Password and Confirm Password do not match. Please try again.")</script>';
        $_SESSION['error'] = "Password and Confirm Password do not match. Please try again.";
        exit();  
    }
    
    if (strlen($password) < 8 || strlen($password) > 32 ) {
        // echo '<script>alert("Password must be at least 8 or less than 32 characters long.")</script>';
        $_SESSION['error'] = "Password must be at least 8 or less than 32 characters long.";
        exit();
    }

    if (!preg_match('/[!@#$%^&*()\-_=+]/', $password)) {
        // echo '<script>alert("Password must contain at least one special charcater.")</script>';
        $_SESSION['error'] = "Password must contain at least one special charcater.";
        exit();
    }
    

    $query = "INSERT INTO Trader (First_Name, Last_Name, Contact_Number, Address, Date_of_Birth, Gender, Email, Register_Date, Username, Password, Profile_Image) 
    VALUES ('$fname', '$lname', '$number', '$address', TO_DATE('$dateOfBirth', 'YYYY-MM-DD'), '$gender', '$email', SYSDATE, '$Uname', '$password', null)";

    $statement = oci_parse($conn, $query);
    
    $result = oci_execute($statement);

    if($result) {
        oci_commit($conn);
        header("Location: ../Login/customer_signin.php");
        exit(); 
    }
    else {
        $error = oci_error($statement);
        // echo "Error: " . $error['message']; // Display Oracle error message
        $_SESSION[''] = $error['message'];
    }

    oci_close($conn);
}
?>
