<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        // If the user is not logged in, redirect them to the login page
        if (!Auth::check()) {
            return redirect()->route('getLogin'); // Redirect to the login page
        }

        return $next($request);
    }
}
