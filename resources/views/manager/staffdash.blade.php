<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
</style>

<body class="bg-gray-100 min-h-screen">
    @include('partials.errors')
    @include('partials.manager_header')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Staff Dashboard</h1>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Filter Inventory</h2>
            <form method="GET" action="{{ route('manager.staff') }}">
                <div class="flex space-x-4">
                    <select name="category"
                        class="w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->name }}" {{ request('category') == $category->name ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <input type="text" name="filter" placeholder="Search by name"
                        class="w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Apply</button>
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
                        <th class="px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($inventory as $item)
                        @if($item->deleted_at === null)
                            <tr class="border-b">
                                <form method="POST" action="{{ route('manager.update_quantity') }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                                    <td class="px-4 py-2">{{ $item->name }}</td>
                                    <td class="px-4 py-2">{{ $item->category->name }}</td>
                                    <td class="px-4 py-2">
                                        <input type="number" id="quantity-{{ $item->id }}" value="{{ $item->stock }}"
                                            class="w-20 px-2 py-1 border border-gray-300 rounded" 
                                            name="quantity" 
                                            oninput="quantityChange(this, '{{ $item->stock }}')" 
                                            min="{{ $item->stock }}">
                                    </td>
                                    <td class="px-4 py-2 space-x-2 text-center">
                                        <button type="submit"
                                            class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Update</button>
                                    </td>
                                </form>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
<script>
    function quantityChange(input, minValue){
        if (parseInt(input.value) < minValue) {
            input.value = minValue;
        }
    }
</script>
</html>