<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Log</title>
    <script src="https://cdn.tailwindcss.com"></script>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Activity Log</h1>
            <a href="/staff" class="text-blue-600 hover:underline">Back to Dashboard</a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Recent Actions</h2>
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="px-4 py-2">Timestamp</th>
                        <th class="px-4 py-2">User</th>
                        <th class="px-4 py-2">Action</th>
                        <th class="px-4 py-2">Details</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <!-- Sample Log if backend is applied-->
                    <tr class="border-b">
                        <td class="px-4 py-2">2025-06-09 09:15</td>
                        <td class="px-4 py-2">John (Staff)</td>
                        <td class="px-4 py-2">Updated Quantity</td>
                        <td class="px-4 py-2">"Apples" changed from 50 to 60</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2">2025-06-09 10:45</td>
                        <td class="px-4 py-2">Jane (Staff)</td>
                        <td class="px-4 py-2">Flagged Expired</td>
                        <td class="px-4 py-2">"Milk" flagged as expired</td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
