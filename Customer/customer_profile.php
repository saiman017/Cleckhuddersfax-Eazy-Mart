<?php
require_once '../middlewares/checkAuthentication.php';

// Check if the user is logged in
checkIfUserIsLoggedIn();



$conn = oci_connect('saiman', 'Stha_12', '//localhost/xe');
if (!$conn) {
    $m = oci_error();
    $_SESSION['error']= $m['message'];
    exit();
} else {

    $_SESSION['notification'] = "Connected to Oracle!";
}


if (isset($_SESSION['user']['EMAIL'])) {
    $userEmail = $_SESSION['user']['EMAIL'];
} else {
    $_SESSION['error'] = "User not found";
}

$query = "SELECT * FROM Customer WHERE Email = '$userEmail' ";
$statement = oci_parse($conn, $query);
oci_execute($statement);
// Fetch the user record
$fetch = oci_fetch_assoc($statement);





if(isset($_POST['saveProfile'])) {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $npassword = $_POST['npassword'];
    $opassword = $_POST['opassword'];
    $customerId = $_SESSION['user']['TRADER_ID']; 
    $number = $_SESSION['contact_number'];
    $address = $_POST['address'];
    $dateOfBirth = date('Y-m-d', strtotime($_POST['dob']));
    $gender = $_POST["gender"];
    $Uname = $_POST['username'];



    // Check if old password matches
$old_password = $_POST['opassword'];
$query = "SELECT PASSWORD FROM TRADER WHERE CUSTOMER_ID = '$customerId'";
$statement = oci_parse($conn, $query);
oci_execute($statement);
$fetch_password = oci_fetch_assoc($statement);

if ($fetch_password['PASSWORD'] !== $old_password) {
    $_SESSION['error'] = "Old password is incorrect";
    header("Location: customer_profile.php");
    exit();
}

// Check if old and new passwords are the same
if ($old_password === $npassword) {
    $_SESSION['error'] = "New password should be different from the old password";
    header("Location: customer_profile.php");
    exit();
}


    $query_update = "UPDATE TRADER 
              SET FIRST_NAME = '$first_name', LAST_NAME = '$last_name', EMAIL = $email,ADDRESS='$address',GENDER='$gender',USERNAME='$Uname',CONTACT_NUMBER = '$number', PASSWORD = '$npassword', DATE_OF_BIRTH = TO_DATE('$dob', 'YYYY-MM-DD',) 
              WHERE CUSTOMER_ID = '$customerId'";


    $statement_update = oci_parse($conn, $query_update);
    $result_update = oci_execute($statement_update);


    if($result_update) {
        oci_commit($conn);
        header("Location: customer_profile.php");        
        exit(); 
    }
    else {

        echo "Error updating profile!";
    }
}


    
oci_close($conn);

?>


<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <link rel="stylesheet" href="../includes/style.css">
    <link rel="stylesheet" href="../includes/header.css">
    <link rel="stylesheet" href="../includes/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header><?php include('../includes/head.php'); ?></header>
    <div class="customer-profile">
        <div class="container">
            <div class="sidebar">
                <a href="./customer_profile.php">My Profile</a>
                <a href="./customer_order.php">My Orders</a>
                <a href="./Wishlist.php">My Wishlist</a>
            </div>
            <div class="main-content">
                <div class="profile" id="profile">
                    <div class="profile-header">
                        <h1>Customer Profile</h1>
                        <p>Welcome back , <?php echo $fetch['FIRST_NAME']; ?></p>
                        <div class="profile-picture">
                            <img src="https://images.unsplash.com/photo-1528698827591-e19ccd7bc23d?q=80&w=1476&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Profile Picture">
                            <div class="edit-profile-icon">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="profile-content" id="profile-content">
                        <div class="profile-row">
                            <div class="profile-field">
                                <label for="first-name">First Name</label>
                                <input id="first-name" type="text" name="first_name" value="<?php echo $fetch['FIRST_NAME']; ?>" readonly>
                            </div>
                            <div class="profile-field">
                                <label for="last-name">Last Name</label>
                                <input id="last-name" type="text" name="last_name" value="<?php echo $fetch['LAST_NAME']; ?>" readonly>
                            </div>
                        </div>
                        <div class="profile-row">
                            <div class="profile-field">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender">
                                    <option value="male" <?php echo ($fetch['GENDER'] == 'male') ? 'selected' : ''; ?>>Male</option>
                                    <option value="female" <?php echo ($fetch['GENDER'] == 'female') ? 'selected' : ''; ?>>Female</option>
                                    <option value="other" <?php echo ($fetch['GENDER'] == 'other') ? 'selected' : ''; ?>>Other</option>
                                </select>
                            </div>
                            <div class="profile-field">
                                <label for="dob">Date of Birth</label>
                                <input id="dob" type="date" name="dob" value="<?php echo date('Y-m-d', strtotime($fetch['DATE_OF_BIRTH'])); ?>" readonly>
                            </div>
                        </div>
                        <div class="profile-row">
                            <div class="profile-field">
                                <label for="address">Address</label>
                                <input id="address" type="text" name="address" value="<?php echo $fetch['ADDRESS']; ?>" readonly>
                            </div>
                            <div class="profile-field">
                                <label for="number">Contact Number</label>
                                <input id="number" type="number" name="contact_number" value="<?php echo $fetch['CONTACT_NUMBER']; ?>" readonly>
                            </div>
                        </div>
                        <button id="edit-profile">Edit Profile</button>
                    </div>
                    <div class="profile-content" id="edit-profile-content" style="display: none;">
                        <!-- Edit profile form -->
                        <form action="" method="POST">
                            <div class="profile-row">
                                <div class="profile-field">
                                    <label for="first-name">First Name</label>
                                    <input id="first-name" type="text" name="first_name" value="<?php echo $fetch['FIRST_NAME']; ?>">
                                </div>
                                <div class="profile-field">
                                    <label for="last-name">Last Name</label>
                                    <input id="last-name" type="text" name="last_name" value="<?php echo $fetch['LAST_NAME']; ?>">
                                </div>
                            </div>
                            <div class="profile-row">
                                <div class="profile-field">
                                    <label for="gender">Gender</label>
                                    <select id="gender" name="gender">
                                        <option value="male" <?php echo ($fetch['GENDER'] == 'male') ? 'selected' : ''; ?>>Male</option>
                                        <option value="female" <?php echo ($fetch['GENDER'] == 'female') ? 'selected' : ''; ?>>Female</option>
                                        <option value="other" <?php echo ($fetch['GENDER'] == 'other') ? 'selected' : ''; ?>>Other</option>
                                    </select>
                                </div>
                                <div class="profile-field">
                                    <label for="dob">Date of Birth</label>
                                    <input id="dob" type="date" name="dob" value="<?php echo date('Y-m-d', strtotime($fetch['DATE_OF_BIRTH'])); ?>">
                                </div>
                            </div>
                            <div class="profile-row">
                                <div class="profile-field">
                                    <label for="address">Address</label>
                                    <input id="address" type="text" name="address" value="<?php echo $fetch['ADDRESS']; ?>">
                                </div>
                                <div class="profile-field">
                                    <label for="number">Contact Number</label>
                                    <input id="number" type="number" name="contact_number" value="<?php echo $fetch['CONTACT_NUMBER']; ?>">
                                </div>
                            </div>
                            <div class="profile-row">
                                <div class="profile-field">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" name="email" value="<?php echo $fetch['EMAIL']; ?>">
                                </div>
                        <div class="profile-field">
                            <label for="username">Username</label>
                            <input id="username" type="text" name="username" value="<?php echo $fetch['USERNAME']; ?>">
                        </div>
                    </div>
                    <div class="profile-row">
                        <div class="profile-field">
                            <label for="new-password">Old Password</label>
                            <input id="new-password" name="opassword" type="password">
                        </div>
                        <div class="profile-field">
                            <label for="confirm-password">New Password</label>
                            <input id="confirm-password" name="npassword" type="password">
                        </div>
                    </div>
                    <div class="profile-row">
                        <button  name="saveProfile" id="save-profile">Save Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    
    <div><?php include('../includes/footer.php'); ?></div>

    <script>
        document.getElementById('edit-profile').addEventListener('click', function() {
            document.getElementById('profile-content').style.display = 'none';
            document.getElementById('edit-profile-content').style.display = 'block';
        });

        document.getElementById('save-profile').addEventListener('click', function() {
            // Code to save the updated profile
            alert('Profile saved successfully!');
            // For demo purposes, let's switch back to the view mode
            document.getElementById('edit-profile-content').style.display = 'none';
            document.getElementById('profile-content').style.display = 'block';
        });
    </script>
</body>
</html>
