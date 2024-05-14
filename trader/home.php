<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include custom CSS -->
    <link rel="stylesheet" type="text/css" href="home.css">
    
</head>

<body>
    <div class="container mx-auto py-8 px-4">
        <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Profile Header -->
            <div class="bg-gradient text-center py-8">
                <img src="https://images.unsplash.com/photo-1528698827591-e19ccd7bc23d?q=80&w=1476&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Profile Picture" class="w-32 h-32 rounded-full mx-auto border-4 profile-pic">
                <h2 class="text-header text-white mt-4">John Doe</h2>
                <p class="text-subheader text-white">Username: johndoe123</p>
            </div>
            <!-- Profile Information -->
            <div class="p-6 info-box">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Personal Information</h3>
                        <ul class="text-content text-gray-700">
                            <li><span class="font-semibold">Name:</span> John Doe</li>
                            <li><span class="font-semibold">Email:</span> johndoe@example.com</li>
                            <li><span class="font-semibold">Contact Number:</span> 123-456-7890</li>
                            <li><span class="font-semibold">Address:</span> 123 Main St, City, Country</li>
                            <li><span class="font-semibold">Date of Birth:</span> January 1, 1990</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Account Information</h3>
                        <ul class="text-content text-gray-700">
                            <li><span class="font-semibold">Username:</span> johndoe123</li>
                            <li><span class="font-semibold">Register Date:</span> January 1, 2022</li>
                            <li><span class="font-semibold">Password:</span> **********</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product CRUD View -->
    <div class="container mx-auto py-8 px-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h2 class="text-2xl font-semibold text-gray-800">Your Products</h2>
            <button id="addProductBtn" class="addbg-gradient-to-r from-purple-500 to-indigo-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-gradient bg-gradient transition duration-300">Add Product</button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 product-list">
            <!-- Product Card -->
            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1529692236671-f1f6cf9683ba?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Product Image">
                <div class="product-info p-4">
                    <h3 class="text-lg font-semibold text-gray-800">Product Name</h3>
                    <p class="text-sm text-gray-600 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p class="text-sm text-gray-600 mt-2">Price: $10</p>
                    <p class="text-sm text-gray-600 mt-2">Stock: 100</p>
                    <p class="text-sm text-gray-600 mt-2">Upload Date: January 1, 2022</p>
                </div>
                <div class="product-actions flex justify-between items-center">
                    <button class="text-xs text-gray-600 hover:text-indigo-600 transition duration-300 view-btn">View</button>
                    <button class="text-xs text-gray-600 hover:text-indigo-600 transition duration-300 edit-btn">Edit</button>
                    <button class="text-xs text-red-600 hover:text-red-700 transition duration-300">Delete</button>
                </div>
            </div>
            <!-- Repeat product cards here -->
        </div>
    </div>

    <!-- Product Modal -->
    <div id="productModal" class="modal">
        <div class="modal-content bg-white">
            <span class="close">&times;</span>
            <div id="productFormContainer"></div>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("productModal");

        // Get the button that opens the modal
        var addProductBtn = document.getElementById("addProductBtn");

        // Get the <span> element that closes the modal
        var closeBtn = document.getElementsByClassName("close")[0];

        // When the user clicks the button to add a product, show the add product form
        addProductBtn.onclick = function() {
            showAddProductForm();
        }

        // Example function to show the add product form
        function showAddProductForm() {
            var productFormContainer = document.getElementById("productFormContainer");
            productFormContainer.innerHTML = `
                <div id="productAddForm">
                    <h2 class="text-xl font-semibold mb-4">Add Product</h2>
                    <form class="space-y-4">
                        <div>
                            <label for="productName" class="block text-sm font-medium text-gray-700">Product Name</label>
                            <input type="text" name="productName" id="productName" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="productPrice" class="block text-sm font-medium text-gray-700">Price</label>
                                <input type="number" name="productPrice" id="productPrice" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                            </div>
                            <div>
                                <label for="productStock" class="block text-sm font-medium text-gray-700">Stock</label>
                                <input type="number" name="productStock" id="productStock" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="minOrder" class="block text-sm font-medium text-gray-700">Min Order</label>
                                <input type="number" name="minOrder" id="minOrder" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                            </div>
                            <div>
                                <label for="maxOrder" class="block text-sm font-medium text-gray-700">Max Order</label>
                                <input type="number" name="maxOrder" id="maxOrder" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                            </div>
                        </div>
                        <div>
                            <label for="productPhoto" class="block text-sm font-medium text-gray-700">Photo</label>
                            <input type="file" name="productPhoto" id="productPhoto" accept="image/*" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                        </div>
                        <div>
                            <label for="productDes" class="block text-sm font-medium text-gray-700">Description</label>
                            <input type="text" name="productDes" id="productDes" id="productDes" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-indigo-600 hover:bg-gradient bg-gradient text-white px-4 py-2 rounded-md shadow-md transition duration-300">Add Product</button>
                        </div>
                    </form>
                </div>
            `;
            modal.style.display = "block";
        }

        // Example event listeners for edit and view buttons
        document.querySelectorAll('.edit-btn').forEach(item => {
            item.addEventListener('click', event => {
                showEditProductForm();
            })
        });

        document.querySelectorAll('.view-btn').forEach(item => {
            item.addEventListener('click', event => {
                showViewProductForm();
            })
        });

        // Example function to show the edit product form
        function showEditProductForm() {
            var productFormContainer = document.getElementById("productFormContainer");
            productFormContainer.innerHTML = `
                <div id="productEditForm">
                    <h2 class="text-xl font-semibold mb-4">Edit Product</h2>
                    <form class="space-y-4">
                        <div>
                            <label for="productName" class="block text-sm font-medium text-gray-700">Product Name</label>
                            <input type="text" name="productName" id="productName" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="productPrice" class="block text-sm font-medium text-gray-700">Price</label>
                                <input type="number" name="productPrice" id="productPrice" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                            </div>
                            <div>
                                <label for="productStock" class="block text-sm font-medium text-gray-700">Stock</label>
                                <input type="number" name="productStock" id="productStock" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="minOrder" class="block text-sm font-medium text-gray-700">Min Order</label>
                                <input type="number" name="minOrder" id="minOrder" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                            </div>
                            <div>
                                <label for="maxOrder" class="block text-sm font-medium text-gray-700">Max Order</label>
                                <input type="number" name="maxOrder" id="maxOrder" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                            </div>
                        </div>
                        <div>
                            <label for="productPhoto" class="block text-sm font-medium text-gray-700">Photo</label>
                            <input type="file" name="productPhoto" id="productPhoto" accept="image/*" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                        </div>
                        <div>
                            <label for="productDes" class="block text-sm font-medium text-gray-700">Description</label>
                            <input type="text" name="productDes" id="productDes" id="productDes"   class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-indigo-600 hover:bg-gradient bg-gradient text-white px-4 py-2 rounded-md shadow-md transition duration-300">Save Changes</button>
                        </div>
                    </form>
                </div>
            `;
            modal.style.display = "block";
        }

        // Example function to show the view product form
       // Example function to show the view product form
function showViewProductForm(productData) {
    var productFormContainer = document.getElementById("productFormContainer");
    productFormContainer.innerHTML = `
        <div id="productViewForm">
            <h2 class="text-xl font-semibold mb-4">Product Details</h2>
            <form class="space-y-4">
                <div>
                    <label for="productName" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" name="productName" id="productName" value="${productData.name}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="productPrice" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="number" name="productPrice" id="productPrice" value="${productData.price}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                    </div>
                    <div>
                        <label for="productStock" class="block text-sm font-medium text-gray-700">Stock</label>
                        <input type="number" name="productStock" id="productStock" value="${productData.stock}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="minOrder" class="block text-sm font-medium text-gray-700">Min Order</label>
                        <input type="number" name="minOrder" id="minOrder" value="${productData.minOrder}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                    </div>
                    <div>
                        <label for="maxOrder" class="block text-sm font-medium text-gray-700">Max Order</label>
                        <input type="number" name="maxOrder" id="maxOrder" value="${productData.maxOrder}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                    </div>
                </div>
                <div>
                    <label for="productPhoto" class="block text-sm font-medium text-gray-700">Photo</label>
                    <input type="file" name="productPhoto" id="productPhoto" accept="image/*" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                </div>
                <div>
                            <label for="productDes" class="block text-sm font-medium text-gray-700">Description</label>
                            <input type="text" name="productDes" id="productDes" id="productName" value="${productData.description}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 bg-gray-100 hover:bg-gray-200">
                        </div>
            </form>
        </div>
    `;
    modal.style.display = "block";
}

        // When the user clicks on <span> (x), close the modal
        closeBtn.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        document.querySelectorAll('.view-btn').forEach(item => {
    item.addEventListener('click', event => {
        // Assuming productData is an object containing the product details
        var productData = {
            name: "Product Name",
            price: 10,
            stock: 100,
            minOrder: 1,
            maxOrder: 10,
            description:'Product Description'
            
            // Add more properties as needed
        };
        showViewProductForm(productData);
    })
});

    </script>

</body>

</html>
