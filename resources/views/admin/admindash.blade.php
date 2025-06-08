<html lang="en" >
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    /* @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap'); */

    body {
      font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
      background-color: #ffffff;
      color: #000000;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    h1, h2, h3 {
      color: #111827;
    }

    /* Subtle card shadow for a lifted effect */
    .card-shadow {
      box-shadow: rgba(0, 0, 0, 0.05) 0px 4px 12px;
      border-radius: 0.75rem; /* 12px */
    }

    /* Smooth transitions on buttons and cards */
    .transition-smooth {
      transition-property: background-color, box-shadow, transform;
      transition-duration: 0.3s;
      transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Hero headline styles */
    .hero-heading {
      font-weight: 700;
      font-size: 3rem;
      line-height: 1.1;
    }

    @media (min-width: 768px) {
      .hero-heading {
        font-size: 4rem;
      }
    }

  </style>
</head>
<body class="flex flex-col min-h-screen">

  <!-- Header -->
  <header class="sticky top-0 z-50 bg-white shadow-sm backdrop-blur-sm backdrop-saturate-150">
    <nav class="max-w-[1200px] mx-auto flex items-center justify-between px-6 py-4">
      <a href="#" class="text-2xl font-bold text-black-900 select-none">Admin</a>
      <ul class="hidden md:flex space-x-10 font-medium text-gray-600">
                <li><a href="/product" class="hover:text-blue-600 transition-colors duration-300">Manage Products</a></li>
                <li><a href="/categories" class="hover:text-blue-600 transition-colors duration-300">Categories</a></li>
                <li><a href="/sales" class="hover:text-blue-600 transition-colors duration-300">Sales</a></li>
                <li><a href="/users" class="hover:text-blue-600 transition-colors duration-300">Users</a></li>
                <li><a href="/audit-logs" class="hover:text-blue-600 transition-colors duration-300">Audit Logs</a></li>
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

  <!-- Hero Section -->
  <section id="dashboard" class="pt-24 pb-20 max-w-[1200px] mx-auto px-6 text-center">
    <h1 class="hero-heading max-w-4xl mx-auto">
      Admin Dashboard
    </h1>
    <p class="mt-6 text-lg md:text-xl max-w-2xl mx-auto text-gray-500">
      Exclusive access for administrators to manage products, users, and monitor audit logs with ease and security.
    </p>
  </section>

  <!-- Features Section -->
  <section class="max-w-[1200px] mx-auto px-6 pb-32 grid gap-12 grid-cols-1 md:grid-cols-3">

    <!-- Manage Products Card -->
    <article id="products" class="card-shadow p-10 text-center hover:shadow-lg transition-smooth cursor-default bg-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-6 h-14 w-14 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M9 21v-6a2 2 0 00-4 0v6m11-6v6a2 2 0 104 0v-6M4 7h16M4 7V5a3 3 0 013-3h10a3 3 0 013 3v2" />
      </svg>
      <h2 class="text-2xl font-semibold text-gray-900 mb-3">Manage Products</h2>
      <p class="text-gray-600 leading-relaxed text-base">
        Add, edit, and delete product entries to keep your inventory up-to-date and accurate.
      </p>
    </article>

    <!-- Manage Users Card -->
    <article id="users" class="card-shadow p-10 text-center hover:shadow-lg transition-smooth cursor-default bg-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-6 h-14 w-14 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M9 20H4v-2a3 3 0 015.356-1.857M12 12a4 4 0 100-8 4 4 0 000 8z" />
      </svg>
      <h2 class="text-2xl font-semibold text-gray-900 mb-3">Manage Users</h2>
      <p class="text-gray-600 leading-relaxed text-base">
        Assign roles and permissions, create new users, and maintain secure access control.
      </p>
    </article>

    <!-- View Audit Logs Card -->
    <article id="audit-logs" class="card-shadow p-10 text-center hover:shadow-lg transition-smooth cursor-default bg-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-6 h-14 w-14 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M18 8c-1.657 0-3 1.567-3 3.5S16.343 15 18 15s3-1.567 3-3.5S19.657 8 18 8z M6 12c0 1.933 1.343 3.5 3 3.5s3-1.567 3-3.5S10.657 8.5 9 8.5 6 10.067 6 12z M9 21v-2m6 2v-2m2.121-7.879a7.979 7.979 0 01-10.243 0" />
      </svg>
      <h2 class="text-2xl font-semibold text-gray-900 mb-3">View Audit Logs</h2>
      <p class="text-gray-600 leading-relaxed text-base">
        Monitor system activities and ensure accountability with comprehensive audit trails.
      </p>
    </article>
  </section>

   <!-- View Audit Logs Card -->
    <article id="categories" class="card-shadow p-10 text-center hover:shadow-lg transition-smooth cursor-default bg-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-6 h-14 w-14 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M18 8c-1.657 0-3 1.567-3 3.5S16.343 15 18 15s3-1.567 3-3.5S19.657 8 18 8z M6 12c0 1.933 1.343 3.5 3 3.5s3-1.567 3-3.5S10.657 8.5 9 8.5 6 10.067 6 12z M9 21v-2m6 2v-2m2.121-7.879a7.979 7.979 0 01-10.243 0" />
      </svg>
      <h2 class="text-2xl font-semibold text-gray-900 mb-3">Categories</h2>
      <p class="text-gray-600 leading-relaxed text-base">
       itlog
      </p>
    </article>
  </section>


  <!-- Footer -->
  <footer class="bg-gray-50 border-t border-gray-200 py-12 mt-auto">
    <div class="max-w-[1200px] mx-auto px-6 flex flex-col md:flex-row justify-between items-center text-gray-500 text-sm font-medium space-y-4 md:space-y-0">
      <p>&copy; 2025 InventorySys. All rights reserved.</p>
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

```