<?php
// Establish connection
$conn = oci_connect('saiman', 'Stha_12', '//localhost/xe');
if (!$conn) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
} else {
    print "Connected to Oracle!";
}

// Check if the form is submitted
if(isset($_POST['submit']))
{
    // Retrieve form data and sanitize
    $email = $_POST['email'];
    $password = $_POST['password']; // No need to sanitize password as it will be hashed
    $fname = $_POST['first-name'];
    $lname = $_POST['last-name'];
    $number = $_POST['contact-number'];
    $address = $_POST['address'];
    $dateOfBirth = date('Y-m-d', strtotime($_POST['dob']));
    $gender = $_POST["gender"];
    $Uname = $_POST['username'];
    // Get the current date and time
    $registry = date('d-M-Y');

    // Build the SQL query with proper quoting
    $query = "INSERT INTO Customer (First_Name, Last_Name, Contact_Number, Address, Date_of_Birth, Gender, Email, Register_Date, Username, Password, Profile_Image) 
    VALUES ('$fname', '$lname', '$number', '$address', TO_DATE('$dateOfBirth', 'YYYY-MM-DD'), '$gender', '$email', SYSDATE, '$Uname', '$password', null)";

    // Prepare the SQL statement
    $statement = oci_parse($conn, $query);
    
    // Execute the SQL statement
    $result = oci_execute($statement);

    // Check if the execution was successful
    if($result) {
        // If successful, commit the transaction
        oci_commit($conn);
        // Display success message using JavaScript alert
        echo "<script>alert('New Records Inserted!')</script>";
        // Redirect to the login page
        header("Location: ../Login/customer_signin.php");
        // Make sure to exit after redirection
        exit(); 
    }
    else {
        // If execution fails, display error message
        $error = oci_error($statement);
        echo "Error: " . $error['message']; // Display Oracle error message
    }

    // Close the database connection
    oci_close($conn);
}
?>
