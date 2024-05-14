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

    <style>
        /* Reset */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .profile {
            background-color: #f9f9f9;
            border-radius: 20px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 800px;
            width: 100%;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-header h1 {
            font-size: 2.5rem;
            color: #333333;
            margin-bottom: 10px;
        }

        .profile-header p {
            font-size: 1.2rem;
            color: #666666;
        }

        .profile-picture {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-picture img {
            width: 200px;
            height: 200px;
            border-radius: 100%;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .profile-content {
            padding-top: 20px;
        }

        .profile-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            align-items: center;
        }

        .profile-field {
            flex: 1;
            margin-right: 10px;
        }

        .profile-field label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555555;
            font-size: 1rem;
        }

        .profile-field input,
        .profile-field select,
        .profile-field p {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .profile-field p {
            background-color: #f9f9f9;
        }

        .profile-field input:focus,
        .profile-field select:focus {
            outline: none;
            border-color: #007bff;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header><?php include('../includes/head.php');?></header>

    <div class="container">
        <div class="profile" id="profile">
            <div class="profile-header">
                <h1>Customer Profile</h1>
                <p>Welcome back, John Doe!</p>
                <div class="profile-picture">
                    <img src="#" alt="Profile Picture">
                </div>
            </div>
            <div class="profile-content">
                <div class="profile-row">
                    <div class="profile-field">
                        <label for="first-name">First Name</label>
                        <input id="first-name" type="text" value="John" readonly>
                    </div>
                    <div class="profile-field">
                        <label>Last Name</label>
                        <p>Doe</p>
                    </div>
                </div>
                <div class="profile-row">
                    <div class="profile-field">
                        <label>Email</label>
                        <p>john@example.com</p>
                    </div>
                    <div class="profile-field">
                        <label for="contact-number">Contact Number</label>
                        <input id="contact-number" type="tel" value="123-456-7890" readonly>
                    </div>
                </div>
                <div class="profile-row">
                    <div class="profile-field">
                        <label for="address">Address</label>
                        <input id="address" type="text" placeholder="Your address">
                    </div>
                    <div class="profile-field">
                        <label for="gender">Gender</label>
                        <select id="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="profile-row">
                    <div class="profile-field">
                        <label for="dob">Date of Birth</label>
                        <input id="dob" type="date">
                    </div>
                    <div class="profile-field">
                        <label for="username">Username</label>
                        <input id="username" type="text" placeholder="Your username">
                    </div>
                </div>
                <div class="profile-row">
                    <button>Update Profile</button>
                </div>
            </div>
        </div>
    </div>
    <div><?php include('../includes/footer.php');?></div>
</body>
</html>
