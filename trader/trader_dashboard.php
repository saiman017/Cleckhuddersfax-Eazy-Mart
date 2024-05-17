<?php

require_once '../middlewares/checkAuthentication.php';

// Check if the user is logged in
checkIfUserIsLoggedIn();



$conn = oci_connect('saiman', 'Stha_12', '//localhost/xe');
if (!$conn) {
    $m = oci_error();
    $_SESSION['error'] = $m['message'];
    exit();
} else {
    $_SESSION['notification'] = "Connected to Oracle!";
}
 
if (isset($_SESSION['user']['EMAIL'])) {
  $userEmail = $_SESSION['user']['EMAIL'];
} else {
  die("User not found");
}
$query = "SELECT * FROM Customer WHERE Email = :email";
$statement = oci_parse($conn, $query);
oci_bind_by_name($statement, ":email", $userEmail);
oci_execute($statement);

// Fetch the user record
$fetch = oci_fetch_assoc($statement);
oci_close($conn)
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
    <<div class="profile-name"><?php echo $fetch['FIRST_NAME']; ?></div>
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
          <h2>Dashboard</h2>
        </div>

        <div class="main-cards">

          <div class="card">
            <img src="" alt="">
            <div class="card-inner">

              <h2>Graph 1</h2>
            </div>
          </div>

          <div class="card">
            <div class="card-inner">
              <h2>Graph 2</h2>
            </div>
          </div>

          <div class="card">
            <div class="card-inner">
              <h2>Graph 3</h2>
            </div>
          </div>

          <div class="card">
            <div class="card-inner">
              <h2>Graph 4</h2>
            </div>
          </div>
        </div>       
      </main>
    </div>

  </body>
</html>