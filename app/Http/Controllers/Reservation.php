<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservations;
use Validator;


class Reservation extends Controller
{
    function Reservation(Request $req){

        $user= new Reservations;

        //if needed you can apply it

        // if($user->arrival=$req->arrival==$user->departure=$req->departure){
        //     return ["status"=>false,"message"=>"Arival Date and Departure date not be same"];

        // }
        
        // check the same entry is entired at two times 
        // $sameEntry =Reservations::where('guest_name',$req->guest_name);
        // if($sameEntry){
        //     return ["status"=>false,"message"=>"You have Already Registered with this userId"];
        // }


        $check=array(
            "arrival"=>"required",
            "guest_name"=>"required",
            "departure"=>"required",
            "phone_no"=>"required | max:13",
            "city"=>"required",
            "vou_no"=>"required",
            "bkg_no"=>"required",
            "status"=>"required"
            
);
        $validator= Validator::make($req->all(),$check);

        if($validator->fails())
        {
            return $validator->errors();

        }else{
       $user->arrival=$req->arrival;
       $user->title=$req->title;
       $user->company=$req->company;
       $user->address=$req->address;
       $user->email_id=$req->email_id;
       $user->guest_name=$req->guest_name;
       $user->departure=$req->departure;
       $user->phone_no=$req->phone_no;
       $user->city=$req->city;
       $user->state=$req->state;
       $user->nationality=$req->nationality;
       $user->type_of_rooms=$req->type_of_rooms;
       $user->no_of_rooms=$req->no_of_rooms;
       $user->advance=$req->advance;
       $user->vou_no=$req->vou_no;
       $user->bkg_no=$req->bkg_no;
       $user->status=$req->status;
       $user->source_agent=$req->source_agent;
       $user->booking_no=$req->booking_no;
        
        
        $result=$user->save();
        
        if($result){
            return ["status"=>true,"message"=>"Data has been saved"];
        }else{
            return ["status"=>false,"message"=>"Data has not been saved"];
        }

 
        }

       }
    // This is the search function 
       
       function filter($guest_name ){
        
        $userlist=Reservations::where('guest_name', 'LIKE', '%'.$guest_name.'%')->get();
        return $userlist;
        
        
       }

 


    //test
    //     function filter(Request $req){
    //     $user =new Reservations;

    //     $user->guest_name=$req->guest_name;
    //     $result=Reservations::where("guest_name",$user)->get();

    //     return $result;
       
       
        
        
    //    }

    function getAlldata(){
       $dbData= Reservations::all();
       return $dbData;
     
    }
}
