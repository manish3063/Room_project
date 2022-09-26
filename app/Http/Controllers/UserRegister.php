<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Register;

class UserRegister extends Controller
{
    function Register(Request $req){
        $user =new Register;
        if($req->user_id==""){
            return ["status"=>false,"message"=>"UserId should not be empty"];

        }

        if($req->password==""){
            return ["status"=>false,"message"=>"Password should not be empty"];

        }

        $check =Register::where('user_id',$req->user_id)->where('password',md5($req->password))->first();
        if($check){
            return ["status"=>false,"message"=>"You have Already Registered with this userId"];
        }


        if(strlen($req->password)<6){
            return ["status"=>false,"message"=>"Password should be greater than or equal to of length 6"];

        }
        

        // $validatedData=$req->validate([
        //     'User_id' => 'unique:registers',
            
        // ]);
        // if(!$validatedData->run()){
        //     return ["status"=>false,"message"=>"User id must be unique"];
        // }

        $user->user_id=$req->user_id;
        $user->password=md5($req->password);
        
        
        $result=$user->save();

        if($result){
            return ["status"=>true,"message"=>"Data has been saved","lengt"=>strlen($req->password)];
        }else{
            return ["status"=>false,"message"=>"Data has not been saved"];
        }

    }
    
}
