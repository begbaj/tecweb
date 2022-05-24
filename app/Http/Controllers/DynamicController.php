<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DynamicController extends Controller
{
    public function homepage() {
        $this->_accomodations = new Accomodations;
        $accomodations = $this->_accomodations->getAccomodations();
        return view('homepage')->with("accomodations", $accomodations);
    }
}
