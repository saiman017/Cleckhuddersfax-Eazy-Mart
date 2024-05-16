<?php
require_once '../middlewares/check_authentication&authorization.php';

// Check if the user is logged in
checkIfLoggedIn();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../includes/style.css">
    <link rel="stylesheet" href="../includes/header.css">
    <link rel="stylesheet" href="../includes/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Profile Header */
        .profile-header {
            text-align: center;
            margin: 2rem auto;
            padding: 1rem;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1200px;
        }

        .profile-header h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #333;
            width: 100%;
        }

        .profile-header p {
            color: #666;
            margin-bottom: 1.5rem;
            width: 100%;
        }

        /* Cart Container */
        #cart {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 1rem;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin: 2rem auto;
        }

        /* Cart Items */
        .cart-items {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            width: 65%;
            margin-right: 2rem;
        }

        .cart-item {
            width: calc(50% - 1rem);
            margin-bottom: 1rem;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .cart-item:hover {
            transform: translateY(-5px);
        }

        .cart-item img {
            width: 100%;
            height: auto;
            border-radius: 10px 10px 0 0;
        }

        .cart-item-details {
            padding: 1rem;
        }

        .cart-item-name {
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .cart-item-category {
            color: #666;
            margin-bottom: 0.5rem;
        }

        .cart-item-price {
            font-weight: bold;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .cart-item-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 1rem;
            margin-top: 1rem;
        }

        .cart-item-quantity {
            width: 40%;
            height: 2rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 0.5rem;
        }

        .cart-item-delete {
            background-color: #ff4d4f;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 0.5rem 1rem;
            cursor: pointer;
        }

        /* Cart Summary */
        .cart-summary {
            width: 30%;
            background-color: #fff;
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 1rem;
        }

        .cart-summary-details {
            margin-bottom: 1rem;
        }

        .cart-summary-details h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #333;
        }

        .cart-summary-total {
            font-size: 1.25rem;
            font-weight: bold;
            margin-top: 1rem;
            color: #333;
        }

        /* Checkout Button */
        .checkout-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 0.5rem 1rem;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        .checkout-button:hover {
            background-color: #0056b3;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .cart-item {
                width: 100%;
            }

            .cart-items {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <header><?php include('../includes/head.php');?></header>

    <div id="cart" class="profile-header">
        <h1>Shopping Cart</h1>
        <p>View and manage items in your shopping cart.</p>
        <div class="cart-items">
            <!-- Cart Items -->
            <div class="cart-item">
                <img src="../assets/images/products/banner_image.png" alt="Product 1">
                <div class="cart-item-details">
                    <p class="cart-item-name">Product 1</p>
                    <p class="cart-item-category">Category Name</p>
                    <p class="cart-item-price">$10</p>
                </div>
                <div class="cart-item-actions">
                    <input type="number" class="cart-item-quantity" value="1">
                    <button class="cart-item-delete">Delete</button>
                </div>
            </div>
            <!-- Add more cart items as needed -->
        </div>
        <!-- Cart Summary -->
        <div class="cart-summary">
            <div class="cart-summary-details">
                <h2>Cart Summary</h2>
                <div class="flex justify-between mb-2">
                    <p>Subtotal:</p>
                    <p>$30</p>
                </div>
                <div class="flex justify-between mb-2">
                    <p>Discount:</p>
                    <p>$0</p>
                </div>
                <div class="flex justify-between">
                    <p>Total:</p>
                    <p>$30</p>
                </div>
            </div>
            <button class="checkout-button">Checkout</button>
        </div>

    </div>

    <div><?php include('../includes/footer.php');?></div>

</body>
</html>