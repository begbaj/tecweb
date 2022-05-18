<?php

namespace App\Http\Controllers;

use App\Models\Accomodations;

class PublicController extends Controller {
    
    protected $_accomodations;

    public function __construct() {
        $this->_accomodations = new Accomodations;
    }

    public function homepage() {
        return view('homepage')
            ->with("accomodations", $this->_accomodations);
    }
}
