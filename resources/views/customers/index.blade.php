<x-app-layout>
  <x-navbar/>

      <!-- Page Content -->
      <main class="p-6">
        <div class="flex items-center justify-between mb-6">
          <h2 class="text-2xl font-semibold text-gray-800">Manajemen Pelanggan</h2>
          <a href="{{ route('customers.create') }}" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Pelanggan
          </a>
        </div>

        @if(session('success'))
          <script>
            document.addEventListener('DOMContentLoaded', function () {
              Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
              });
            });
          </script>
        @endif

        <!-- Filter -->
        <form method="GET" class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 mb-4">
          <input
            type="text"
            name="search"
            placeholder="Cari pelanggan..."
            value="{{ request('search') }}"
            class="w-full sm:w-1/3 px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500"
          />
          <select
            name="package_id"
            class="w-full sm:w-1/3 px-4 py-2 border rounded-md focus:ring-red-500 focus:border-red-500 mt-2 sm:mt-0"
          >
            <option value="">Semua Paket</option>
            @foreach($packages as $pkg)
              <option value="{{ $pkg->id }}" @if(request('package_id')==$pkg->id) selected @endif>
                {{ $pkg->name }} ({{ $pkg->speed }} Mbps)
              </option>
            @endforeach
          </select>
          <button type="submit" class="w-full sm:w-auto px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 mt-2 sm:mt-0">
            Filter
          </button>
        </form>

        <!-- Table -->
        <div class="bg-white overflow-auto rounded-lg shadow">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Telepon</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Alamat</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Paket</th>
                <th class="px-6 py-3"></th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach($customers as $cust)
                <tr>
                  <td class="px-6 py-4">{{ $cust->name }}</td>
                  <td class="px-6 py-4">{{ $cust->email }}</td>
                  <td class="px-6 py-4">{{ $cust->phone_number }}</td>
                  <td class="px-6 py-4">{{ $cust->address ?? '—' }}</td>
                  <td class="px-6 py-4">{{ $cust->package?->name }}</td>
                  <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('customers.edit', $cust) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    <button type="button" class="text-red-600 hover:text-red-900 delete-button" data-id="{{ $cust->id }}">Hapus</button>
                    <form id="delete-form-{{ $cust->id }}" method="POST" action="{{ route('customers.destroy', $cust) }}" class="hidden">
                      @csrf
                      @method('DELETE')
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">{{ $customers->withQueryString()->links() }}</div>
      </main>
    </div>
  </div>

  <!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- SweetAlert Delete Logic -->
  <script>
    document.querySelectorAll('.delete-button').forEach(button => {
      button.addEventListener('click', function () {
        const customerId = this.getAttribute('data-id');
        Swal.fire({
          title: 'Yakin ingin dihapus?',
          text: "Data pelanggan tidak dapat dikembalikan!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#e3342f',
          cancelButtonColor: '#6c757d',
          confirmButtonText: 'Ya, hapus!',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            document.getElementById('delete-form-' + customerId).submit();
          }
        });
      });
    });
  </script>

  <!-- Mobile sidebar toggle -->
  <script>
    const btn = document.getElementById('mobile-menu-button');
    const sidebar = document.querySelector('aside');
    btn.addEventListener('click', () => sidebar.classList.toggle('hidden'));
  </script>
</x-app-layout>
