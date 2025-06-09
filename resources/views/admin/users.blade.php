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
    @include('partials.errors')
    @include('partials.header')

    <!-- Main Content -->
    <main class="flex-grow max-w-6xl mx-auto px-6 py-20">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">User Management</h1>

        <!-- Search Bar -->
        <form method="GET" action="{{ route('admin.users') }}" class="mb-4 flex items-center">
            <div class="relative flex-1">
                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none">
                    <!-- Heroicons Magnifying Glass SVG -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                    </svg>
                </span>
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by name or email"
                    class="border border-gray-300 rounded-lg px-10 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            <button type="submit" class="ml-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center justify-center" aria-label="Search">
                <!-- Heroicons Magnifying Glass SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                </svg>
            </button>
            <button type="button" class="ml-2 bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 whitespace-nowrap" id="createUser">
                Create User
            </button>
        </form>

        <!-- Users Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Role</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $user->id }}</td>
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            <td class="px-4 py-2 capitalize">{{ $user->role }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                <button onclick="openEditModal('{{ addslashes($user->id) }}','{{ addslashes($user->name) }}', '{{ addslashes($user->email) }}', '{{ addslashes($user->role) }}')" class="bg-blue-400 text-white px-3 py-1 rounded hover:bg-blue-500">Edit</button>
                                <button onclick="openDeleteModal('{{ addslashes($user->id) }}','{{ addslashes($user->name) }}')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $users->links() }}
        </div>

    </main>

    <!-- Create User Modal -->
    <div id="createUserModal" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-lg shadow-xl">
            <h3 class="text-xl font-semibold mb-4">Create User</h3>
            <form class="grid grid-cols-1 gap-4" action="{{ route('admin.create_user') }}" method="POST">
                @csrf
                <input type="text" id="createUserName" placeholder="Name" class="border p-2 rounded" name="name" required />
                <input type="email" id="createUserEmail" placeholder="Email" class="border p-2 rounded" name="email" required />
                <input type="password" id="createUserPassword" placeholder="Password" class="border p-2 rounded" name="password" required />
                <input type="password" id="createUserPassword" placeholder="Password" class="border p-2 rounded" name="password_confirmation" required />
                <select id="createUserRole" class="border p-2 rounded" name="role" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                </select>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('createUserModal')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Create</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div id="editUser Modal" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-lg shadow-xl">
            <h3 class="text-xl font-semibold mb-4">Edit User</h3>
            <form class="grid grid-cols-1 gap-4" method="POST" action="{{ route('admin.update_user') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="editUserId" value="">
                <input type="text" id="editUser Name" placeholder="Name" class="border p-2 rounded" required name="name"/>
                <input type="email" id="editUser Email" placeholder="Email" class="border p-2 rounded" required name="email"/>
                <select id="editUser Role" class="border p-2 rounded" required name="role">
                    <option value="" disabled>Select Role</option>
                    <option value="admin" class="capitalize">Admin</option>
                    <option value="manager" class="capitalize">Manager</option>
                </select>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('editUser Modal')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete User Confirmation Modal -->
    <div id="deleteUser Modal" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-md shadow-lg">
            <h3 class="text-xl font-bold mb-4">Delete User</h3>
            <form id="deleteUserForm" method="POST" action="{{ route('admin.delete_user') }}">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" id="deleteUserId" value="">
                <p class="mb-6 text-gray-600" id="deleteUser Message">Are you sure you want to delete this user?</p>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('deleteUser Modal')" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                    <button type="submit" id="confirmDeleteButton" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
                </div>
            </form>
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

        function openEditModal(id, name, email, role) {
            document.getElementById('editUserId').value = id;
            document.getElementById('editUser Name').value = name;
            document.getElementById('editUser Email').value = email;
            // Normalize role value to lowercase for comparison
            const roleSelect = document.getElementById('editUser Role');
            for (let i = 0; i < roleSelect.options.length; i++) {
                if (roleSelect.options[i].value.toLowerCase() === role.toLowerCase()) {
                    roleSelect.selectedIndex = i;
                    break;
                }
            }
            openModal('editUser Modal');
        }

        function openDeleteModal(id,userName) {
            document.getElementById('deleteUserId').value = id;
            document.getElementById('deleteUser Message').innerHTML = `Are you sure you want to delete <strong>${userName}</strong>?`;
            openModal('deleteUser Modal');
        }

        // Open Create User Modal on button click
        document.getElementById('createUser').addEventListener('click', function() {
            openModal('createUserModal');
        });

        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            // Perform the delete action here
            console.log(`User  ${userToDelete} deleted`);
            closeModal('deleteUser Modal');
        });
    </script>

</body>
</html>