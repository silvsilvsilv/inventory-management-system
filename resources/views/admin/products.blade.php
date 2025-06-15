<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
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
    @include('partials.header')

    <!-- Main Content -->
    <main class="flex-grow max-w-6xl mx-auto px-6 py-20">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Managed Products</h1>

        <!-- Search and Add Category -->
        <form method="GET" action="{{ route('admin.products') }}" class="mb-4 flex items-center">
            <div class="relative flex-1">
                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none">
                    <!-- Heroicons Magnifying Glass SVG -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                    </svg>
                </span>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name"
                    class="border border-gray-300 rounded-lg px-10 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
            <button type="submit"
                class="ml-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center justify-center"
                aria-label="Search">
                <!-- Heroicons Magnifying Glass SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                </svg>
            </button>
            <button type="button"
                class="ml-2 bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 whitespace-nowrap"
                id="createCategory" onclick="openModal('addProductModal')">
                Add New Product
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block ml-2" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </button>
        </form>

        <!-- Products Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class=" bg-blue-100">
                    <tr>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Category</th>
                        <th class="px-4 py-2 text-left">Price</th>
                        <th class="px-4 py-2 text-left">Stock</th>
                        <th class="px-4 py-2 text-left">Last Updated</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($products as $product)
                        @if($product->deleted_at === null)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-2">{{ $product->name }}</td>
                                <td class="px-4 py-2">{{ $product->category->name ?? 'N/A' }}</td>
                                <td class="px-4 py-2">${{ number_format($product->price, 2) }}</td>
                                <td class="px-4 py-2">{{ $product->stock }}</td>
                                <td class="px-4 py-2">{{ $product->updated_at->format('F d, Y h:i a') }}</td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <button onclick="openEditModal(
                                                                    '{{ $product->id }}',
                                                                    '{{ addslashes($product->name) }}', 
                                                                    '{{ addslashes($product->category->name) }}', 
                                                                    '{{ $product->price }}', 
                                                                    '{{ $product->stock }}'
                                                                )"
                                        class="bg-blue-400 text-white px-3 py-1 rounded hover:bg-blue-500">Add Stock</button>
                                    <button onclick="openDeleteModal('{{ $product->id }}','{{ addslashes($product->name) }}')"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </main>

    <!-- Add Product Modal -->
    <div id="addProductModal" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-lg shadow-xl">
            <h3 class="text-xl font-semibold mb-4">Add New Product</h3>
            <form class="grid grid-cols-1 gap-4" action="{{ route('admin.create_product') }}" method="POST">
                @csrf
                @method('POST')
                <input type="text" placeholder="Product Name" class="border p-2 rounded" required name="name" />
                <select name="category_id" class="border p-2 rounded" required name="category_id">
                    <option value="" disabled>Select Category</option>
                    @foreach($categories as $category)
                        @if($category->deleted_at == null) 
                            <option value="{{ $category->id }}" class="capitalize">{{ $category->name }}</option>                        
                        @endif
                    @endforeach
                </select>
                <input type="number" placeholder="Price" class="border p-2 rounded" required name="price" />
                <input type="number" placeholder="Stock" class="border p-2 rounded" required name="stock" />
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('addProductModal')"
                        class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div id="editProductModal"
        class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-lg shadow-xl">
            <h3 class="text-xl font-semibold mb-4">Add Stock</h3>
            <form class="grid grid-cols-1 gap-4" action="{{ route('admin.edit_product') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="editProductId" name="id" value="" />
                <input type="hidden" id="editProductName" placeholder="Product Name" class="border p-2 rounded" required
                    name="name" />
                <select id="editProductCategory" name="category_id" class="border p-2 rounded hidden" required
                    name="category_id">
                    <option value="" disabled>Select Category</option>
                    @foreach($categories as $category)
                        @if($category->deleted_at == null) 
                            <option value="{{ $category->id }}" class="capitalize">{{ $category->name }}</option>                        
                        @endif
                    @endforeach
                </select>
                <input type="hidden" id="editProductPrice" placeholder="Price" class="border p-2 rounded" required
                    name="price" />
                <input type="number" id="editProductStock" placeholder="Stock" class="border p-2 rounded" required
                    name="stock" />
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('editProductModal')"
                        class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteProductModal"
        class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-md shadow-lg">
            <h3 class="text-xl font-bold mb-4">Delete Product</h3>
            <p class="mb-6 text-gray-600">Are you sure you want to delete this product?</p>
            <form action="{{ route('admin.delete_product') }}" method="POST" class="grid grid-cols-1 gap-4">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" id="deleteProductId" value="">
                <div class="flex justify-end space-x-2">
                    <button onclick="closeModal('deleteProductModal')"
                        class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                    <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
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
        function openEditModal(id, name, category, price, stock) {
            document.getElementById('editProductId').value = id;
            document.getElementById('editProductName').value = name;
            document.getElementById('editProductPrice').value = price;
            document.getElementById('editProductStock').value = stock;

            const categorySelect = document.getElementById('editProductCategory');
            for (let i = 0; i < categorySelect.options.length; i++) {
                if (categorySelect.options[i].value.toLowerCase() === category.toLowerCase()) {
                    categorySelect.selectedIndex = i;
                    break;
                }
            }
            openModal('editProductModal');
        }
        function openDeleteModal(id, productName) {
            document.getElementById('deleteProductId').value = id;
            document.querySelector('#deleteProductModal p').innerHTML = `Are you sure you want to delete <strong>${productName}</strong>?`;
            openModal('deleteProductModal');
        }
    </script>

</body>

</html>