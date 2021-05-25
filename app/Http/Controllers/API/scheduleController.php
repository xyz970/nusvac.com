<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class scheduleController extends Controller
{
    public function add(Request $request)
    {
        $validate = $request->validate([
            // 'id' => 'required',
            'time'=>'required',
            'date' => 'required|date'
        ]);
        
        if ($validate) {
            Schedule::create($validate);
            return response()->json(['message' => 'berhasil']);
        }
        return response()->json(['message' => 'gagal']);
    }

    public function index()
    {
        $jadwal = Schedule::all();
        return response()->json(['data'=>$jadwal]);
        // return response()->json(['data'$jadwal]);
    }

    public function update(Request $request,$id)
    {
        $validate = $request->validate([
            // 'id' => 'required',
            'time'=>'required',
            'date' => 'required|date'
        ]);

        if ($validate) {
            $vac_cen = Schedule::find($id);
            $vac_cen->update($validate);
            $vac_cen->save();
            return response()->json(['message'=>'berhasil']);
        }
        return response()->json(['message'=>'gagal']);
    }

    public function delete($id)
    {
        $jadwal = Schedule::find($id);
        $jadwal->delete();
        return response()->json(['message'=>'berhasil dihapus']);
    }
}
