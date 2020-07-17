<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "management" && Auth::guard($guard)->check()) {
            return redirect('management/dashboard');
        }
        if ($guard == "patient" && Auth::guard($guard)->check()) {
            return redirect('patient/dashboard');
        }
        if ($guard == "doctor" && Auth::guard($guard)->check()) {
            return redirect('doctor/dashboard');
        }
        if ($guard == "laboratory" && Auth::guard($guard)->check()) {
            return redirect('laboratory/dashboard');
        }
        if ($guard == "billing" && Auth::guard($guard)->check()) {
            return redirect('billing/dashboard');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/');
        }

        return $next($request);
    }
}