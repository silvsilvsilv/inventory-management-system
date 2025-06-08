<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #ffffff;
            color: #000000;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white shadow-sm">
        <nav class="max-w-6xl mx-auto flex items-center justify-between px-6 py-4">
            <a href="/admin" class="text-2xl font-bold text-gray-900">Admin</a>
            <ul class="hidden md:flex space-x-10 font-medium text-gray-600">
                <li><a href="/product" class="hover:text-blue-600 transition-colors duration-300">Manage Products</a></li>
                <li><a href="/categories" class="hover:text-blue-600 transition-colors duration-300">Categories</a></li>
                <li><a href="/sales" class="hover:text-blue-600 transition-colors duration-300">Sales</a></li>
                <li><a href="/users" class="hover:text-blue-600 transition-colors duration-300">Users</a></li>
                <li><a href="/audit-logs" class="hover:text-blue-600 transition-colors duration-300">Audit Logs</a></li>
            </ul>
            <button class="hidden md:inline-block bg-gray-900 text-white py-2 px-6 rounded-lg font-semibold hover:bg-gray-800 transition duration-300">
                Sign Out
            </button>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-grow max-w-6xl mx-auto px-6 py-20">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Managed Products</h1>

       <!-- Search and Add Product -->
        <div class="mb-6 flex justify-between items-center flex-col sm:flex-row gap-4">
    <!-- Search Bar -->
    <div class="relative w-full sm:w-1/2">
         <span class="material-icons absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
        search
    </span>
        <input 
            type="text" 
            placeholder="Search by product name..." 
            class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        
    </div>

    <!-- Add Product Button -->
    <button onclick="openModal('addProductModal')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        Add Product
    </button>
</div>

        <!-- Products Table -->
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="text-xs uppercase bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Category</th>
                        <th class="px-6 py-3">Price</th>
                        <th class="px-6 py-3">Stock</th>
                        <th class="px-6 py-3">Last Updated</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">Beanstock</td>
                        <td class="px-6 py-4">Prismastic</td>
                        <td class="px-6 py-4">$30</td>
                        <td class="px-6 py-4">ni balik bodega</td>
                        <td class="px-6 py-4">1999-09-03</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <button onclick="openEditModal('Beanstock', 'Prismastic', 30, 'ni balik bodega', '1999-09-03')" class="bg-blue-400 text-white px-3 py-1 rounded hover:bg-blue-500">Edit</button>
                            <button onclick="openDeleteModal('Beanstock')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">Mango</td>
                        <td class="px-6 py-4">Fruits</td>
                        <td class="px-6 py-4">$30</td>
                        <td class="px-6 py-4">ni balik bodega</td>
                        <td class="px-6 py-4">1999-09-03</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <button onclick="openEditModal('Mango', 'Fruits', 30, 'ni balik bodega', '1999-09-03')" class="bg-blue-400 text-white px-3 py-1 rounded hover:bg-blue-500">Edit</button>
                            <button onclick="openDeleteModal('Mango')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">Moon Melon</td>
                        <td class="px-6 py-4">Fruits</td>
                        <td class="px-6 py-4">$30</td>
                        <td class="px-6 py-4">ni balik bodega</td>
                        <td class="px-6 py-4">1999-09-03</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <button onclick="openEditModal('Moon Melon', 'Fruits', 30, 'ni balik bodega', '1999-09-03')" class="bg-blue-400 text-white px-3 py-1 rounded hover:bg-blue-500">Edit</button>
                            <button onclick="openDeleteModal('Moon Melon')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            <nav>
                <ul class="flex justify-center space-x-2">
                    <li><a href="#" class="px-4 py-2 border border-gray-300 rounded">1</a></li>
                    <li><a href="#" class="px-4 py-2 border border-gray-300 rounded">2</a></li>
                    <li><a href="#" class="px-4 py-2 border border-gray-300 rounded">3</a></li>
                    <li><a href="#" class="px-4 py-2 border border-gray-300 rounded">Next</a></li>
                </ul>
            </nav>
        </div>
    </main>

    <!-- Add Product Modal -->
    <div id="addProductModal" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-lg shadow-xl">
            <h3 class="text-xl font-semibold mb-4">Add New Product</h3>
            <form class="grid grid-cols-1 gap-4">
                <input type="text" placeholder="Product Name" class="border p-2 rounded" required />
                <input type="text" placeholder="Category" class="border p-2 rounded" required />
                <input type="number" placeholder="Price" class="border p-2 rounded" required />
                <input type="number" placeholder="Stock" class="border p-2 rounded" required />
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('addProductModal')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div id="editProductModal" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-lg shadow-xl">
            <h3 class="text-xl font-semibold mb-4">Edit Product</h3>
            <form class="grid grid-cols-1 gap-4">
                <input type="text" id="editProductName" placeholder="Product Name" class="border p-2 rounded" required />
                <input type="text" id="editProductCategory" placeholder="Category" class="border p-2 rounded" required />
                <input type="number" id="editProductPrice" placeholder="Price" class="border p-2 rounded" required />
                <input type="number" id="editProductStock" placeholder="Stock" class="border p-2 rounded" required />
                <textarea id="editProductDescription" placeholder="Description" class="border p-2 rounded"></textarea>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('editProductModal')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteProductModal" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-md shadow-lg">
            <h3 class="text-xl font-bold mb-4">Delete Product</h3>
            <p class="mb-6 text-gray-600">Are you sure you want to delete this product?</p>
            <div class="flex justify-end space-x-2">
                <button onclick="closeModal('deleteProductModal')" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
            </div>
        </div>
    </div>

    <!-- Modal Scripts -->
    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }
        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
        function openEditModal(name, category, price, stock, lastUpdated) {
            document.getElementById('editProductName').value = name;
            document.getElementById('editProductCategory').value = category;
            document.getElementById('editProductPrice').value = price;
            document.getElementById('editProductStock').value = stock;
            document.getElementById('editProductDescription').value = ''; // Optional: Add description if needed
            openModal('editProductModal');
        }
        function openDeleteModal(productName) {
            // Optionally, you can display the product name in the modal
            document.querySelector('#deleteProductModal p').textContent = `Are you sure you want to delete ${productName}?`;
            openModal('deleteProductModal');
        }
    </script>

</body>
</html>
