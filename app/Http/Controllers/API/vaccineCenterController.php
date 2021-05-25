<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\VaccineCenter;
use Illuminate\Http\Request;

class vaccineCenterController extends Controller
{
    public function add(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required|int:10',
            'name' => 'required|string:50',
            'address' =>  'required',
            'contact' => 'required'
        ]);

        if ($validate) {
            VaccineCenter::create($validate);
            return response()->json(['message'=>'berhasil']);
        }
        return response()->json(['message'=>'gagal']);

    }

    public function index()
    {
        $vac_cen = VaccineCenter::all();
        return response()->json($vac_cen);
    }

    public function update(Request $request,$id)
    {
        $validate = $request->validate([
            'name' => 'required|string:50',
            'address' => 'required',
            'contact' => 'required'
        ]);

        if ($validate) {
            $vac_cen = VaccineCenter::find($id);
            $vac_cen->update($validate);
            return response()->json(['message'=>'berhasil']);
        }
        return response()->json(['message'=>'gagal']);
    }

    public function delete($id)
    {
        $vac_cen = VaccineCenter::find($id);
        $vac_cen->delete();
        return response()->json(['message'=>'berhasil terhapus']);
    }
}
