<!-- resources/views/packages/edit.blade.php -->
<x-app-layout>
  <x-navbar/>
  
  <div class="py-6">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded-lg shadow">
      <h2 class="font-semibold text-xl text-gray-800">Edit Paket Internet</h2>
      <form method="POST" action="{{ route('packages.update', $package) }}" class="space-y-4">
        @csrf @method('PUT')
        <div>
          <x-input-label for="name" value="Nama Paket" />
          <x-text-input id="name" name="name" required class="w-full" :value="old('name', $package->name)" />
        </div>
        <div>
          <x-input-label for="speed" value="Kecepatan (Mbps)" />
          <x-text-input id="speed" name="speed" type="number" required class="w-full" :value="old('speed', $package->speed)" />
        </div>
        <div>
          <x-input-label for="price" value="Harga" />
          <x-text-input id="price" name="price" type="number" step="0.01" required class="w-full" :value="old('price', $package->price)" />
        </div>
        <div class="flex justify-end">
          <x-primary-button> Update </x-primary-button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>