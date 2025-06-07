<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - InventorySys</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-gray-50">

    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white shadow-md">
        <nav class="max-w-6xl mx-auto flex items-center justify-between px-6 py-4">
            <a href="/users" class="text-2xl font-bold text-black-600">Admin</a>
            <div class="md:hidden">
                <button id="mobile-menu-btn" class="text-gray-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
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
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md">
            <ul class="flex flex-col px-6 py-4 space-y-2 font-medium text-gray-600">
                <li><a href="/products" class="hover:text-blue-600 transition-colors duration-300">Manage Products</a></li>
                <li><a href="/inventory" class="hover:text-blue-600 transition-colors duration-300">Inventory</a></li>
                <li><a href="/sales" class="hover:text-blue-600 transition-colors duration-300">Sales</a></li>
                <li><a href="/categories" class="hover:text-blue-600 transition-colors duration-300">Categories</a></li>
                <li><a href="/audit-logs" class="hover:text-blue-600 transition-colors duration-300">Audit Logs</a></li>
                <li><a href="/users" class="hover:text-blue-600 transition-colors duration-300">Users</a></li>
            </ul>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow max-w-6xl mx-auto px-6 py-20">
        <h1 class="text-3xl font-bold mb-6 text-black-600">Manage Users</h1>

        <!-- Search Bar -->
        <div class="mb-4">
            <input type="text" placeholder="Search by name or email" class="border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <!-- Add User Button -->
        <a href="/users/create" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-500 transition duration-300">Add User</a>

        <!-- Users Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Password</th>
                        <th class="px-4 py-2 text-left">Remember Token</th>
                        <th class="px-4 py-2 text-left">Created At</th>
                        <th class="px-4 py-2 text-left">Updated At</th>
                        <th class="px-4 py-2 text-left">Role</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-2">1</td>
                        <td class="px-4 py-2">John Doe</td>
                        <td class="px-4 py-2">john.doe@example.com</td>
                        <td class="px-4 py-2">********</td>
                        <td class="px-4 py-2">abc123token</td>
                        <td class="px-4 py-2">2024-01-01</td>
                        <td class="px-4 py-2">2024-01-15</td>
                        <td class="px-4 py-2">Admin</td>
                        <td class="px-4 py-2">
                            <a href="/users/edit/1" class="text-blue-600 hover:underline">Edit</a>
                            <form action="/users/1" method="POST" class="inline">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="text-red-600 hover:underline ml-4" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2">2</td>
                        <td class="px-4 py-2">Jane Smith</td>
                        <td class="px-4 py-2">jane.smith@example.com</td>
                        <td class="px-4 py-2">********</td>
                        <td class="px-4 py-2">xyz456token</td>
                        <td class="px-4 py-2">2024-01-05</td>
                        <td class="px-4 py-2">2024-01-20</td>
                        <td class="px-4 py-2">Manager</td>
                        <td class="px-4 py-2">
                            <a href="/users/edit/2" class="text-blue-600 hover:underline">Edit</a>
                            <form action="/users/2" method="POST" class="inline">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="text-red-600 hover:underline ml-4" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <!-- Repeat for other users -->
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
    <footer class="bg-gray-100 border-t border-gray-200 py-12">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center text-gray-500 text-sm font-medium space-y-4 md:space-y-0">
            <p>&copy; 2025 InventorySys. All rights reserved.</p>
            <nav class="space-x-6">
                <a href="#" class="hover:text-blue-600 transition-colors duration-300">Privacy Policy</a>
                <a href="#" class="hover:text-blue-600 transition-colors duration-300">Terms of Service</a>
                <a href="#" class="hover:text-blue-600 transition-colors duration-300">Contact</a>
            </nav>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

</body>
</html>
