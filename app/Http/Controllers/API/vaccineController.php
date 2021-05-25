<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Vaccine;
use Illuminate\Http\Request;


/**
 * Vaksin controller
 */
class vaccineController extends Controller
{
    public function add(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required|int',
            'brand' => 'required|string:25',
            'details' => 'required'
        ]);

        if ($validate) {
            Vaccine::create($validate);
            return response()->json(['message'=>'berhasil']);
        }

        return response()->json(['message'=>'gagal']);
    }

    public function index()
    {
        $vaccine = Vaccine::all();
        return response()->json(['data'=>$vaccine]);
    }

    public function update(Request $request,$id)
    {
        $validate = $request->validate([
            'id' => 'required|int',
            'brand' => 'required|string:25',
            'details' => 'required'
        ]);
        
        if ($validate) {
            $vaccine = Vaccine::find($id);
            $vaccine->update($validate);
            return response()->json(['message'=>'berhasil']);
        }
        return response()->json(['error'=>'gagal'],422);
    }
}
