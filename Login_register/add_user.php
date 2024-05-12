<?php

// Establish Oracle database connection
$connection = oci_connect('saiman', 'Stha_12', '//localhost/xe');

// Check if the connection is successful
if (!$connection) {
    // If connection fails, display error message and exit
    $error_message = oci_error();
    echo "Failed to connect to Oracle: " . $error_message['message'];
    exit();
}

// Check if the form is submitted
if(isset($_POST['submit']))

{
    // Retrieve form data and sanitize
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password']; // No need to sanitize password as it will be hashed
$fname = $_POST['first-name'];
$lname = $_POST['last-name'];
$number = $_POST['contact-number'];
$address = $_POST['address'];
$dob = $_POST['dob'];
$gender = $_POST["gender"];
$Uname = $_POST['username'];

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Build the SQL query with proper quoting
$query = "INSERT INTO Customer (First_Name, Last_Name, Contact_Number, Address, Date_of_Birth, Gender, Email, Register_Date, Username, Password, Profile_Image) 
VALUES ('$fname', '$lname', '$number', '$address', '$dob', '$gender', '$email', '$registry', '$Uname', '$hashed_password', null)";

// Prepare, execute, and handle errors as before...

    // Prepare the SQL statement
    $statement = oci_parse($connection, $query);
    
    // Execute the SQL statement
    $result = oci_execute($statement);

    // Check if the execution was successful
    if($result) {
        // If successful, commit the transaction
        oci_commit($connection);
        // Display success message using JavaScript alert
        echo "<script>alert('New Records Inserted!')</script>";
        // Redirect to the login page
        header("Location: ../Login_register/customer_signin.php");
        // Make sure to exit after redirection
        exit(); 
    }
    else {
        // If execution fails, display error message
        echo "Error!";
    }

    // Close the database connection
    oci_close($connection);

}
?>
