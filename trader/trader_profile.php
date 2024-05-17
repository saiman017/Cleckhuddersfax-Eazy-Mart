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
    // print "Connected to Oracle!";
    $_SESSION['notification'] = "Connected to Oracle!";
}


if (isset($_SESSION['user']['EMAIL'])) {
    $userEmail = $_SESSION['user']['EMAIL'];
} else {
  $_SESSION['error'] = "User not found";;
}

    
$query = "SELECT * FROM Trader WHERE Email = '$userEmail'";
$statement = oci_parse($conn, $query);
oci_execute($statement);
// Fetch the user record
$fetch = oci_fetch_assoc($statement);


oci_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Trader Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="trader.css">
  </head>
  <style>
    /* customer profile */
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  outline: none;
  font-family: "Poppins", sans-serif;

}

body {
  width: 100%;
  background-color: white;
  overflow-x: hidden;
  margin: 0;
  min-width: 700;
  
}


.trader-profile .container {
  display: flex;
  padding-bottom: 10px;
  margin-bottom: 20px;
}

.trader-profile  .main-content {
  margin-left: 50px;
  flex-grow: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 20px;
}

.trader-profile  .profile {
  background-color: #f9f9f9;
  border-radius: 20px;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
  padding: 40px;
  max-width: 800px;
  width: 100%;
  position: relative; 
}

.trader-profile  .profile-row {
  display: flex;
  justify-content: space-between; 
  margin-bottom: 20px; 
}

.trader-profile  .profile-field {
  flex: 1; 
  padding: 0 10px; 
}
.trader-profile .profile-header h1 {
  font-size: 2.5rem;
  color: #333;
  margin-bottom: 10px;
  align-items: center;
  text-align: center;
}

.trader-profile  .profile-header p {
  font-size: 1.2rem;
  color: #666;
  align-items: center;
  text-align: center;
  margin-bottom: 10px;
}

.trader-profile .profile-picture {
  width: 150px;
  height: 150px;
  border-radius: 100%;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  overflow: hidden; 
  position: relative;
  margin: 0 auto; 
  border-color: #666;
  margin-bottom: 20px;
}

.trader-profile .profile-picture img {
  width: 100%;
  height: 100%;
  object-fit: cover; 
}

.trader-profile .edit-profile-icon {
  position: absolute;
  bottom: 10px;
  right: 10px;
  background-color: #007bff;
  color: white;
  padding: 5px;
  border-radius: 50%;
  cursor: pointer;
  display: none;
}

.trader-profile .edit-profile-icon:hover {
  background-color: #0056b3;
}

.trader-profile .profile:hover .edit-profile-icon {
  display: block; 
}

.trader-profile .profile-field label {
  font-weight: bold;
  margin-bottom: 5px;
  color: #555;
  display: block;
  font-size: 1rem;
}

.trader-profile .profile-field input, .profile-field select, .profile-field p {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 1rem;
}

.trader-profile  .profile-field p {
  background-color: #f9f9f9;
}

.trader-profile  button {
  background-color: orange;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.trader-profile  button:hover {
  background-color: crimson;
}
</style>
  <body>
    <div class="grid-container">

    <header class="header">
  <div class="menu-icon">
    <span class="material-icons-outlined">menu</span>
  </div>
  <div class="search-bar">
    <input type="text" placeholder="Search...">
    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
  <div class="profile-section">
    <div class="profile-image">
      <img src="../assets/images/Shop/butcher 1.jpg" alt="Profile Image">
    </div>
    <div class="profile-name"><?php echo $fetch['FIRST_NAME'];?></div>
  </div>
</header>


     <!-- Sidebar -->
<aside id="sidebar">
  <div class="sidebar-title">
    <div class="sidebar-brand">
      <a href="./trader_dashboard.php"><img src="../assets/images/icons/logo.png" alt=""></a>
    </div>
  </div>

  <ul class="sidebar-list">
    <li class="sidebar-list-item">
      <a href="./trader_dashboard.php">
        <span class="material-icons-outlined">dashboard</span> Dashboard
      </a>
    </li>
    <li class="sidebar-list-item">
  <a href="#">
    <span class="material-icons-outlined">leaderboard</span> Report
  </a>
  <ul class="submenu">
    <li><a href="#">Report 1</a></li>
    <li><a href="#">Report 2</a></li>
    <li><a href="#">Report 3</a></li>
  </ul>
</li>
    <li class="sidebar-list-item">
      <a href="./trader_profile.php">
       <img src="#" alt=""> My Profile
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="./view_product_detail.php">
       <img src="" alt=""> Product Detail
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="#">
       <img src="#" alt=""> Shop Detail
      </a>
    </li>
  </ul>

  <!-- Logout Button -->
  <div class="logout-button">
    <button>Logout</button>
  </div>
</aside>
<!-- End Sidebar -->


      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <h2>My Profile</h2>
        </div>
        <div class="trader-profile">
    <div class="container">
        <div class="main-content">
            <div class="profile" id="profile">
                <div class="profile-header">
                    <h1>Trader Profile</h1>
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
                            <label for="old-password">Old Password</label>
                            <input id="old-password" type="password">
                        </div>
                        <div class="profile-field">
                            <label for="new-password">New Password</label>
                            <input id="new-password" type="password">
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

      
              
      </main>
    </div>

  </body>
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

</html>



