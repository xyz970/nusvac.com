<?php

use App\Http\Controllers\API\adminsController;
use App\Http\Controllers\API\scheduleController;
use App\Http\Controllers\API\vaccineCenScheduleController;
use App\Http\Controllers\API\vaccineCenterController;
use App\Http\Controllers\API\vaccineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Login Super Admin
 */
Route::post('super/admin/register',[adminsController::class,'register']);
Route::post('super/admin/login',[adminsController::class,'login']);
Route::middleware('verif.superAdmin')->group(
    function(){
        Route::get('super/admin/profil',[adminsController::class,'check']);

        /**
         * Jadwal Vaksin 
         */
        Route::post('vaksin/jadwal/add',[scheduleController::class,'add']);
        Route::post('vaksin/jadwal/update/{id}',[scheduleController::class,'update']);
        Route::get('vaksin/jadwal/delete/{id}',[scheduleController::class,'delete']);


        /**
         * Jadwal vaksin center
         */
        Route::post('vaksin/center/jadwal/add',[vaccineCenScheduleController::class,'add']);
        Route::post('vaksin/center/jadwal/update/{id}',[vaccineCenScheduleController::class,'update']);
        Route::get('vaksin/center/jadwal/delete/{id}',[vaccineCenScheduleController::class,'delete']);


        /**
         * Vaksin center
         */
        Route::post('vaksin/center/add',[vaccineCenterController::class,'add']);
        Route::post('vaksin/center/update/{id}',[vaccineCenterController::class,'update']);


        /**
         * Vaksin
         */

         Route::post('vaksin/add',[vaccineController::class,'add']);
         Route::post('vaksin/update/{id}',[vaccineController::class,'update']);

    }
);
