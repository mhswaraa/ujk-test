<!-- resources/views/dashboard.blade.php -->
<x-app-layout>
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

      <main class="p-6">
        <!-- Overview Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
          <div class="bg-white shadow rounded-lg p-5">
            <dt class="text-sm font-medium text-gray-500 truncate">Total Pelanggan</dt>
            <dd class="mt-1 text-3xl font-semibold text-red-600">{{ $totalCustomers ?? 0 }}</dd>
          </div>
          <div class="bg-white shadow rounded-lg p-5">
            <dt class="text-sm font-medium text-gray-500 truncate">Total Paket</dt>
            <dd class="mt-1 text-3xl font-semibold text-red-600">{{ $totalPackages ?? 0 }}</dd>
          </div>
          <div class="bg-white shadow rounded-lg p-5">
            <dt class="text-sm font-medium text-gray-500 truncate">Pelanggan Aktif</dt>
            <dd class="mt-1 text-3xl font-semibold text-red-600">{{ $activeCustomers ?? 0 }}</dd>
          </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white shadow rounded-lg p-6 mb-6">
          <h3 class="text-lg font-medium text-gray-700 mb-4">Tindakan Cepat</h3>
          <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ route('customers.create') }}" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
              Tambah Pelanggan
            </a>
            <a href="{{ route('packages.create') }}" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
              Tambah Paket
            </a>
          </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white shadow rounded-lg p-6">
          <h3 class="text-lg font-medium text-gray-700 mb-4">Aktivitas Terakhir</h3>
          <ul class="divide-y divide-gray-200">
            @forelse($recentActivities as $activity)
              <li class="py-2 flex justify-between">
                <span class="text-gray-600">{{ $activity->description }}</span>
                <time class="text-sm text-gray-400">{{ $activity->created_at->diffForHumans() }}</time>
              </li>
            @empty
              <li class="py-2 text-gray-500">Belum ada aktivitas.</li>
            @endforelse
          </ul>
        </div>
      </main>
    </div>
  </div>

  {{-- Add small script to toggle sidebar on mobile --}}
  <script>
    const btn = document.getElementById('mobile-menu-button');
    const sidebar = document.querySelector('aside');
    btn.addEventListener('click', () => {
      sidebar.classList.toggle('hidden');
    });
  </script>
</x-app-layout>
