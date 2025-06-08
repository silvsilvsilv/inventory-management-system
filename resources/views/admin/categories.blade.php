
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            <a href="/categories" class="text-2xl font-bold text-gray-900">Admin</a>
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
        <h1 class="text-3xl font-bold mb-6">Manage Categories</h1>

        <!-- Search Bar -->
        <div class="mb-4">
            <input type="text" placeholder="Search by name or ID" class="border border-gray-300 rounded-lg px-4 py-2 w-full" />
        </div>

        <!-- Add Category Button -->
        <a href="/categories/create" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Add Category</a>

        <!-- Category Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Created</th>
                        <th class="px-4 py-2">Updated</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-2">1</td>
                        <td class="px-4 py-2">Electronics</td>
                        <td class="px-4 py-2">Devices and gadgets</td>
                        <td class="px-4 py-2">2024-01-01</td>
                        <td class="px-4 py-2">2024-01-15</td>
                        <td class="px-4 py-2">
                            <a href="/categories/edit/1" class="text-blue-600 hover:underline">Edit</a>
                            <form action="/categories/1" method="POST" class="inline">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="text-red-600 hover:underline ml-4" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2">2</td>
                        <td class="px-4 py-2">Apparel</td>
                        <td class="px-4 py-2">Clothing and accessories</td>
                        <td class="px-4 py-2">2024-01-05</td>
                        <td class="px-4 py-2">2024-01-20</td>
                        <td class="px-4 py-2">
                            <a href="/categories/edit/2" class="text-blue-600 hover:underline">Edit</a>
                            <form action="/categories/2" method="POST" class="inline">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="text-red-600 hover:underline ml-4" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <!-- Repeat for other categories -->
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

    <!-- Footer -->
    <footer class="bg-gray-50 border-t border-gray-200 py-12">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center text-gray-500 text-sm font-medium space-y-4 md:space-y-0">
            <p>&copy; 2024 InventorySys. All rights reserved.</p>
            <nav class="space-x-6">
                <a href="#" class="hover:text-gray-900 transition-colors duration-300">Privacy Policy</a>
                <a href="#" class="hover:text-gray-900 transition-colors duration-300">Terms of Service</a>
                <a href="#" class="hover:text-gray-900 transition-colors duration-300">Contact</a>
            </nav>
        </div>
    </footer>

</body>
</html>