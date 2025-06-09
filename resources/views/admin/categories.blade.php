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
    @include('partials.errors')
    @include('partials.header');

    <!-- Main Content -->
   <main class="flex-grow max-w-6xl mx-auto px-6 py-20">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Manage Categories</h1>

        <!-- Search and Add Category -->
        <form method="GET" action="{{ route('admin.categories') }}" class="mb-4 flex items-center">
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
                    placeholder="Search by name"
                    class="border border-gray-300 rounded-lg px-10 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            <button type="submit" class="ml-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center justify-center" aria-label="Search">
                <!-- Heroicons Magnifying Glass SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                </svg>
            </button>
            <button type="button" class="ml-2 bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 whitespace-nowrap" id="createCategory" onclick="openModal('addCategoryModal')">
                Add New Category
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </button>
        </form>

        <!-- Category Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Description</th>
                        <th class="px-4 py-2 text-left">Created</th>
                        <th class="px-4 py-2 text-left">Updated</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $category->id }}</td>
                            <td class="px-4 py-2">{{ $category->name }}</td>
                            <td class="px-4 py-2">{{ $category->description }}</td>
                            <td class="px-4 py-2">{{ $category->created_at->format('F d, Y') }}</td>
                            <td class="px-4 py-2">{{ $category->updated_at->format('F d, Y') }}</td>
                            <td class="px-4 py-2">
                                <button 
                                    onclick="openEditModal('{{addslashes($category->id) }}','{{ addslashes($category->name) }}', '{{ addslashes($category->description) }}')" 
                                    class="bg-blue-400 text-white px-3 py-1 rounded hover:bg-blue-500">
                                    Edit
                                </button>
                                <button 
                                    onclick="openDeleteModal('{{ addslashes($category->id) }}','{{ addslashes($category->name) }}')" 
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </main>

    <!-- Add Category Modal -->
    <div id="addCategoryModal" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-lg shadow-xl">
            <h3 class="text-xl font-semibold mb-4">Add New Category</h3>
            <form class="grid grid-cols-1 gap-4" action="{{ route('admin.create_category') }}" method="POST">
                @csrf
                @method('POST')
                <input type="text" placeholder="Category Name" class="border p-2 rounded" required name="name"/>
                <textarea placeholder="Description" class="border p-2 rounded" rows="5" cols="5" name="description"></textarea>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('addCategoryModal')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Add</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div id="editCategoryModal" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-lg shadow-xl">
            <h3 class="text-xl font-semibold mb-4">Edit Category</h3>
            <form class="grid grid-cols-1 gap-4" action="{{ route('admin.edit_category') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="editCategoryId" name="id" value=""/>
                <input type="text" id="editCategoryName" placeholder="Category Name" class="border p-2 rounded" required name="name"/>
                <textarea type="text" id="editCategoryDescription" placeholder="Description" class="border p-2 rounded" rows="5" cols="5" name="description"></textarea>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('editCategoryModal')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteCategoryModal" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-md shadow-lg">
            <h3 class="text-xl font-bold mb-4">Delete Category</h3>
            <p class="mb-6 text-gray-600">Are you sure you want to delete this category?</p>
            <form action="{{ route('admin.delete_category') }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" id="deleteCategoryName" value=""/>
                <div class="flex justify-end space-x-2">
                    <button onclick="closeModal('deleteCategoryModal')" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
                </div>
            </form>
            
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
        function openEditModal(id, name, description) {
            document.getElementById('editCategoryId').value = id;
            document.getElementById('editCategoryName').value = name;
            document.getElementById('editCategoryDescription').value = description;
            openModal('editCategoryModal');
        }
        function openDeleteModal(id,categoryName) {
            document.getElementById('deleteCategoryName').value = id;
            document.querySelector('#deleteCategoryModal p').innerHTML = `Are you sure you want to delete <strong>${categoryName}</strong>?`;
            openModal('deleteCategoryModal');
        }
    </script>

</body>
</html>