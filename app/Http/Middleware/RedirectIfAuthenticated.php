<?php

namespace App\Http\Middleware;

use App\Enum\RoleEnum;
use App\Providers\RouteServiceProvider;
use App\Traits\VerifyAuthentication;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (
                Auth::guard($guard)->check() &&
                Auth::user()->isAdmin == RoleEnum::fromString('ADMIN')
            ) {
                return redirect()->route('admin.home');
            } elseif (
                Auth::guard($guard)->check() &&
                Auth::user()->isAdmin == RoleEnum::fromString('CLIENT')
            ) {
                return redirect()->route('client.home');
            }
        }

        return $next($request);
    }
}