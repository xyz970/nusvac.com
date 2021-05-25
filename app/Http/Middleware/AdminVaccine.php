<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT;


/**
 *  Middleware Admin vaksin, Untuk mencegah peserta dapat mengakses halaman Admin vaksin center
 */

class AdminVaccine
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
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['status' => 'Token is Invalid'],401);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['status' => 'Token is Expired'],401);
            } else {
                // return $next($request);
            }
            $user = Auth::guard('adminvaccine')->user();
            if ($user->isAdminVac()) {
                return $next($request);
            } else {
                return response()->json(['error' => 'Anda tidak bisa mengakses halaman ini'], 401);
            }
        }
    }
}
