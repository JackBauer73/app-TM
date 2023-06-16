<?php

namespace App\Http\Middleware;

use App\Http\Controllers\HomeController;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\PlayerController;



class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // return redirect(RouteServiceProvider::HOME);
                $role = Auth::user()->role;
                // $role = 'Club';
                if ($role == 'Club') {
                    return redirect('club');
                } else if ($role == 'Player') {
                    return redirect('player');
                }
            }
        }

        return $next($request);
    }
}
