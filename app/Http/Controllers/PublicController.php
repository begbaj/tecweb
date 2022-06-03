<?php

namespace App\Http\Controllers;

use App\Models\Accomodations;
use App\Models\Resources\Faq;
use App\Models\Resources\Alloggio;

class PublicController extends Controller {
    
    protected $_accomodations;
    protected $_faq;
    protected $_role;
    
    public function __construct() {
    }
    
    public function faq() {
        $this->_faq = new Faq;
        $faq = $this->_faq->all();
        return view('public.faq')->with('faq', $faq);
    }

    public function who() {
        return view('public.who');
    }

    public function catalog() {
        $this->_accomodations = new Alloggio;
        $accomodations = $this->_accomodations->getAlloggiByDate();
        return view('public.catalog')
            ->with('accomodations', $accomodations);
    }
    public function homepage() {
        $this->middleware('guest')->except(redirect()->route('homepage'));
        $this->_accomodations = new Alloggio;
        $accomodations = $this->_accomodations->all();
        return view('homepage')
            ->with("accomodations", $accomodations);
    }

    public function priv() {
        return view('public.priv');
    } 
}
