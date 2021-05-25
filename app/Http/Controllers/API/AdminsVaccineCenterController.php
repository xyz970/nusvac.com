<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AdminsVaccineCenter as ModelsAdminsVaccineCenter;
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
 * Admin vaksin Center controller, mengatur login dan logout Admin vaksin center
 * 
 */

class AdminsVaccineCenterController extends Controller
{
    public function register(Request $request)
    {
        $validate = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'nik' => 'required|int:19',
            'dob' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'age' => 'required',
            'id' => 'required',
            'password' => 'required'
        ]);



        if ($validate) {

            $input = $request->all();

            $adminVacCenter = new ModelsAdminsVaccineCenter;

            $adminVacCenter->first_name = $input['first_name'];
            $adminVacCenter->last_name = $input['last_name'];
            $adminVacCenter->username = $input['username'];
            $adminVacCenter->password = Hash::make($input['password']);

            $adminVacCenter->save();

            return response()->json(['message' => 'berhasil daftar']);
        }
        return response()->json(['message' => 'gagal']);
        // $input = $request->all();

    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        config()->set('auth.defaults.guard', 'adminvaccine');
        Config::set('jwt.user', 'App\Models\AdminVaccineCenter');
        Config::set('auth.providers.user.model', App\Models\AdminVaccineCenter::class);

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
        $user = Auth::guard('adminvaccine')->user();
        return response()->json(['user' => $user]);
    }

    public function logout()
    {
        Auth::guard('peserta')->logout();
        return response()->json('berhasil logout');
    }
}
