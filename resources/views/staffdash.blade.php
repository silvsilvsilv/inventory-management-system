<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Staff Dashboard</h1>
            <a href="/activity-log" class="text-blue-600 hover:underline">View Activity Log</a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Filter Inventory</h2>
            <form method="GET" action="#">
                <div class="flex space-x-4">
                    <select name="category" class="w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">All Categories</option>
                        <option value="Fruits">Fruits</option>
                        <option value="Vegetables">Vegetables</option>
                        <option value="Drinks">Drinks</option>
                        <option value="Snacks">Canned Goods</option>
                        <option value="Snacks">Frozen Goods</option>
                        <option value="Snacks">Poultry</option>
                        <option value="Snacks">Laundry Products</option>
                    </select>
                    <input type="text" name="filter" placeholder="Search by name" class="w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Apply</button>
                </div>
            </form>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Inventory</h2>
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="px-4 py-2">Product Name</th>
                        <th class="px-4 py-2">Category</th>
                        <th class="px-4 py-2">Quantity</th>
                        <th class="px-4 py-2">Expiry Date</th>
                        <th class="px-4 py-2">Location</th>
                        <th class="px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample Product if backend is applied-->
                    <tr class="border-b">
                        <td class="px-4 py-2">Apples</td>
                        <td class="px-4 py-2">Fruits</td>
                        <td class="px-4 py-2">
                            <input type="number" value="50" class="w-20 px-2 py-1 border border-gray-300 rounded">
                        </td>
                        <td class="px-4 py-2">2025-07-01</td>
                        <td class="px-4 py-2">Shelf A2</td>
                        <td class="px-4 py-2 space-x-2 text-center">
                            <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Update</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Expired</button>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>

