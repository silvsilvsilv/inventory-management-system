<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-indigo-50 min-h-screen flex flex-col items-center justify-center px-4 relative">

    <h1 class="text-3xl font-bold text-blue-800 text-center mb-2">Smart Stock</h1>
    <h3 class="text-lg text-blue-700 text-center mb-8">"Track Smart. Stock Right."</h3>

    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-md border border-blue-200">
        <div class="flex justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-500 stroke-[1.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <circle cx="12" cy="8" r="3" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 20v-1a6 6 0 0112 0v1" />
            </svg>
        </div>

        <h2 class="text-xl font-semibold text-center text-blue-700 mb-6">Login to Your Account</h2>

        <form method="POST" action="{{ route('login.submit') }}" id="loginForm">

            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex justify-between items-center mb-6">
                <label class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="mr-2 form-checkbox text-blue-600"> Remember me
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white font-medium py-2 rounded-lg hover:bg-blue-700 transition">
                Login
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Sign up</a>
        </p>
    </div>

    <script>
        const loginForm = document.getElementById('loginForm');
        loginForm.addEventListener('submit', function(e) {
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();

            if (!email || !password) {
                e.preventDefault(); 
                showToast('Please fill in all required fields.');
            }
        });
    </script>
</body>
</html>
