<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\payment_detail;

class Payment_details extends Controller
{
    function payment(Request $req){
        $amount_details =new payment_detail;
        $amount_details->total_amount=$req->total_amount;
        $amount_details->deposite_amount=$req->deposite_amount;
        $amount_details->balance_amount=$req->balance_amount;
        $amount_details->amount_to_pay=$req->amount_to_pay;

        $result=$amount_details->save();

        
        if($result){
            return ["status"=>true,"message"=>"Data has been saved"];
        }else{
            return ["status"=>false,"message"=>"Data has not been saved"];
        }
 }

 //This is the function of getting the details of Deu amount to pay....
 function payment_details($id){
    $payment_deails =payment_detail::where("id",$id)->get();
    return $payment_deails;
 }
    
}
