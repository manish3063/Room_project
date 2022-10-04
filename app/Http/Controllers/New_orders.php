<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\New_order;
//use App\Models\Reservations;

use Illuminate\Support\Facades\DB;


class New_orders extends Controller
{
    function order(Request $req){
      // return New_order::all();
      
      $user= new New_order;
      $user->room_no=$req->room_no; 
      $user->item_name=$req->item_name; 
      $user->description=$req->description; 
      $user->quantity=$req->quantity;
      $user->rate=$req->rate; 
      $user->amount=$req->amount; 

      $result=$user->save();
      if($result){
        return ["status"=>true,"message"=>"Data has been saved"];
      }else{
        return ["status"=>false,"message"=>"Data has not been saved"];
      }
    }

   //This is the function through we can get all the details of order by room no
    function get_order(){

        //This is the test
       // $user= DB::table('reservations')->all();
    //     $cards = Reservations::all();
    //   if($req->room_id==$cards->room_id){
    // return ($cards);
    // }

   

   $result= DB::table('reservations')
   ->join('new_orders','reservations.id',"=",'new_orders.id')
   ->select('reservations.room_id','reservations.guest_name','new_orders.item_name','new_orders.description','new_orders.quantity','new_orders.rate','new_orders.amount')
   ->get();
   return $result;
}



//This is the test function 
// function test(Request $req){
//     //return "manish";

//     $user= DB::table('reservations');
//    $result= $user->room_id=$req->room_id;
//    return $result;


// }

}
