<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SmartStock</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Custom font stack for elegant typography */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap');

    body {
      font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    }
  </style>
</head>
<body class="bg-white text-gray-600">

  <!-- Header -->
  <header 
    class="sticky top-0 z-50 bg-white shadow-sm backdrop-blur-sm backdrop-saturate-150"
    >
    <nav class="max-w-[1200px] mx-auto flex items-center justify-between px-6 py-4">
      <a href="#" class="text-2xl font-bold text-gray-900 select-none">SmartStock</a>
      <ul class="hidden md:flex space-x-8 text-gray-600 font-medium">
        <li><a href="#features" class="hover:text-gray-900 transition-colors duration-300">Features</a></li>
        <li><a href="#contact" class="hover:text-gray-900 transition-colors duration-300">Contact</a></li>
      </ul>
      <a href="#get-started" class="hidden md:inline-block bg-gray-900 text-white py-2 px-5 rounded-lg font-semibold hover:bg-gray-800 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2">Get Started</a>
      <!-- Mobile menu button -->
      <button id="mobile-menu-btn" aria-label="Open menu" class="md:hidden focus:outline-none focus:ring-2 focus:ring-gray-900 rounded">
        <svg class="w-7 h-7 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
          <path d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </nav>
    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md border-t border-gray-200">
      <nav class="flex flex-col px-6 py-4 space-y-4 text-gray-700 font-semibold">
        <a href="#features" class="hover:text-gray-900 transition-colors duration-300">Features</a>
        <a href="#pricing" class="hover:text-gray-900 transition-colors duration-300">Pricing</a>
        <a href="#contact" class="hover:text-gray-900 transition-colors duration-300">Contact</a>
        <a href="#get-started" class="bg-gray-900 text-white py-2 rounded-lg text-center hover:bg-gray-800 transition-colors duration-300">Get Started</a>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="pt-20 pb-28 max-w-[1200px] mx-auto px-6 text-center">
    <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 leading-tight max-w-4xl mx-auto">
      Simplify Your Inventory Management
    </h1>
    <p class="mt-6 text-lg md:text-xl max-w-2xl mx-auto text-gray-500">
      Keep track of your products, monitor stock levels, and generate real-time reports effortlessly.
    </p>
    <a href="#get-started" class="mt-10 inline-block bg-gray-900 text-white py-4 px-12 rounded-xl text-lg font-semibold select-none hover:bg-gray-800 transition-colors duration-300 focus:outline-none focus:ring-4 focus:ring-gray-900 focus:ring-opacity-50">
      Get Started
    </a>
  </section>

  <!-- Features Section -->
  <section id="features" class="pt-16 pb-20 bg-white">
    <div class="max-w-[1200px] mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
      <!-- Feature Card 1 -->
      <div class="bg-white rounded-3xl shadow-md p-8 text-center hover:shadow-lg transition-shadow duration-300 cursor-default">
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-6 h-12 w-12 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M9 21v-6a2 2 0 00-4 0v6m11-6v6a2 2 0 104 0v-6M4 7h16M4 7V5a3 3 0 013-3h10a3 3 0 013 3v2" />
        </svg>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Add and Manage Products</h3>
        <p class="text-gray-500 text-base leading-relaxed">
          Quickly add new products with details and categories to keep your inventory organized.
        </p>
      </div>
      <!-- Feature Card 2 -->
      <div class="bg-white rounded-3xl shadow-md p-8 text-center hover:shadow-lg transition-shadow duration-300 cursor-default">
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-6 h-12 w-12 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 15a4 4 0 014-4h10a4 4 0 014 4M4 19h16" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 11v8" />
        </svg>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Monitor Stock Levels</h3>
        <p class="text-gray-500 text-base leading-relaxed">
          Stay updated on stock quantities to prevent shortages or overstocking.
        </p>
      </div>
      <!-- Feature Card 3 -->
      <div class="bg-white rounded-3xl shadow-md p-8 text-center hover:shadow-lg transition-shadow duration-300 cursor-default">
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-6 h-12 w-12 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-3-3m0 0l3-3m-3 3h8a4 4 0 010 8h-1" />
        </svg>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Generate Reports</h3>
        <p class="text-gray-500 text-base leading-relaxed">
          Create detailed reports for sales, stock, and inventory trends over time.
        </p>
      </div>
      <!-- Feature Card 4 -->
      <div class="bg-white rounded-3xl shadow-md p-8 text-center hover:shadow-lg transition-shadow duration-300 cursor-default">
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-6 h-12 w-12 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v16c0 1.104.895 2 2 2h12a2 2 0 002-2V4a2 2 0 00-2-2H6a2 2 0 00-2 2z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M8 9h8M8 13h8M8 17h5" />
        </svg>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">User Permissions</h3>
        <p class="text-gray-500 text-base leading-relaxed">
          Control access for team members with role-based user permissions.
        </p>
      </div>
    </div>
  </section>

  <!-- Get Started Section (Call to Action) -->
  <section id="get-started" class="bg-gray-50 py-16">
    <div class="max-w-[900px] mx-auto text-center px-6">
      <h2 class="text-4xl font-extrabold text-gray-900 mb-6">Ready to Simplify Your Inventory?</h2>
      <p class="text-gray-600 text-lg mb-10 max-w-xl mx-auto">Get started today and take control of your inventory management effortlessly.</p>
      <a href="#" class="inline-block bg-gray-900 text-white py-4 px-14 rounded-2xl font-semibold select-none hover:bg-gray-800 transition-colors duration-300 focus:outline-none focus:ring-4 focus:ring-gray-900 focus:ring-opacity-50">Create Your Account</a>
    </div>
  </section>

  <!-- Footer -->
  <footer id="contact" class="bg-white border-t border-gray-200 py-10 mt-20">
    <div class="max-w-[1200px] mx-auto px-6 flex flex-col md:flex-row justify-between items-center text-gray-600 text-sm font-medium">
      <p class="mb-4 md:mb-0">&copy; 2025 SmartStock. All rights reserved.</p>
      <nav class="space-x-6">
        <a href="#" class="hover:text-gray-900 transition-colors duration-300">Privacy Policy</a>
        <a href="#" class="hover:text-gray-900 transition-colors duration-300">Terms of Service</a>
        <a href="#" class="hover:text-gray-900 transition-colors duration-300">Contact</a>
      </nav>
    </div>
  </footer>

<script>
  // Mobile menu toggle
  const btn = document.getElementById('mobile-menu-btn');
  const menu = document.getElementById('mobile-menu');

  btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
</script>

</body>
</html>
