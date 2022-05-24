<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Accomodations;


class AdminController extends Controller
{       
    protected $_accomodations;
 
    public function __construct() {
        Log::debug('CONTROLLER_CALL: AdminController called');
        $this->middleware('can:isAdmin');
    }

    public function index() {
        $this->_accomodations = new Accomodations;
        $accomodations = $this->_accomodations->getAccomodations();
        return view('admin')
            ->with('accomodations', $accomodations);
    }
    
    public function catalog(){
        $this->_accomodations = new Accomodations;
        $accomodations = $this->_accomodations->getAccomodations();
            return view('public.catalog')
            ->with('accomodations', $accomodations);    
    }
}
