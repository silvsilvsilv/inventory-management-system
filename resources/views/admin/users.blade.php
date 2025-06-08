<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - InventorySys</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
    </header>

    <!-- Main Content -->
    <main class="flex-grow max-w-6xl mx-auto px-6 py-20">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Managed Users</h1>

        <!-- Search Bar -->
        <div class="mb-4 relative">
             <span class="material-icons absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
        search
    </span>
            <input type="text" placeholder="Search by name or email" class="border border-gray-300 rounded-lg px-10 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" />
            
        </div>

        <!-- Users Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Password</th>
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
                        <td class="px-4 py-2">2024-01-01</td>
                        <td class="px-4 py-2">2024-01-15</td>
                        <td class="px-4 py-2">Admin</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <button onclick="openEditModal('John Doe', 'john.doe@example.com', '********', '2024-01-01', '2024-01-15', 'Admin')" class="bg-blue-400 text-white px-3 py-1 rounded hover:bg-blue-500">Edit</button>
                            <button onclick="openDeleteModal('John Doe')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2">2</td>
                        <td class="px-4 py-2">Jane Smith</td>
                        <td class="px-4 py-2">jane.smith@example.com</td>
                        <td class="px-4 py-2">********</td>
                        <td class="px-4 py-2">2024-01-05</td>
                        <td class="px-4 py-2">2024-01-20</td>
                        <td class="px-4 py-2">Manager</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <button onclick="openEditModal('Jane Smith', 'jane.smith@example.com', '********', '2024-01-05', '2024-01-20', 'Manager')" class="bg-blue-400 text-white px-3 py-1 rounded hover:bg-blue-500">Edit</button>
                            <button onclick="openDeleteModal('Jane Smith')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
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

    <!-- Edit User Modal -->
    <div id="editUser Modal" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-lg shadow-xl">
            <h3 class="text-xl font-semibold mb-4">Edit User</h3>
            <form class="grid grid-cols-1 gap-4">
                <input type="text" id="editUser Name" placeholder="Name" class="border p-2 rounded" required />
                <input type="email" id="editUser Email" placeholder="Email" class="border p-2 rounded" required />
                <input type="password" id="editUser Password" placeholder="Password" class="border p-2 rounded" />
                <input type="text" id="editUser Role" placeholder="Role" class="border p-2 rounded" required />
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('editUser Modal')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete User Confirmation Modal -->
    <div id="deleteUser Modal" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-md shadow-lg">
            <h3 class="text-xl font-bold mb-4">Delete User</h3>
            <p class="mb-6 text-gray-600" id="deleteUser Message">Are you sure you want to delete this user?</p>
            <div class="flex justify-end space-x-2">
                <button onclick="closeModal('deleteUser Modal')" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                <button id="confirmDeleteButton" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
            </div>
        </div>
    </div>

    <!-- Modal Scripts -->
    <script>
        let userToDelete = '';

        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }

        function openEditModal(name, email, password, createdAt, updatedAt, role) {
            document.getElementById('editUser Name').value = name;
            document.getElementById('editUser Email').value = email;
            document.getElementById('editUser Password').value = password; // Optional: Add password if needed
            document.getElementById('editUser Role').value = role;
            openModal('editUser Modal');
        }

        function openDeleteModal(userName) {
            userToDelete = userName; // Store the user name to be deleted
            document.getElementById('deleteUser Message').textContent = `Are you sure you want to delete ${userName}?`;
            openModal('deleteUser Modal');
        }

        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            // Perform the delete action here
            console.log(`User  ${userToDelete} deleted`); // Replace with actual delete logic
            closeModal('deleteUser Modal');
        });
    </script>

</body>
</html>