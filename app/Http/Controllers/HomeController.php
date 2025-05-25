<?php

namespace App\Http\Controllers;

use App\Model\color;
use Illuminate\Http\Request;

class HomeController extends Controller
{

  
    public function index()
    {
        $color=color::all();
        return view('home',["colors"=>$color]);
    }
}
