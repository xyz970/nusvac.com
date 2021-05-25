<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Vaccine;
use App\Models\VaccineCenter;
use Illuminate\Http\Request;

class stockController extends Controller
{
    public function add(Request $request)
    {
        $validate = $request->validate([
            'vac_center_id' => 'required|int:10',
            'vaccines_id' => 'required|int:10',
            'stock' => 'required|int:10',
        ]);
        $vacCenter = VaccineCenter::find($request->vac_center_id);
        $vaccineId = Vaccine::find($request->vaccines_id);
        if ($validate && $vacCenter && $vaccineId) {
            Stock::create($validate);
            return response()->json(['message'=>'berhasil']);
        }
        return response()->json(['message'=>'gagal']);
    }

    public function index()
    {
        // $stock = Stock::all();
        $stock = Stock::with(['vacCenter','vaksin'])->get();
        return response()->json(['data'=>$stock]);

        // foreach ($stock as $stocks) {
        //     return response()->json(['data'=>$stocks->vaccine->brand]);
        // }
    }

    public function update(Request $request,$id)
    {
        $stocks = $request->only('stock');
        $validate = $request->validate([
            'stock' => 'required|int',
        ]);
        if ($validate) {
            $stock = Stock::find($id);
            $stock->update($validate);
            return response()->json(['message'=>'berhasil']);
        }
        return response()->json(['message'=>'gagal']);
    }

    public function delete($id)
    {
        $stock = Stock::find($id);
        $stock->delete();
        return response()->json(['message'=>'berhasil']);
    }

}
