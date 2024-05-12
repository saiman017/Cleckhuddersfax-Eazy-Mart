<!-- <!DOCTYPE html>
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

    <div class="login-container">
    <div class="form-container">
        <div class="left-side">
            <img src="../assets/images/abc.jpg" alt="Background Image">
        </div>
        <div class="right-side">
            <a href="../index.php"><img src="../assets/images/icons/logo.png" alt="Logo" class="logo"></a>
            <h2>Login</h2>
            <form action="loginAuthentication.php" method="post">
                <span>Username/Email</span>
                <input type="email" id="email" name="email" placeholder="Username/Email" class="input-field">
                <span>Password</span>
                <input type="password" id="password" name="password" placeholder="Password" class="input-field">
                <button type="submit" class="submit-btn">Login</button>
            </form>
            <div class="text-center mt-4">
                <p>Don't have an account? <a href="../Login_register/customer_signup.php" class="signin-link">Sign Up</a></p>
            </div>
        </div>
    </div>

    </div>
    
</body>
</html> -->

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

<div class="login-container">
    <div class="form-container">
        <div class="left-side">
            <img src="../assets/images/abc.jpg" alt="Background Image">
        </div>
        <div class="right-side">
            <a href="../index.php"><img src="../assets/images/icons/logo.png" alt="Logo" class="logo"></a>
            <h2>Login</h2>
            <form action="loginAuthentication.php" method="post">
                <span>Username/Email</span>
                <input type="email" id="email" name="email" placeholder="Username/Email" class="input-field">
                <span>Password</span>
                <input type="password" id="password" name="password" placeholder="Password" class="input-field">
                <button type="submit" class="submit-btn" name="login">Login</button>
            </form>
            <div class="text-center mt-4">
                <p>Don't have an account? <a href="Login_register/customer_signup.php" class="signin-link">Sign Up</a></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
