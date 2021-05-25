<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\vaccineStatus;
use Illuminate\Http\Request;

class vaccineStatusController extends Controller
{
    public function add(Request $request)
    {
        $validate = $request->validate(
            [
                'id' => 'required|int:10',
                'status' => 'required',
            ]
            );
        if ($validate) {
            vaccineStatus::create($validate);
            return response()->json(['message'=>'Berhasil']);
        }
        return response()->json(['message'=>'gagal']);
    }

    public function update(Request $request,$id)
    {
        $validate = $request->validate(
            [
                'id' => 'required|int:10',
                'status' => 'required',
            ]
            );
        if ($validate) {
           $vaccineStatus = vaccineStatus::find($id);
           $vaccineStatus->update($validate);
           $vaccineStatus->save();
            return response()->json(['message'=>'Berhasil']);
        }
        return response()->json(['message'=>'gagal']);
    }

    public function index()
    {
        $vaccineStatus = vaccineStatus::all();
        return response()->json(['data'=> $vaccineStatus]);
    }

    public function delete($id)
    {
        $vaccineStatus = vaccineStatus::find($id);
        return response()->json(['message'=>'berhasil dihapus']);
    }
}
