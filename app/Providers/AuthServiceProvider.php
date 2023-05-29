<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                -> greeting('Hola ' . $notifiable->name)
                ->subject('Verificar correo electrónico')
                ->line('Por favor, pulsa en el botón de abajo para verificar tu correo electrónico.')
                ->action('Confirmar Cuenta', $url)
                ->line('Si no has creado una cuenta, no es necesario que realices ninguna acción.')
                ->salutation('Saludos desde ' . config('app.name'));
        });
    }
}
