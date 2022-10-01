<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\No_of_room;


class Room_available_by_date extends Controller
{
    function roomAvailable(){
       $data= DB::table('no_of_rooms')                 
        ->select('id','room_number')
        ->whereNotIn('room_number', DB::table('reservations')->select('room_id')->where('arrival', '<=', '2022-09-04')->where('departure', '>=', '2022-09-04')->get()->pluck('room_id'))
        ->get();

        return json_decode( json_encode($data), true);
    }
    
}
