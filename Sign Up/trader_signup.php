<?php 

include '../messages/notifications.php';

list($error,$notification)=flashNotification();


// Check if the user is logged in
if(isset($_SESSION['user'])){
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trader Signup</title>
    <link rel="shortcut icon" href="../assets/images/icons/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../includes/style.css">
    <link rel="stylesheet" type="text/css" href="../includes/footer.css">
    <link rel="stylesheet" type="text/css" href="../includes/header.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
    <link rel="stylesheet" type="text/css" href="../trader/home.css">
</head>

<body>
    <div class="trader-login">
        <div class="background-container"></div>
        <?php 

if($error): ?>
        <div class="alert alert-danger" role="alert">
            <?php  echo $error; ?>
        </div>
        <?php endif; ?>
        <div class="form-container">
            <div class="left-side">
                <img src="../assets/images/admin_login.jpg" alt="Background Image">
            </div>
            <div class="right-side" id="signupForm">
                <a href="../includes/homepage.php"><img src="../assets/images/icons/logo.png" alt="Logo"
                        class="logo"></a>
                <div class="head">
                    <h2>Create Account</h2>
                </div>
                <form class="w-full max-w-lg" id="signupForm" method="post" action="../Authentication/add_trader.php">
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
                                for="first-name">First Name</label>
                            <input
                                class="appearance-none block w-full text-gray-700 border rounded py-2 px-4 mb-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="first-name" name="first-name" type="text" placeholder="">
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
                                for="last-name">Last Name</label>
                            <input
                                class="appearance-none block w-full text-gray-700 border rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="last-name" name="last-name" type="text" placeholder="">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
                                for="email">Email</label>
                            <input
                                class="appearance-none block w-full    text-gray-700 border rounded py-2 px-4 mb-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="email" name="email" type="email" placeholder="">
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
                                for="contact-number">Contact Number</label>
                            <input
                                class="appearance-none block w-full    text-gray-700 border rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="contact-number" name="contact-number" type="tel" placeholder="">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
                                for="address">Address</label>
                            <input
                                class="appearance-none block w-full    text-gray-700 border rounded py-2 px-4 mb-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="address" name="address" type="text" placeholder="">
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
                                for="dob">Date of Birth</label>
                            <input
                                class="appearance-none block w-full    text-gray-700 border rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="dob" name="dob" type="date" placeholder="">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
                                for="gender">Gender</label>
                            <select
                                class="appearance-none block w-full text-gray-700 border rounded py-2 px-4 mb-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="gender" name="gender">
                                <option disabled selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
                                for="username">Username</label>
                            <input
                                class="appearance-none block w-full    text-gray-700 border rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="username" name="username" type="text" placeholder="">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
                                for="password">Password</label>
                            <input
                                class="appearance-none block w-full    text-gray-700 border rounded py-2 px-4 mb-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="password" name="password" type="password" placeholder="">
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1"
                                for="confirm-password">Confirm Password</label>
                            <input
                                class="appearance-none block w-full    text-gray-700 border rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="confirm-password" name="cpassword" type="password" placeholder="">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full px-3">
                            <input type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600" id="terms"
                                name="terms" required>
                            <label for="terms" class="ml-2 text-gray-700">I agree to <a href="../Support/Terms_and_conditions.php">terms and conditions</a></label>
                        </div>
                    </div>
                    <button type="submit" name="submit" id="submit"
                        class="submit-btn">Next</button>
                </form>
                <div class="text-center mt-2">
                    <p>Already have an account? <a href="../login/customer_signin.php" class="signin-link">Sign In</a>
                    </p>
                </div>
            </div>
        </div>
    </div>



</body>

</html>