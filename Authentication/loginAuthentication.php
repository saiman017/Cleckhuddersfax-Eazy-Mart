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

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to retrieve user data based on email using prepared statement
    $query = "SELECT * FROM Customer WHERE Email = :email";

    $statement = oci_parse($conn, $query);
    oci_bind_by_name($statement, ":email", $email);
    oci_execute($statement);

    // Fetch the user record
    $user = oci_fetch_assoc($statement);

    if ($user) {
        // Verify password
        if ($user['PASSWORD'] === $password) {
            // Authentication successful
            echo "Login successful. Welcome, " . $user['FIRST_NAME'] . "!";

            // Redirect to the user's dashboard or homepage
            header("Location: ../index.php");
            exit(); // Make sure to exit after redirection
        } else {
            // Password doesn't match
            echo "Incorrect password. Please try again.";
        }
    } else {
        // User not found
        echo "User not found. Please register or check your email.";
    }

    oci_close($conn);
}
?>
