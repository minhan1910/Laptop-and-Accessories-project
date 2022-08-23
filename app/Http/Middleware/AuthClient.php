<?php

namespace App\Http\Middleware;

use App\Enum\RoleEnum;
use App\Traits\VerifyAuthentication;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthClient
{
    use VerifyAuthentication;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (
            Auth::check() &&
            $this->canAccessClient(
                Auth::user()->isAdmin,
                [
                    RoleEnum::fromString('ADMIN'),
                    RoleEnum::fromString('CLIENT'),
                    RoleEnum::fromString('MANAGER')
                ]
            )
        ) {
            return $next($request);
        } else {
            return redirect()->route('client.login');
        }
    }
}