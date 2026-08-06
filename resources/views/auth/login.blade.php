<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-8">

       <div class="text-5xl mb-4">
           ☕
       </div>

       <h2 class="text-2xl font-bold text-gray-800">
           Login Dashboard
       </h2>

       <p class="text-gray-500 mt-2">
           Masukkan email dan password untuk melanjutkan
       </p>

    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input
                id="email"
                class="block mt-2 w-full rounded-xl border-gray-300 py-3 px-4 focus:border-[#8B5E3C] focus:ring-[#8B5E3C]"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input
                id="password"
                class="block mt-2 w-full rounded-xl border-gray-300 py-3 px-4 focus:border-[#8B5E3C] focus:ring-[#8B5E3C]"
                type="password"
                name="password"
                required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 text-[#8B5E3C] focus:ring-[#8B5E3C]">
                <span class="ms-2 text-sm text-gray-600">Ingat saya</span>
            </label>
        </div>

        <div class="mt-6">
            @if (Route::has('password.request'))
                <div class="text-right mb-4">

                   <a
                      href="{{ route('password.request') }}"
                      class="text-sm text-[#8B5E3C] hover:underline">

                      Lupa Password?

                    </a>

                </div>

            @endif

            <x-primary-button
                class="w-full justify-center bg-[#8B5E3C] hover:bg-[#6F4A2F] rounded-xl py-3 font-semibold">
                Masuk
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
