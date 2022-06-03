<?php

namespace App\Http\Controllers;

use App\Models\Resources\Alloggio;

class LocatarioController extends Controller
{
    public function __construct() {
        $this->middleware('can:isLocatario');
    }

    public function index() {
        $this->_accomodations = new Alloggio;
        $accomodations = $this->_accomodations->getAlloggiByDate();
        return view('locatario')
            ->with('accomodations', $accomodations);
    }
    
}
