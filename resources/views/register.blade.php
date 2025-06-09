<!DOCTYPE html>
<html lang="en">
<>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-indigo-50 min-h-screen flex flex-col items-center justify-center px-4">

    <h1 class="text-3xl font-bold text-blue-800 text-center mb-2">Smart Stock</h1>
    <h3 class="text-lg text-blue-700 text-center mb-8">"Track Smart. Stock Right."</h3>

    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-md border border-blue-200">
        <div class="flex justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5s-3 1.343-3 3 1.343 3 3 3z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 20v-1a6 6 0 0112 0v1" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 8v4m2-2h-4" />
            </svg>
        </div>

        <h2 class="text-xl font-semibold text-center text-blue-700 mb-6">Create a New Account</h2>

        <form id="registerForm" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white font-medium py-2 rounded-lg hover:bg-blue-700 transition">
                Sign Up
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login here</a>
        </p>
    </div>

    <div id="toast" class="fixed top-6 left-1/2 transform -translate-x-1/2 bg-gray-100 text-gray-800 border border-gray-300 px-4 py-2 rounded-lg shadow-md flex items-center gap-4 opacity-0 pointer-events-none transition duration-300 z-50">
    <span id="toast-message" class="text-sm"></span>
    <button onclick="hideToast()" class="text-blue-600 text-sm font-medium focus:outline-none">Okay</button>
</div>

<script>
    const toast = document.getElementById('toast');
    const toastMessage = document.getElementById('toast-message');

    function showToast(message) {
        toastMessage.textContent = message;
        toast.classList.remove('opacity-0', 'pointer-events-none');
        toast.classList.add('opacity-100');
    }

    function hideToast() {
        toast.classList.remove('opacity-100');
        toast.classList.add('opacity-0', 'pointer-events-none');
    }

    window.showToast = showToast;
</script>

@if(session('status') === 'registered')
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            showToast('Account created successfully!');
        });
    </script>
@endif



</body>
</html>
