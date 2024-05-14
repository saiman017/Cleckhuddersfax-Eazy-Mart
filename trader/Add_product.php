<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
    <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $productName = $_POST['productName'];
    // Retrieve more form fields as needed
    
    // Perform database operations or any other backend logic here
    
    // Redirect back to the main page or show a success message
    header("Location: index.php"); // Change "index.php" to your main page
    exit();
}
?>

    <div class="container mx-auto py-8 px-4 " id="add-product">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
            <a href="../index.php" class="logo-link"><img src="../assets/images/icons/logo.png" alt="" class="logo"></a>
                <h2 class="text-2xl font-bold mb-4">Add Product</h2>
                <form action="process_product.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <!-- Product form fields -->
                    <!-- Example: -->
                    <div>
                        <label for="productName" class="block text-sm font-medium text-gray-700">Product Name</label>
                        <input type="text" name="productName" id="productName" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                    </div>
                    <div>
                        <label for="productPrice" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="number" name="productPrice" id="productPrice" value="${productData.price}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                    </div>
                    <div>
                        <label for="productStock" class="block text-sm font-medium text-gray-700">Stock</label>
                        <input type="number" name="productStock" id="productStock" value="${productData.stock}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                    </div>
                    <div>
                        <label for="minOrder" class="block text-sm font-medium text-gray-700">Min Order</label>
                        <input type="number" name="minOrder" id="minOrder" value="${productData.minOrder}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                    </div>
                    <div>
                        <label for="maxOrder" class="block text-sm font-medium text-gray-700">Max Order</label>
                        <input type="number" name="maxOrder" id="maxOrder" value="${productData.maxOrder}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                    </div>
                    <div>
                    <label for="productPhoto" class="block text-sm font-medium text-gray-700">Photo</label>
                    <input type="file" name="productPhoto" id="productPhoto" accept="image/*" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                    </div>
                    <div>
                        <label for="productDes" class="block text-sm font-medium text-gray-700">Description</label>
                        <input type="text" name="productDes" id="productDes" id="productName"  class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-indigo-600 hover:bg-gradient bg-gradient text-white px-4 py-2 rounded-md shadow-md transition duration-300">Add Product</button>
                    </div>
                   
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>
