
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Manager Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

  <!-- Layout Wrapper -->
  <div class="flex min-h-screen flex-col">

   
<!-- Header -->
  <header class="sticky top-0 z-50 bg-white shadow-sm backdrop-blur-sm backdrop-saturate-150">
    <nav class="max-w-[1200px] mx-auto flex items-center justify-between px-6 py-4">
      <a href="#" class="text-2xl font-bold text-black-900 select-none">Manager</a>
      <ul class="hidden md:flex space-x-10 font-medium text-gray-600">
                <li><a href="" class="hover:text-blue-600 transition-colors duration-300">Dashboard</a></li>
                <li><a href="#" onclick="openModal('addModal')" class="hover:text-blue-600 transition-colors duration-300">Add Product</a></li>
                <li><a href="" class="hover:text-blue-600 transition-colors duration-300">Inventory</a></li>
                <li><a href="" class="hover:text-blue-600 transition-colors duration-300">Sales</a></li>
               
      </ul>
      <button class="hidden md:inline-block bg-gray-900 text-white py-2 px-6 rounded-lg font-semibold hover:bg-gray-800 transition-smooth focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2">
        Sign Out
      </button>
      <button id="mobile-menu-btn" aria-label="Open menu" class="md:hidden focus:outline-none focus:ring-2 focus:ring-gray-900 rounded">
        <svg class="w-7 h-7 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
          <path d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </nav>
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md border-t border-gray-200">
      <nav class="flex flex-col px-6 py-4 space-y-4 font-semibold text-gray-700">
        <a href="/products" class="hover:text-blue-600 transition-colors duration-300">Manage Products</a>
        <a href="/categories" class="hover:text-blue-600">Categories</a></li>
        <a href="/sales" class="hover:text-blue-600 transition-colors duration-300">Sales</a>
        <a href="/users" class="hover:text-blue-600 transition-colors duration-300">Users</a>
        <button class="bg-gray-900 text-white py-2 rounded-lg hover:bg-gray-800 transition-smooth">Sign Out</button>
      </nav>
    </div>
  </header>

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
                <tr class="border-b hover:bg-gray-50">
                  <td class="py-2 px-4">Apples</td>
                  <td class="py-2 px-4">Fruits</td>
                  <td class="py-2 px-4">24</td>
                  <td class="py-2 px-4">$1.50</td>
                  <td class="py-2 px-4 text-green-600 font-semibold">In Stock</td>
                  <td class="py-2 px-4">
                    <button onclick="openModal('deleteModal')" class="text-red-600 hover:underline">Delete</button>
                  </td>
                </tr>
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
      <form class="grid grid-cols-1 gap-4">
        <input type="text" placeholder="Product Name" class="border p-2 rounded" />
        <input type="number" placeholder="Quantity" class="border p-2 rounded" />
        <input type="text" placeholder="Category" class="border p-2 rounded" />
        <input type="number" placeholder="Price" class="border p-2 rounded" />
        <textarea placeholder="Description" class="border p-2 rounded"></textarea>
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
    function logout() {
      // Implement logout functionality here
      alert('Logging out...');
    }
  </script>

</body>
</html>