  <!-- Header -->
  <header class="sticky top-0 z-50 bg-white shadow-sm backdrop-blur-sm backdrop-saturate-150">
    <nav class="max-w-[1200px] mx-auto flex items-center justify-between px-6 py-4">
      <a href="#" class="text-2xl font-bold text-black-900 select-none">Smart Stock Admin</a>
      <ul class="hidden md:flex space-x-10 font-medium text-gray-600">
        <li><a href="{{route('admin.products')}}" class="hover:text-blue-600 transition-colors duration-300">Products</a></li>
        <li><a href="{{route('admin.categories')}}" class="hover:text-blue-600 transition-colors duration-300">Categories</a></li>
        <li><a href="{{route('admin.sales')}}" class="hover:text-blue-600 transition-colors duration-300">Sales</a></li>
        <li><a href="{{route('admin.users')}}" class="hover:text-blue-600 transition-colors duration-300">Users</a></li>
      </ul>

      <form method="POST" action="{{ route('logout') }}" class="hidden md:inline-block">
        @csrf
        <button type="submit" class="bg-gray-900 text-white py-2 px-6 rounded-lg font-semibold hover:bg-gray-800 transition-smooth focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2">
          Sign Out
        </button>
      </form>

      <button id="mobile-menu-btn" aria-label="Open menu" class="md:hidden focus:outline-none focus:ring-2 focus:ring-gray-900 rounded">
        <svg class="w-7 h-7 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
          <path d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </nav>
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md border-t border-gray-200">
      <nav class="flex flex-col px-6 py-4 space-y-4 font-semibold text-gray-700">
        <a href="/admin/products" class="hover:text-blue-600 transition-colors duration-300">Manage Products</a>
        <a href="/admin/categories" class="hover:text-blue-600">Categories</a></li>
        <a href="/admin/sales" class="hover:text-blue-600 transition-colors duration-300">Sales</a>
        <a href="/admin/users" class="hover:text-blue-600 transition-colors duration-300">Users</a>
        <button class="bg-gray-900 text-white py-2 rounded-lg hover:bg-gray-800 transition-smooth">Sign Out</button>
      </nav>
    </div>
  </header>