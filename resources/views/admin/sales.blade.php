<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-gray-50">

    @include('partials.header');

    <!-- Main Content -->
   <main class="flex-grow max-w-6xl mx-auto px-6 py-20">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Sales Report</h1>


        <!-- Sales Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="px-4 py-2 text-left">Product Name</th>
                        <th class="px-4 py-2 text-left">Staff Name</th>
                        <th class="px-4 py-2 text-left">Quantity</th>
                        <th class="px-4 py-2 text-left">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-2">Product A</td>
                        <td class="px-4 py-2">John Doe</td>
                        <td class="px-4 py-2">5</td>
                        <td class="px-4 py-2">$50.00</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2">Product B</td>
                        <td class="px-4 py-2">Jane Smith</td>
                        <td class="px-4 py-2">3</td>
                        <td class="px-4 py-2">$30.00</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2">Product C</td>
                        <td class="px-4 py-2">Alice Johnson</td>
                        <td class="px-4 py-2">10</td>
                        <td class="px-4 py-2">$100.00</td>
                    </tr>
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
</body>
</html>
