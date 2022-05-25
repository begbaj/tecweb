<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Resources\Alloggio;


class AdminController extends Controller
{       
    protected $_accomodations;
 
    public function __construct() {
        // Log::debug('CONTROLLER_CALL: AdminController called');
        $this->middleware('can:isAdmin');
    }

    public function index() {
        $this->_accomodations = new Alloggio;
        $accomodations = $this->_accomodations->all();
        return view('admin')
            ->with('accomodations', $accomodations);
    }
    
    public function catalog(){
        $this->_accomodations = new Alloggio;
        $accomodations = $this->_accomodations->all();
            return view('public.catalog')
            ->with('accomodations', $accomodations);    
    }
}
