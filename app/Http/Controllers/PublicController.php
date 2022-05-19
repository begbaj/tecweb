<?php

namespace App\Http\Controllers;

use App\Models\Accomodations;
use App\Models\Faq;

class PublicController extends Controller {
    
    protected $_accomodations;
    protected $_faq;

    public function __construct() {
        $this->_accomodations = new Accomodations;
        $this->_faq = new Faq;

    }

    public function homepage() {
        $accomodations = $this->_accomodations->getAccomodations();

        return view('homepage')
            ->with("accomodations", $accomodations);
    }

    public function faq() {
        $faq = $this->_faq->getFaq();
        return view('faq')->with('faq', $faq);
    }

    public function catalog() {
        $accomodations = $this->_accomodations->getAccomodations();
        return view('public.publicCatalog')
            ->with('accomodations', $accomodations);
    }
}
