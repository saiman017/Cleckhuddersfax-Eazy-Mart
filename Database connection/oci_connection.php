<?php
// Establish Oracle database connection
$connection = oci_connect('saiman', 'Stha_12', '//localhost/xe');

if (!$connection) {
    $error_message = oci_error();
    echo "Failed to connect to Oracle: " . $error_message['message'];
    exit();
}

oci_close($connection);

?>