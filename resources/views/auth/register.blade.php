<x-guest-layout>
  <div class="min-h-screen flex flex-col lg:flex-row">
    {{-- Left Panel --}}
    <div class="hidden lg:flex lg:w-1/2 bg-red-600 items-center justify-center">
      <div class="text-white px-12 space-y-6">
        <h2 class="text-4xl font-extrabold">Gabung dengan RouteLink</h2>
        <p class="text-lg">Buat akun dan mulai kelola pelanggan & paket internet Anda.</p>
      </div>
    </div>

    {{-- Right Panel: Form --}}
    <div class="flex-1 flex items-center justify-center bg-gray-50 px-4">
      <div class="w-full max-w-xl lg:max-w-2xl p-6 bg-white bg-opacity-50 backdrop-blur-md rounded-xl shadow-xl">
        
        <div class="text-center mb-6">
           <img src="https://routelink.net.id/assets/images/logo.svg" alt="Ilustrasi Jaringan" class="w-3/4 mx-auto">
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
          @csrf

          {{-- Name --}}
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input
              id="name"
              name="name"
              type="text"
              autocomplete="name"
              required
              class="mt-1 block w-full px-4 py-3 max-w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500"
              value="{{ old('name') }}"
            />
            @error('name')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          {{-- Email --}}
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input
              id="email"
              name="email"
              type="email"
              autocomplete="username"
              required
              class="mt-1 block w-full px-4 py-3 max-w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500"
              value="{{ old('email') }}"
            />
            @error('email')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          {{-- Password --}}
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input
              id="password"
              name="password"
              type="password"
              autocomplete="new-password"
              required
              class="mt-1 block w-full px-4 py-3 max-w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500"
            />
            @error('password')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          {{-- Confirm Password --}}
          <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input
              id="password_confirmation"
              name="password_confirmation"
              type="password"
              autocomplete="new-password"
              required
              class="mt-1 block w-full px-4 py-3 max-w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500"
            />
            @error('password_confirmation')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          {{-- Submit --}}
          <button
            type="submit"
            class="w-full flex justify-center py-3 rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition"
          >
            Daftar
          </button>
        </form>

        {{-- Login Link --}}
        <p class="mt-6 text-center text-sm text-gray-600">
          Sudah punya akun?
          <a href="{{ route('login') }}" class="text-red-600 hover:underline">Masuk di sini</a>
        </p>
      </div>
    </div>
  </div>
</x-guest-layout>
