<?php

use App\Http\Controllers\API\vaccineCenScheduleController;
use Illuminate\Support\Facades\Route;


Route::middleware('verif.adminVac')->group(
    function(){

        Route::post('/vaksin/center/jadwal/update/{id}',[vaccineCenScheduleController::class,'update']);
        Route::post('/vaksin/center/jadwal/delete/{id}',[vaccineCenScheduleController::class,'delete']);

        

    }
);

