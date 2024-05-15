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
                    <p>Welcome back, Saiman!</p>
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
                            <input id="first-name" type="text" value="Saiman" readonly>
                        </div>
                        <div class="profile-field">
                            <label for="last-name">Last Name</label>
                            <p>Shrestha</p>
                        </div>
                    </div>
                    <div class="profile-row">
                        <div class="profile-field">
                            <label for="gender">Gender</label>
                            <select id="gender" disabled>
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="profile-field">
                            <label for="dob">Date of Birth</label>
                            <input id="dob" type="date" value="1990-01-01" readonly>
                        </div>
                    </div>
                    <div class="profile-row">
                        <div class="profile-field">
                            <label for="address">Address</label>
                            <input id="address" type="text" value="Kathmandu" readonly>
                        </div>
                        <div class="profile-field">
                            <label for="number">Contact Number</label>
                            <input id="number" type="number" value="1990-01-01" readonly>
                        </div>
                    </div>
                    <button id="edit-profile">Edit Profile</button>
                </div>
                <div class="profile-content" id="edit-profile-content" style="display: none;">
                <div class="profile-row">
                        <div class="profile-field">
                            <label for="first-name">First Name</label>
                            <input id="first-name" type="text" value="Saiman" readonly>
                        </div>
                        <div class="profile-field">
                            <label for="last-name">Last Name</label>
                            <p>saiman</p>
                        </div>
                    </div>
                    <div class="profile-row">
                        <div class="profile-field">
                            <label for="gender">Gender</label>
                            <select id="gender" disabled>
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="profile-field">
                            <label for="dob">Date of Birth</label>
                            <input id="dob" type="date" value="2000-01-01" readonly>
                        </div>
                    </div>
                    <div class="profile-row">
                        <div class="profile-field">
                            <label for="address">Address</label>
                            <input id="address" type="text" value="Kathmandu" readonly>
                        </div>
                        <div class="profile-field">
                            <label for="number">Contact Number</label>
                            <input id="number" type="number" value="1990-01-01" readonly>
                        </div>
                    </div>
                    <div class="profile-row">
                        <div class="profile-field">
                            <label for="email">Email</label>
                            <input id="email" type="email" value="saiman@example.com">
                        </div>
                        <div class="profile-field">
                            <label for="username">Username</label>
                            <input id="username" type="text" value="saiman">
                        </div>
                    </div>
                    <div class="profile-row">
                        <div class="profile-field">
                            <label for="new-password">New Password</label>
                            <input id="new-password" type="password">
                        </div>
                        <div class="profile-field">
                            <label for="confirm-password">Confirm Password</label>
                            <input id="confirm-password" type="password">
                        </div>
                    </div>
                    <div class="profile-row">
                        <button id="save-profile">Save Profile</button>
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
