<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Auth;
class Handler extends ExceptionHandler
{
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        if ($request->is('management') || $request->is('management/*')) {
            return redirect()->guest('/login/management');
        }
        if ($request->is('patient') || $request->is('patient/*')) {
            return redirect()->guest('/login/patient');
        }
        if ($request->is('doctor') || $request->is('doctor/*')) {
            return redirect()->guest('/login/doctor');
        }
        if ($request->is('laboratory') || $request->is('laboratory/*')) {
            return redirect()->guest('/login/laboratory');
        }
        return redirect()->guest(route('login'));
    }
}