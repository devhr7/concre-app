<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Core\Terceros\Tercero;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Show the login page.
     */
    public function create(Request $request): Response
    {
        return Inertia::render('auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => $request->session()->get('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();


        $user = $request->user();

        // Normaliza el role del request (viene como 'Empleado'|'Proveedor'|'Cliente')
        $picked = ucfirst(strtolower($request->input('role')));    // 'Empleado'|'Proveedor'|'Cliente'
        $code   = strtoupper($picked);                             // 'EMPLEADO'|'PROVEEDOR'|'CLIENTE'

        // Carga tipos del tercero solo si faltan (columnas mínimas)
        $user->loadMissing('tercero.tipos:id,nombre');

        // Verifica que el tercero tenga ese tipo
        $hasType = $user->tercero
            ? $user->tercero->tipos->contains(fn($t) => strcasecmp($t->nombre, $picked) === 0)
            : false;

        if (! $hasType) {
            // Cierra sesión por seguridad y devuelve error de validación
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            throw ValidationException::withMessages([
                'role' => "No tienes el tipo '{$picked}' asociado a tu tercero.",
            ]);
        }

        // Guarda el contexto en sesión (útil para middlewares y vistas)
        session(['context.tipo' => $code]);

        // Redirige al dashboard correspondiente
        return redirect()->route($this->routeByRole($code));
    }


    private function routeByRole(string $role): string
    {
        return match (strtoupper($role)) {
            'CLIENTE'   => 'cliente.dashboard',
            'PROVEEDOR' => 'proveedor.dashboard',
            'EMPLEADO'  => 'empleado.dashboard',
            default     => 'dashboard',
        };
    }

    private function go(string $code): RedirectResponse
    {
        return match ($code) {
            'CLIENTE'   => redirect()->route('cliente.dashboard'),
            'PROVEEDOR' => redirect()->route('proveedor.dashboard'),
            'EMPLEADO'  => redirect()->route('empleado.dashboard'),
            default     => redirect()->route('dashboard'),
        };
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
