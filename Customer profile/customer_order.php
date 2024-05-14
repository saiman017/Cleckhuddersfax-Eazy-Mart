<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../includes/header.css">
    <link rel="stylesheet" href="../includes/style.css">

    <link rel="stylesheet" href="../includes/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Reset */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <header><?php include('../includes/head.php');?></header>
    <div id="orders" class="profile-header">
        <h1 class="text-2xl font-bold mb-4 text-center">Order History</h1>
        <p class="text-gray-600 mb-8 text-center">View your past orders and order details.</p>
        <div class="profile-content">
            <!-- Order History Items -->
            <div class="cart-items w-full px-10">
                <!-- Single Order Item -->
                <div class="border border-gray-300 rounded-lg mb-6 p-4">
                    <!-- Order ID, Product Image, Product Name, Category, Price, Quantity, Date -->
                    <div class="flex w-full items-center justify-between">
                        <!-- Product Image -->
                        <img src="../assets/images/products/banner_image.png" alt="Product 1" class="w-24 h-24 rounded-lg mr-4">
                        <!-- Product Name and Category -->
                        <div>
                            <p class="text-lg font-semibold">Product 1</p>
                            <p class="text-gray-600">Category Name</p>
                        </div>
                        <!-- Price -->
                        <div>
                            <p class="text-gray-600 mr-4">Price:</p>
                            <p class="text-gray-600">$10</p>
                        </div>
                        <!-- Quantity -->
                        <div>
                            <p class="text-gray-600 mr-4">Quantity:</p>
                            <p class="text-gray-600">1</p>
                        </div>
                        <!-- Date -->
                        <div>
                            <p class="text-gray-600 mr-4">Date:</p>
                            <p class="text-gray-600">2024-04-25</p>
                        </div>
                        <!-- Order ID -->
                        <div>
                            <p class="text-gray-600 mr-4">Order ID:</p>
                            <p class="text-gray-600">1</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Order Item -->

                <!-- You can add more cart items here as needed -->
            </div>
        </div>
    </div>
    <div><?php include('../includes/footer.php');?></div>
</body>
</html>
