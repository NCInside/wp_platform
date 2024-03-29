<?php

namespace App\Http\Middleware;
use App\Providers\RouteServiceProvider;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomEmailVerification
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
        if (!Auth::check()) return redirect(RouteServiceProvider::HOME);

        if (Auth::user()->email_verified_at) return $next($request);

        return redirect(RouteServiceProvider::HOME);
    }
}
