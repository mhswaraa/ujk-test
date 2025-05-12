<!-- resources/views/dashboard.blade.php -->
<x-app-layout>
  <x-navbar />

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
