<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocatarioController extends Controller
{
    public function __construct() {
        $this->middleware('can:isLocatario');
    }

    public function index() {
        return view('locatario');
    }
    
    public function profileLocatario(){
       return view('user.profileInfo');
    }
}
