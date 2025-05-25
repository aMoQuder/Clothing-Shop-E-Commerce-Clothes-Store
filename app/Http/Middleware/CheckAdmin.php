<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{     public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            if ($user->role == "admin") {
                if ($user->status == "active") {
                    return $next($request);
                } elseif ($user->status == "block") {
                    Auth::logout();
                    return redirect()->route('login');
                }
            } elseif ($user->role == "user") {
                if ($user->status == "active") {
                    return redirect()->route('welcome');
                } elseif ($user->status == "block") {
                    Auth::logout();
                    return redirect()->route('login');
                }
            }
        }
        return redirect()->route('login');
    }
}
