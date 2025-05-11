<!-- resources/views/packages/create.blade.php -->
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800">Tambah Paket Internet</h2>
  </x-slot>

  <div class="py-6">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded-lg shadow">
      @if($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
          <ul class="list-disc pl-5">
            @foreach($errors->all() as $err)
              <li>{{ $err }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('packages.store') }}" class="space-y-4">
        @csrf
        <div>
          <x-input-label for="name" value="Nama Paket" />
          <x-text-input id="name" name="name" required class="w-full" />
        </div>
        <div>
          <x-input-label for="speed" value="Kecepatan (Mbps)" />
          <x-text-input id="speed" name="speed" type="number" required class="w-full" />
        </div>
        <div>
          <x-input-label for="price" value="Harga" />
          <x-text-input id="price" name="price" type="number" step="0.01" required class="w-full" />
        </div>
        <div class="flex justify-end">
          <x-primary-button> Simpan </x-primary-button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>
