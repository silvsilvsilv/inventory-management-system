<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-gray-50">

    @include('partials.header')

    <!-- Main Content -->
   <main class="flex-grow max-w-6xl mx-auto px-6 py-20">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Sales Report</h1>


        <!-- Sales Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="px-4 py-2 text-left">Product Name</th>
                        <th class="px-4 py-2 text-left">Customer Name</th>
                        <th class="px-4 py-2 text-left">Staff Name</th>
                        <th class="px-4 py-2 text-left">Quantity</th>
                        <th class="px-4 py-2 text-left">Price</th>
                        <th class="px-4 py-2 text-left">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale )
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $sale->product->name  }}</td>
                            <td class="px-4 py-2">{{ $sale->customer_name }}</td>
                            <td class="px-4 py-2">{{ $sale->user->name }}</td>
                            <td class="px-4 py-2">{{ $sale->quantity }}</td>
                            <td class="px-4 py-2">${{$sale->product->price}}</td>
                            <td class="px-4 py-2">${{ $sale->quantity * $sale->product->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $sales->links() }}
        </div>
    </main>
</body>
</html>
