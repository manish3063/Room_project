<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\No_of_room;
use Carbon\Carbon;


class Room_available_by_date extends Controller
{
    function roomAvailable_details(){
        $date = Carbon::today();
       $data= DB::table('no_of_rooms')                 
        ->select('id','room_number')
        ->whereNotIn('room_number', DB::table('reservations')->select('room_id')->where('arrival', '<=', $date)->where('departure', '>=', $date)->get()->pluck('room_id'))
        ->get();

        $result = json_decode( json_encode($data), true);
     
      if($result==null){
        return ["status"=>false,"message"=>"All roomes are booked no rooms are available"];

      }else{
        return $result ;
      }


    }

    //check the details of booked rooms

    function Occupied_room_details(){
        $date = Carbon::today();
        $data= DB::table('no_of_rooms')                 
        ->select('id','room_number')
        ->whereIn('room_number', DB::table('reservations')->select('room_id')->where('arrival', '<=', $date)->where('departure', '>=', $date)->get()->pluck('room_id'))
        ->get();
        $result= json_decode( json_encode($data), true);
        

        if($result==null){
            return ["status"=>false,"message"=>"No roomes are booked"]; 
        }else{
            return $result;
        }
    }

    //check the number of room booked
    function Occupied(){
        $date = Carbon::today();
        $data= DB::table('no_of_rooms')                 
         ->select('id','room_number')
         ->whereIn('room_number', DB::table('reservations')->select('room_id')->where('arrival', '<=', $date)->where('departure', '>=', $date)->get()->pluck('room_id'))
         ->get();
 
         
 
        $result= json_decode( json_encode($data->count()), true);
        return $result;
       
     }

     //check the number of room are available
     function No_of_rooms_available(){
        $date = Carbon::today();
        $data= DB::table('no_of_rooms')                 
         ->select('id','room_number')
         ->whereNotIn('room_number', DB::table('reservations')->select('room_id')->where('arrival', '<=',$date)->where('departure', '>=',  $date )->get()->pluck('room_id'))
         ->get();
 
         
 
         return json_decode( json_encode($data->count()), true);
     }

     //this is for test purpos

    //  function test(){
    //     $date = Carbon::now();
    //     $formatedDate = $date->format('Y-m-d H:i:s');
    //     echo($formatedDate);
    //     //echo $date;
    //  }


    
}
