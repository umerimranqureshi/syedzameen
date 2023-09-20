<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\helper;

class sellerRoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $helper = new helper();

        if (Auth::user()->role == 3 && $helper->checkPhoneVerification() == 1) {
            return $next($request);
        }
        abort(404);
    }
}
