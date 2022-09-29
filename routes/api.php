<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegister; 
use App\Http\Controllers\Login;
use App\Http\Controllers\Reservation;
use App\Http\Controllers\Payment_details;
use App\Http\Controllers\Type_of_rooms;
use App\Http\Controllers\No_of_roomes;


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
Route::get("guest_details",[Reservation::class,'get_all_guest_details']);

// Route::get("payment_details/{id}",[Payment_details::class,'payment_details']);
// Route::post("payment",[Payment_details::class,'payment']);
Route::get("room_type",[Type_of_rooms::class,'roomesType']);
route::get("noOfrooms",[No_of_roomes::class,'noOfrooms']);