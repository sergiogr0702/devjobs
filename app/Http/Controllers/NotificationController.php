<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Se obtienen las notificaciones no leídas del usuario autenticado
        $notificaciones = auth()->user()->unreadNotifications;

        // Se marcan como leídas todas las notificaciones no leídas
        auth()->user()->unreadNotifications->markAsRead();

        return view('notificaciones.index', [
            'notificaciones' => $notificaciones,
        ]);
    }
}
