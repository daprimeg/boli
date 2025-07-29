<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{

    public function index()
    {

    
        return view('web.home');
    }

    public function feautres()
    {

    
        return view('web.feautres');
    }
    

    public function pricing ()
    {
        return view('web.pricing');
    }
    public function AutionShadule ()
    {
        return view('web.AutionShadule');
    }


    
}
