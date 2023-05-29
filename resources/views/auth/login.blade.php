<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" 
                            type="email" name="email" :value="old('email')" 
                            autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
            </label>
        </div>

        <!-- Links -->
        <div class="flex justify-between my-5">
        
            <x-link :href="route('register')">
                Crear cuenta
            </x-link>

            @if (Route::has('password.request'))
                <x-link :href="route('password.request')">
                    ¿Has olvidado tu contraseña?
                </x-link>
            @endif
        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Iniciar sesión') }}
        </x-primary-button>
    </form>
</x-guest-layout>
