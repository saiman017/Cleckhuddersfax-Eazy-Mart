<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trader Signup</title>
    <link rel="shortcut icon" href="../assets/images/icons/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../includes/style.css">
    
</head>
<body>
    <!-- Shop details form -->
    <div class="add-shop">
        <div class="right-side" id="shopDetailsForm">
            <a href="../index.php" class="logo-link"><img src="../assets/images/icons/logo.png" alt="" class="logo"></a>
            <h2>Shop Details</h2>
            <form class="shop-form" id="shopForm">
                <span>Shop Name</span>
                <input type="text" id="shopName" name="shopName" placeholder="Shop Name" class="input-field">
                <span>Location</span>
                <input type="text" id="location" name="location" placeholder="Location" class="input-field">
                <span>Contact Number</span>
                <input type="tel" id="shopContactNumber" name="shopContactNumber" placeholder="Contact Number" class="input-field">
                <span>Shop Description</span>
                <input type="tel" id="shopDescription" name="shopDescription" placeholder="Description" class="input-field">
                <button type="submit" class="submit-btn">Next</button>
            </form>
        </div>
    </div>
</body>
</html>
