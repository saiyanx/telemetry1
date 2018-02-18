<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fleet;

class FleetController extends Controller
{


    //Controller that takes to fleets page
    public function index(){
      return view('Pages/fleet');
    }

    //Controller that takes to fleets Summary page
    public function Summary(){

      return view('Pages/Summary')->with('fleets', fleet::all());
    }

}
