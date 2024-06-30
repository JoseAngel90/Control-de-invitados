<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        // Verifica que el usuario esté autenticado y que tenga el rol adecuado
        if ($user && $user->rol && in_array($user->rol->nombre_rol, $roles)) {
            return $next($request);
        }

        // Si el usuario no tiene el rol requerido, devuelve un error 403
        abort(403, 'Acción no autorizada.');
    }
}
