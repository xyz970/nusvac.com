<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * 
 * Admin controller, mengatur login dan logout super admin
 * 
 */

class adminsController extends Controller
{
    public function register(Request $request)
    {
        $validate = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);
        if ($validate) {

            $input = $request->all();

            $superAdmin = new Admins;

            $superAdmin->first_name = $input['first_name'];
            $superAdmin->last_name = $input['last_name'];
            $superAdmin->username = $input['username'];
            $superAdmin->password = Hash::make($input['password']);

            $superAdmin->save();

            return response()->json(['message' => 'berhasil daftar']);
        }
        return response()->json(['message' => 'gagal']);
        //    return response()->json(['message'=>'gagal']);

    }
    public function login(Request $request)
    {

        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        config()->set('auth.defaults.guard', 'superAdmin');
        Config::set('jwt.user', 'App\Models\Admins');
        Config::set('auth.providers.user.model', App\Models\Admins::class);

        $credentials = $request->only('username', 'password');

        if ($validate) {
            $token = null;

            try {
                if (!$token = JWTAuth::attempt($credentials)) {
                    return response()->json(['message' => 'Pastikan username dan kata sandi anda sudah benar'], 401);
                }
            } catch (JWTException $e) {
                return response()->json(['message' => 'gagal membuat token'], 500);
            }
            return response()->json(['token' => $token, 'user' => Auth::user()]);
        }
    }

    public function check()
    {
        $user = Auth::guard('superAdmin')->user();
        return response()->json($user);
    }

    public function logout()
    {
        Auth::guard('superAdmin')->logout();
        return response()->json(['message'=>'Berhasil logout']);
    }
}
