
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Manager Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
  body {
    font-family: 'Poppins', sans-serif;
  }
</style>
<body class="bg-gray-100 text-gray-800">

  <!-- Layout Wrapper -->
  <div class="flex min-h-screen flex-col">
  @include('partials.errors')
  @include('partials.manager_header')

      <!-- Main Content -->
      <main class="flex-1 p-8">
        <!-- Inventory Overview -->
        <section class="bg-white p-6 rounded-xl shadow">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Inventory Overview</h2>
            <button onclick="openModal('addModal')" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">+ Add Product</button>
          </div>
          <div class="overflow-auto">
            <table class="min-w-full text-left text-sm">
              <thead>
                <tr class="text-gray-600 border-b">
                  <th class="py-2 px-4">Product</th>
                  <th class="py-2 px-4">Category</th>
                  <th class="py-2 px-4">Stock</th>
                  <th class="py-2 px-4">Price</th>
                  <th class="py-2 px-4">Status</th>
                  <th class="py-2 px-4">Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($products as $product )
                  <tr class="border-b hover:bg-gray-50">
                    <td class="py-2 px-4">{{ $product->name }}</td>
                    <td class="py-2 px-4">{{ $product->category->name }}</td>
                    <td class="py-2 px-4">{{ $product->stock }}</td>
                    <td class="py-2 px-4">${{ $product->price }}</td>
                    @if ($product->stock > 0)
                      <td class="py-2 px-4 text-green-600 font-semibold">In Stock</td>
                    @else
                      <td class="py-2 px-4 text-red-600 font-semibold">Out of Stock</td>
                    @endif
                    <td class="py-2 px-4">
                      <button onclick="openModal('deleteModal')" class="text-red-600 hover:underline">Delete</button>
                    </td>
                  </tr>

                @empty
                  <tr>
                    <td colspan="6" class="text-center py-4 text-gray-500">No products found.</td>
                  </tr>
                @endforelse

                <!-- More rows can be added here -->
              </tbody>
            </table>
          </div>
        </section>
      </main>
    </div>
  </div>

  <!-- Add Product Modal -->
  <div id="addModal" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center hidden z-50">
    <div class="bg-white p-6 rounded-lg w-full max-w-lg shadow-xl">
      <h3 class="text-xl font-semibold mb-4">Add New Product</h3>
      <form class="grid grid-cols-1 gap-4" action="{{ route('manager.add_product') }}" method="POST">
        @csrf
        @method('POST')
        <input type="text" placeholder="Product Name" class="border p-2 rounded" name="name" />
        <input type="number" placeholder="Quantity" class="border p-2 rounded" name="stock"/>
        <select name="category_id" class="border p-2 rounded">
          <option value="" disabled>All Categories</option>
            @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ request('category') == $category->name ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
        </select>
        <input type="number" placeholder="Price" class="border p-2 rounded" name="price"/>
        <div class="flex justify-end space-x-2">
          <button type="button" onclick="closeModal('addModal')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Delete Confirmation Modal -->
  <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center hidden z-50">
    <div class="bg-white p-6 rounded-lg w-full max-w-md shadow-lg">
      <h3 class="text-xl font-bold mb-4">Delete Product</h3>
      <p class="mb-6 text-gray-600">Are you sure you want to delete this product?</p>
      <div class="flex justify-end space-x-2">
        <button onclick="closeModal('deleteModal')" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
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
	</script>

</body>
</html>