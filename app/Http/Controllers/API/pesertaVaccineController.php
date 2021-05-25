<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PesertaVaccine;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class pesertaVaccineController extends Controller
{
    public function add(Request $request)
    {
        $validate = $request->validate([
            'peserta_id' => 'required|int',
            'peserta_nik' => 'required|int',
            'vaccines_id' => 'required|int',
        ]);
        $vaccineId = Vaccine::find($request->vaccines_id);
        if ($validate && $vaccineId) {
           PesertaVaccine::create($validate);
           return response()->json(['message'=>'berhasil']);
        }
        return response()->json(['message'=>'gagal']);
    }

    public function delete($peserta_nik)
    {
        $pesertaVaccine = PesertaVaccine::find($peserta_nik);
        $pesertaVaccine->delete();
        return response()->json(['message'=>'berhasil dihapus']);
    }
    public function index()
    {
        $pesertaVaccine = PesertaVaccine::with(['peserta','vaccine'])->get();
        return response()->json(['data'=>$pesertaVaccine]);
    }
}
