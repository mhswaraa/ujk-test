<!-- resources/views/customers/edit.blade.php -->
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800">Edit Pelanggan</h2>
  </x-slot>

  <div class="py-6">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded-lg shadow">
      <form method="POST" action="{{ route('customers.update', $customer) }}" class="space-y-4">
        @csrf @method('PUT')
        <div>
          <x-input-label for="name" value="Nama" />
          <x-text-input id="name" name="name" required class="w-full" :value="old('name',$customer->name)" />
        </div>
        <div>
          <x-input-label for="email" value="Email" />
          <x-text-input id="email" name="email" type="email" required class="w-full" :value="old('email',$customer->email)" />
        </div>
        <div>
          <x-input-label for="phone_number" value="Nomor Telepon" />
          <x-text-input id="phone_number" name="phone_number" required class="w-full" :value="old('phone_number',$customer->phone_number)" />
        </div>
        <div>
          <x-input-label for="address" value="Alamat (opsional)" />
          <textarea id="address" name="address" class="w-full px-4 py-2 border rounded-md" rows="3">{{ old('address',$customer->address) }}</textarea>
        </div>
        <div>
          <x-input-label for="package_id" value="Pilih Paket" />
          <select id="package_id" name="package_id" class="w-full px-4 py-2 border rounded-md">
            <option value="">-- Pilih --</option>
            @foreach($packages as $pkg)
              <option value="{{ $pkg->id }}" @if($pkg->id==$customer->package_id) selected @endif>{{ $pkg->name }} ({{ $pkg->speed }} Mbps)</option>
            @endforeach
          </select>
        </div>
        <div class="flex justify-end">
          <x-primary-button> Update </x-primary-button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>
