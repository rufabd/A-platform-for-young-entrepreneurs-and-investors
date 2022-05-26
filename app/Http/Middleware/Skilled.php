<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Skilled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        // if (Auth::user()->role == 'founder') {
        //     return redirect(url('/dashboard/profile/founder'));
        // }

        if (Auth::user()->role == 'admin') {
            return redirect(url('/dashboard'));
        }

        if (Auth::user()->role == 'founder') {
            return redirect(url('/dashboard'));
        }

        if (Auth::user()->role == 'skilled') {
            return $next($request);
        } else {
            return back(); // Redirecting same dashboard when user try to access another dashboard by typing in the URL
        }
    }
}
