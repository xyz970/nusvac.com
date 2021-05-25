<?php

use App\Http\Controllers\API\adminsController;
use App\Http\Controllers\API\AdminsVaccineCenterController;
use App\Http\Controllers\API\newsController;
use App\Http\Controllers\API\pesertaController;
use App\Http\Controllers\API\pesertaVaccineController;
use App\Http\Controllers\API\pesertaVaccineStatusController;
use App\Http\Controllers\API\scheduleController;
use App\Http\Controllers\API\stockController;
use App\Http\Controllers\API\vaccineCenScheduleController;
use App\Http\Controllers\API\vaccineCenterController;
use App\Http\Controllers\API\vaccineController;
use App\Http\Controllers\API\vaccineStatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length');


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Carbon::p
// Str::repla



/**
 * Route Super Admin
 */
require __DIR__ . '/superAdmin.php';

require __DIR__ . '/adminVacCenter.php';



Route::get('vaksin/', [vaccineController::class, 'index']);

Route::get('vaksin/jadwal', [scheduleController::class, 'index']);

Route::get('vaksin/center/jadwal', [vaccineCenScheduleController::class, 'index']);

Route::get('vaksin/center/', [vaccineCenterController::class, 'index']);

Route::get('vaksin/peserta/', [pesertaVaccineController::class, 'index']);

Route::get('vaksin/peserta/status/', [pesertaVaccineStatusController::class, 'index']);

Route::get('vaksin/stok/', [stockController::class, 'index']);

Route::get('vaksin/status', [vaccineStatusController::class, 'index']);

Route::get('news/', [newsController::class, 'index']);



/**
 * Login Peserta
 */
Route::get('peserta/profil', [pesertaController::class, 'check'])->middleware('verif.peserta');
Route::get('peserta/logout', [pesertaController::class, 'logout'])->middleware('verif.peserta');
Route::post('peserta/register', [pesertaController::class, 'register']);
Route::post('peserta/login', [pesertaController::class, 'login']);


/**
 * Login admin vaksin center
 */
Route::post('vaksin/admin/register', [AdminsVaccineCenterController::class, 'register']);
Route::post('vaksin/admin/login', [AdminsVaccineCenterController::class, 'login']);
Route::get('vaksin/admin/profil', [AdminsVaccineCenterController::class, 'check'])->middleware('verif.adminVac');
Route::get('vaksin/admin/logout', [AdminsVaccineCenterController::class, 'logout'])->middleware('verif.adminVac');
