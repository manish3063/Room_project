<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Register;

class Login extends Controller
{
    function Login(Request $req){
        $user =Register::where('user_id',$req->user_id)->where('password',md5($req->password))->first();

        if($req->user_id==""){
            return ["status"=>false,"message"=>"UserId should not be empty"];

        }
        
        if($req->password==""){
            return ["status"=>false,"message"=>"Password should not be empty"];

        }


        if($user){
            return ["status"=>true,"message"=>"Login successfull","username"=>$user->user_id,"id"=>$user->id];
        }else{
            return ["status"=>false,"message"=>"Username or Password is incorrect"];
        }

    }
}
