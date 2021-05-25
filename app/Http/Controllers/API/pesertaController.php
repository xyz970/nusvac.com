<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWTAuth as JWTAuthJWTAuth;
use Tymon\JWTAuth\JWTGuard;


/**
 * 
 * Peserta controller, mengatur login dan logout peserta
 * 
 */

class pesertaController extends Controller
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
            'password' => 'required'
        ]);
        if ($validate) {

            $input = $request->all();

            $peserta = new Peserta;

            $peserta->first_name = $input['first_name'];
            $peserta->last_name = $input['last_name'];
            $peserta->nik = $input['nik'];
            $peserta->dob = $input['dob'];
            $peserta->id = $input['nik'];
            // $peserta->vac_center_id =;
            $peserta->address = $input['address'];
            $peserta->contact = $input['contact'];
            $dob = Carbon::parse($input['dob'])->diffForHumans();
            // $peserta->age = $input['age'];
            $age = Str::substr($dob, 0, 2);
            $peserta->age = $age;
            $peserta->password = Hash::make($input['password']);

            $peserta->save();
            return response()->json(['message' => 'berhasil daftar', 'age' => $age]);
        }
        return response()->json(['message' => 'gagal',]);
        // $input = $request->all();

    }

    public function login(Request $request)
    {

        $validate = $request->validate([
            'nik' => 'required|int:19',
            'password' => 'required'
        ]);


        config()->set('auth.defaults.guard', 'peserta');
        Config::set('jwt.user', 'App\Models\Peserta');
        Config::set('auth.providers.user.model', App\Models\Peserta::class);
        $credentials = $request->only('nik', 'password');
        if ($validate) {
            $token = null;
            try {
                if (!$token = JWTAuth::attempt($credentials)) {
                    return response()->json(['error' => 'invalid_credentials'], 401);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'could_not_create_token'], 500);
            }
            return response()->json([
                'token' => $token,
                'user' => Auth::user(),
            ]);
        }
    }

    public function check()
    {
        $user = Auth::guard('peserta')->user();
        $peserta = Peserta::find($user->id);
        return response()->json(
            [
                'message' => 'Selamat Datang ' . $user->FullName,
                'user' => $user,
                'vaccineCenter' => $peserta->vacCenter,
                'status' => $peserta->pesertaVacStatus->vaccinationStatus

            ]
        );
        // return response()->json("selamat datang ".$user->FullName);
    }

    public function logout()
    {
        Auth::guard('peserta')->logout();
        return response()->json('berhasil logout');
    }
}
