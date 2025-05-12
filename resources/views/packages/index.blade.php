<!-- resources/views/packages/index.blade.php -->
<x-app-layout>
  <x-navbar />
  
      <main class="p-6">
        <div class="flex items-center justify-between mb-6">
          <h2 class="text-2xl font-semibold text-gray-800">Manajemen Paket Internet</h2>
          <a href="{{ route('packages.create') }}" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Paket
          </a>
        </div>

        @if(session('success'))
          <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') }}
          </div>
        @endif

        <form method="GET" class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 mb-4">
          <input type="text" name="search" placeholder="Cari paket..." value="{{ request('search') }}" class="w-full sm:w-1/3 px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500" />
          <select name="speed" class="w-full sm:w-1/3 px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500 mt-2 sm:mt-0">
            <option value="">Semua Kecepatan</option>
            @foreach([30, 50, 100] as $s)
              <option value="{{ $s }}" @if(request('speed') == $s) selected @endif>{{ $s }} Mbps</option>
            @endforeach
          </select>
          <button type="submit" class="w-full sm:w-auto px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 mt-2 sm:mt-0">
            Filter
          </button>
        </form>

        <div class="bg-white overflow-auto rounded-lg shadow">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kecepatan</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                <th class="px-6 py-3"></th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach($packages as $pkg)
                <tr>
                  <td class="px-6 py-4">{{ $pkg->name }}</td>
                  <td class="px-6 py-4">{{ $pkg->speed }} Mbps</td>
                  <td class="px-6 py-4">Rp {{ number_format($pkg->price, 0, ',', '.') }}</td>
                  <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('packages.edit', $pkg) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    <form method="POST" action="{{ route('packages.destroy', $pkg) }}" class="inline-block delete-form">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="mt-4">{{ $packages->withQueryString()->links() }}</div>
      </main>
    </div>
  </div>

  <!-- Mobile sidebar toggle -->
  <script>
    document.getElementById('mobile-menu-button').addEventListener('click', function () {
      document.querySelector('aside').classList.toggle('hidden');
    });
  </script>

  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.querySelectorAll('.delete-form').forEach(form => {
      form.addEventListener('submit', function (e) {
        e.preventDefault();
        Swal.fire({
          title: 'Yakin ingin menghapus?',
          text: 'Data tidak bisa dikembalikan setelah dihapus!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#aaa',
          confirmButtonText: 'Ya, hapus!',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            this.submit();
          }
        });
      });
    });
  </script>
</x-app-layout>
