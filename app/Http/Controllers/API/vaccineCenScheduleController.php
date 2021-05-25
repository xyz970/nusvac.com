<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\VaccineCenSchedule;
use App\Models\VaccineCenter;
use Illuminate\Http\Request;

class vaccineCenScheduleController extends Controller
{
    public function add(Request $request)
    {
        $validate = $request->validate([
            'vac_center_id' => 'required',
            'schedule_id' => 'required'
        ]);

        $vacCenter = VaccineCenter::find($request->vac_center_id);
        $schedule = Schedule::find($request->schedule_id);
        if ($validate) {
            if ($schedule && $vacCenter) {
                VaccineCenSchedule::create($validate);
                return response()->json(['message' => 'berhasil']);
            }
            return response()->json(['error'=>'Pastikan schedule id dan vaccine center id ada di tabel schedule dan vaccine center'],422);
        }
        
        return response()->json(['message'=>'gagal'],422);
    }



    public function index()
    {
        $data = VaccineCenSchedule::with(['schedule','vacCenter'])->get();
        return response()->json(['data'=>$data]);
    }



    public function update(Request $request,$id)
    {
        $validate = $request->validate([
            'vac_center_id' => 'required',
            'schedule_id' => 'required'
        ]);

        $schedule = Schedule::find($request->schedule_id);
        if ($validate) {
            if ($schedule) {
                // VaccineCenSchedule::create($validate);


        $vaccineCenSchedule = VaccineCenSchedule::find($id);
        $vaccineCenSchedule->update($validate);

                return response()->json(['message' => 'berhasil']);
            }
            return response()->json(['error'=>'Pastikan schedule id ada di tabel schedule'],422);
        }
        
        return response()->json(['message'=>'gagal'],422);
    }
}
