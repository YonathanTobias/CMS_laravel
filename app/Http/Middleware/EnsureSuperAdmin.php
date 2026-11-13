<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user || ! $user->isSuperAdmin()) {
            return redirect()
                ->route('admin.dashboard')
                ->with('error', 'Akses ditolak. Fitur ini hanya dapat diakses oleh Super Admin.');
        }

        return $next($request);
    }
}
