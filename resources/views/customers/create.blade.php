<!-- resources/views/customers/create.blade.php -->
<x-app-layout>
 <x-navbar/>
  
  <div class="py-6">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded-lg shadow">
      <h2 class="font-semibold text-xl text-gray-800">Tambah Pelanggan</h2>
      @if($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
          <ul class="list-disc pl-5">
            @foreach($errors->all() as $err)
              <li>{{ $err }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('customers.store') }}" class="space-y-4">
        @csrf
        <div>
          <x-input-label for="name" value="Nama" />
          <x-text-input id="name" name="name" required class="w-full" />
        </div>
        <div>
          <x-input-label for="email" value="Email" />
          <x-text-input id="email" name="email" type="email" required class="w-full" />
        </div>
        <div>
          <x-input-label for="phone_number" value="Nomor Telepon" />
          <x-text-input id="phone_number" name="phone_number" required class="w-full" />
        </div>
        <div>
          <x-input-label for="address" value="Alamat (opsional)" />
          <textarea id="address" name="address" class="w-full px-4 py-2 border rounded-md" rows="3"></textarea>
        </div>
        <div>
          <x-input-label for="package_id" value="Pilih Paket" />
          <select id="package_id" name="package_id" class="w-full px-4 py-2 border rounded-md">
            <option value="">-- Pilih --</option>
            @foreach($packages as $pkg)
              <option value="{{ $pkg->id }}">{{ $pkg->name }} ({{ $pkg->speed }} Mbps)</option>
            @endforeach
          </select>
        </div>
        <div class="flex justify-end">
          <x-primary-button> Simpan </x-primary-button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>