<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{

    public function index()
    {

    
        return view('web.home');
    }

    public function features()
    {

    
        return view('web.features');
    }
    

    public function pricing ()
    {
        return view('web.pricing');
    }
    public function AutionShadule ()
    {
        return view('web.AutionShadule');
    }
    public function ExploreEvery ()
    {
        return view('web.ExploreEvery');
    }
  
    public function compairaution ()
    {
        return view('web.compairaution');
    }
  

    
}
