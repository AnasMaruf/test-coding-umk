<?php

use App\Http\Controllers\SoalLimaController;
use App\Http\Controllers\SoalSatuController;
use App\Http\Controllers\SoalTigaController;
use App\Http\Controllers\SoalTujuhController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/soalno1',[SoalSatuController::class, 'index']);
Route::get('/soalno3',[SoalTigaController::class, 'index']);
Route::post('/soalno5/register',[SoalLimaController::class,'register']);
Route::post('/soalno5/login',[SoalLimaController::class,'login']);
Route::middleware('auth:sanctum')->get('/soalno5/login/data',[SoalLimaController::class, 'data']);
Route::get('/soalno7', [SoalTujuhController::class,'index']);
