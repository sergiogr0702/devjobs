<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('¡Gracias por registrarte en DevJobs! Antes de comenzar es necesario que verfiques el correo electrónico pulsando en el enlace que se ha enviado a tu correo electrónico. ¿No has recibido el correo? No te preocupes. Pulsa en el botón inferior y te mandaremos otro correo') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Se ha enviado un nuevo enlace de verificación al correo registrado durante la creación de la cuenta') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Reenviar correo de verificación') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Cerrar Sesión') }}
            </button>
        </form>
    </div>
</x-guest-layout>
