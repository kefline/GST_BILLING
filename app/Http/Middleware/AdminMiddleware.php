<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the authenticated user has the admin role
            if (Auth::user()->is_role == 1) {
                return $next($request); // User is an admin, proceed with the request
            } else {
                // User is logged in but not an admin
                return redirect('/')->with('error', 'You do not have admin access.');
            }
        }

        // User is not logged in, log them out and redirect to home
        Auth::logout();
        return redirect('/')->with('error', 'You need to log in to access that page.');
    }
}
