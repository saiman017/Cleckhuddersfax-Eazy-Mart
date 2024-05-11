<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../includes/style.css">
    <link rel="stylesheet" href="../includes/footer.css">
    <link rel="stylesheet" href="../includes/header.css">
</head>
<body>

    <div class="login-container">
    <div class="form-container">
        <div class="left-side">
            <img src="../assets/images/abc.jpg" alt="Background Image">
        </div>
        <div class="right-side">
            <img src="../assets/images/icons/logo.png" alt="Logo" class="logo">
            <h2>Login</h2>
            <form>
                <span>Username/Email</span>
                <input type="email" id="email" name="email" placeholder="Username/Email" class="input-field">
                <span>Password</span>
                <input type="password" id="password" name="password" placeholder="Password" class="input-field">
                <button type="submit" class="submit-btn"><a href="../includes/homepage.php">Login</a></button>
            </form>
            <div class="text-center mt-4">
                <p>Don't have an account? <a href="../SignUp/customer_signup.php" class="signin-link">Sign Up</a></p>
            </div>
        </div>
    </div>

    </div>
    
</body>
</html>
