<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\No_of_room;

class No_of_roomes extends Controller
{
    function noOfrooms(){
     $noOFrooms =No_of_room::all();
     return $noOFrooms;
    }
}
