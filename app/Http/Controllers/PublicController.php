<?php

namespace App\Http\Controllers;

use App\Models\Accomodations;
use App\Models\Faq;

class PublicController extends Controller {
    
    protected $_accomodations;
    protected $_faq;

    public function __construct() {
    }

    public function homepage() {
        $this->_accomodations = new Accomodations;
        $accomodations = $this->_accomodations->getAccomodations();

        return view('homepage')
            ->with("accomodations", $accomodations);
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

    public function signin() {
        return view('auth.signin');
    }

    public function login() {
        return view('auth.login');
    }
}
