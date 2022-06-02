<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $userRole = Auth::user()->user_type;
        if (!$userRole || !in_array($userRole, $roles)) {
            abort(403);
        }
        return $next($request);
    }
    // public function hand(Request $request, Closure $next)
    // {
    //     $userRole = Auth::user()->user_type;
    //     if (Auth::user()->user_type == 'admin') {
    //         return $next($request);
    //     }
    //     return redirect('/dashborad');
    // }
}
