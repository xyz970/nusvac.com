<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT;

/**
 *  Middleware peserta, Untuk mencegah peserta dapat mengakses halaman Super Admin ataupun halaman Admin vaksin center
 */

class Peserta
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
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['status' => 'Token is Invalid'],401);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['status' => 'Token is Expired'],401);
            }else{
                // return response()->json(['status' => 'Authorization Token not found']);
            }
        }
        $user = Auth::guard('peserta')->user();
        if ($user->isPeserta()) {
            return $next($request);
        } else {
            return response()->json(['error'=>'Anda tidak bisa mengakses halaman ini'],401);
        }
        

    }
}
