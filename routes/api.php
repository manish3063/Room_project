<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegister;
use App\Http\Controllers\Login;
use App\Http\Controllers\Reservation;


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

Route::post("register",[UserRegister::class,'Register']);
Route::post("login",[Login::class,'Login']);
Route::post("reservation",[Reservation::class,'Reservation']);
Route::get("find/{guest_name}",[Reservation::class,'filter']);
//Route::post("find",[Reservation::class,'filter']);