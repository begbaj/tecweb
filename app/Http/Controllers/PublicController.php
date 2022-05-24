<?php

namespace App\Http\Controllers;

use App\Models\Accomodations;
use App\Models\Faq;
use Illuminate\Support\Facades\Log;

class PublicController extends Controller {
    
    protected $_accomodations;
    protected $_faq;
    protected $_role;
    
    public function __construct() {
        Log::debug('CONTROLLER_CALL: PublicController called');
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
        $this->_accomodations = new Accomodations;
        $accomodations = $this->_accomodations->getAccomodations();
        return view('public.catalog')
            ->with('accomodations', $accomodations);
    }
    public function homepage() {
        $this->_accomodations = new Accomodations;
        $accomodations = $this->_accomodations->getAccomodations();
        return view('homepage')
            ->with("accomodations", $accomodations);
    }
}
