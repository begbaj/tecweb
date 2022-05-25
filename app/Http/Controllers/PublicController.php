<?php

namespace App\Http\Controllers;

use App\Models\Accomodations;
use App\Models\Faq;
use App\Models\Resources\Alloggio;

class PublicController extends Controller {
    
    protected $_accomodations;
    protected $_faq;
    protected $_role;
    
    public function __construct() {
        $this->middleware('guest')->except(redirect()->route('homepage'));
    }
    
    public function faq() {
        $this->_faq = new Faq;
        $faq = $this->_faq->getFaq();
        return view('faq')->with('faq', $faq);
    }

    public function who() {
        return view('public.who');
    }

    public function catalog() {
        $this->_accomodations = new Alloggio;
        $accomodations = $this->_accomodations->all();
        return view('public.catalog')
            ->with('accomodations', $accomodations);
    }
    public function homepage() {
        $this->_accomodations = new Alloggio;
        $accomodations = $this->_accomodations->all();
        return view('homepage')
            ->with("accomodations", $accomodations);
    }

    public function priv() {
        return view('priv');
    }    
}
