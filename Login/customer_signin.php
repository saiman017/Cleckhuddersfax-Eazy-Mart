<?php
// Display error message if it exists
<<<<<<< HEAD
session_start();
=======
>>>>>>> origin/alpha
$error = '';
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']); // Clear the error after displaying it
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../includes/style.css">
    <link rel="shortcut icon" href="../assets/images/icons/logo.png" type="image/x-icon">
</head>
<body>
<?php if ($error): ?>
        <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
<div class="login-container">
    <div class="form-container">
        <div class="left-side">
            <img src="../assets/images/abc.jpg" alt="Background Image">
        </div>
        <div class="right-side">
            <a href="../index.php"><img src="../assets/images/icons/logo.png" alt="Logo" class="logo"></a>
            <h2>Login</h2>
            <form action="../Authentication/loginAuthentication.php" method="post">
                <span>Username/Email</span>
                <input type="text" id="email" name="email_username" placeholder="Username/Email" class="input-field">
                <span>Password</span>
                <input type="password" id="password" name="password" placeholder="Password" class="input-field">
                <!-- Role Selector -->
                <span>Select Role</span>
                <select name="role" id="role" class="input-field">
                    <option disabled selected>Select Role</option>
                    <option value="customer">Customer</option>
                    <option value="trader">Trader</option>
                    <option value="admin">Admin</option>
                </select>
   
                <!-- End Role Selector -->

                <div class="remember-me">
    <input type="checkbox" id="rememberMe" value="lsRememberMe">
    <label for="rememberMe">Remember me</label>
    <span class="forget-link">Forgot your password?</span>
</div>

                <button type="submit" class="submit-btn" name="login">Login</button>
            </form>
            <div class="text-center mt-4">
                <p>Don't have an account? <a href="../Sign Up/customer_signup.php" class="signin-link">Sign Up</a></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
