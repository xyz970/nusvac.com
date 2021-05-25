<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\pesertaVaccineStatus;
use Illuminate\Http\Request;

class pesertaVaccineStatusController extends Controller
{
    public function add(Request $request)
    {
        $validate = $request->validate(
            [
                'peserta_id' => 'required|int:10',
                'peserta_nik' => 'required|int:19',
                'vaccination_status_id' => 'required|int:10'
            ]
        );
        if ($validate) {
            pesertaVaccineStatus::create($validate);
            return response()->json(['message'=>'berhasil']);
        }
        return response()->json(['gagal']);
    }

    public function index()
    {
        $pesertaVaccineStatus = pesertaVaccineStatus::with(['peserta','vaccinationStatus'])->get();
        return response(['data'=>$pesertaVaccineStatus]);
    }

    public function delete($id)
    {
        $pesertaVaccineStatus = pesertaVaccineStatus::find($id);
        $pesertaVaccineStatus->delete();
        return response()->json(['message'=>'berhasil dihapus']);
    }

    public function update(Request $request,$id)
    {
        $validate = $request->validate(
            [
                'peserta_id' => 'required|int:10',
                'peserta_nik' => 'required|int:19',
                'vaccination_status_id' => 'required|int:10'
            ]
        );

        if ($validate) {
            $pesertaVaccineStatus = pesertaVaccineStatus::find($id);
            $pesertaVaccineStatus->update($validate);
            $pesertaVaccineStatus->save();
            return response()->json(['message'=>'berhasil']);
        }
        return response()->json(['message'=>'gagal']);

    }
}
