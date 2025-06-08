<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audit Logs</title>
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
            <a href="/audit-logs" class="text-2xl font-bold text-gray-900">Admin</a>
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
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Audit Logs</h1>

        <!-- Search Bar -->
        <div class="mb-6 flex justify-between items-center flex-col sm:flex-row gap-4">
            <input 
                type="text" 
                placeholder="Search by user ID or action..." 
                class="border border-gray-300 rounded-lg px-4 py-2 w-full sm:w-1/3 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
            <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Search</button>
        </div>

        <!-- Audit Logs Table -->
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="text-xs uppercase bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-6 py-3">User name</th>
                        <th class="px-6 py-3">Record ID</th>
                        <th class="px-6 py-3">Action</th>
                        <th class="px-6 py-3">Timestamp</th>
                        <th class="px-6 py-3">Details</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">chen</td>
                        <td class="px-6 py-4">101</td>
                        <td class="px-6 py-4">Login</td>
                        <td class="px-6 py-4">2024-01-15 08:30:00</td>
                        <td class="px-6 py-4">User logged in successfully.</td>
                        <td class="px-6 py-4 flex space-x-2">
                             <button class="bg-blue-400 text-white px-3 py-1 rounded hover:bg-blue-500">Edit</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">lolo</td>
                        <td class="px-6 py-4">102</td>
                        <td class="px-6 py-4">Logout</td>
                        <td class="px-6 py-4">2024-01-15 09:00:00</td>
                        <td class="px-6 py-4">User logged out successfully.</td>
                        <td class="px-6 py-4 flex space-x-2">
                           <button class="bg-blue-400 text-white px-3 py-1 rounded hover:bg-blue-500">Edit</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">hatdog</td>
                        <td class="px-6 py-4">103</td>
                        <td class="px-6 py-4">Update Product</td>
                        <td class="px-6 py-4">2024-01-15 10:15:00</td>
                        <td class="px-6 py-4">User updated product ID 5.</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <button class="bg-blue-400 text-white px-3 py-1 rounded hover:bg-blue-500">Edit</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            <nav class="inline-flex space-x-2">
                <a href="#" class="px-4 py-2 bg-white border border-gray-300 rounded hover:bg-gray-100">1</a>
                <a href="#" class="px-4 py-2 bg-white border border-gray-300 rounded hover:bg-gray-100">2</a>
                <a href="#" class="px-4 py-2 bg-white border border-gray-300 rounded hover:bg-gray-100">3</a>
                <a href="#" class="px-4 py-2 bg-white border border-gray-300 rounded hover:bg-gray-100">Next</a>
            </nav>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-50 border-t border-gray-200 py-12 mt-10">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center text-gray-500 text-sm font-medium space-y-4 md:space-y-0">
            <p>&copy; 2025 InventorySys. All rights reserved.</p>
            <nav class="space-x-6">
                <a href="#" class="hover:text-gray-900 transition-colors duration-300">Privacy Policy</a>
                <a href="#" class="hover:text-gray-900 transition-colors duration-300">Terms of Service</a>
                <a href="#" class="hover:text-gray-900 transition-colors duration-300">Contact</a>
            </nav>
        </div>
    </footer>

</body>
</html>
