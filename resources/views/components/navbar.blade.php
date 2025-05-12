<div class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg hidden md:block">
      <div class="p-6">
        <h2 class="text-xl font-bold text-red-600 text-center">RouteLink Admin</h2>
      <nav class="mt-6">
        <ul>
          <li class="mb-2">
            <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6"/></svg>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="mb-2">
            <a href="{{ route('customers.index') }}" class="flex items-center px-6 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-7 7-7-7"/></svg>
              <span>Pelanggan</span>
            </a>
          </li>
          <li class="mb-2">
            <a href="{{ route('packages.index') }}" class="flex items-center px-6 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18M3 14h18m-7 6h7"/></svg>
              <span>Paket Internet</span>
            </a>
          </li>
          <!-- add more nav items here -->
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 overflow-auto">
      <!-- Top Navbar for Mobile -->
      <header class="md:hidden bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-lg font-semibold text-gray-800">RouteLink Admin</h1>
        <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
      </header>