<x-guest-layout>
  <div class="min-h-screen flex flex-col lg:flex-row">
    {{-- Left Panel (hidden mobile) --}}
    <div class="hidden lg:flex lg:w-1/2 bg-red-600 items-center justify-center">
      <div class="text-white px-12 space-y-6">
        <h2 class="text-4xl font-extrabold">Selamat Datang di RouteLink</h2>
        <p class="text-lg">Kelola pelanggan dan paket internet Anda dengan cepat, mudah, dan aman.</p>
    </div>
</div>

{{-- Right Panel: Form --}}
<div class="flex-1 flex items-center justify-center bg-gray-50 px-4">
    <div class="w-full max-w-xl lg:max-w-2xl p-6 bg-white bg-opacity-50 backdrop-blur-md rounded-xl shadow-xl">
        
        <div class="text-center mb-6">
            <img src="https://routelink.net.id/assets/images/logo.svg" alt="Ilustrasi Jaringan" class="w-3/4 mx-auto">
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
          @csrf

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
              autocomplete="current-password"
              required
              class="mt-1 block w-full px-4 py-3 max-w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500"
            />
            @error('password')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          {{-- Remember & Forgot --}}
          <div class="flex items-center justify-between text-sm">
            <label class="inline-flex items-center">

            @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="text-red-600 hover:underline">Lupa Password?</a>
            @endif
          </div>

          {{-- Submit --}}
          <button
            type="submit"
            class="w-full flex justify-center py-3 rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition"
          >
            Masuk
          </button>
        </form>

        {{-- Register Link --}}
        <p class="mt-6 text-center text-sm text-gray-600">
          Belum punya akun?
          <a href="{{ route('register') }}" class="text-red-600 hover:underline">Daftar di sini</a>
        </p>

      </div>
    </div>
  </div>
</x-guest-layout>
