<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('¿Has olvidado tu contraseña? No hay problema. Solo escribe la dirección de correo electrónico con la que creaste la cuenta y te mandaremos un enlace para que puedas cambiar la contraseña a una nueva.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex justify-between my-5">
        
            <x-link :href="route('register')">
                Crear cuenta
            </x-link>

            <x-link :href="route('login')">
                Iniciar sesión
            </x-link>
        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Enviar enlace') }}
        </x-primary-button>
    </form>
</x-guest-layout>
