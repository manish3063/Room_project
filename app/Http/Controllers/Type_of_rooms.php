<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type_of_room;

class Type_of_rooms extends Controller
{
    function roomesType(){
      //  return "This is the roomes";
      $dbData= Type_of_room::all();
      return $dbData;
      
    }
    
}
