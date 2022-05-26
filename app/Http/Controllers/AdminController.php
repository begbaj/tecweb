<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Resources\Alloggio;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{       
    protected $_accomodations;
 
    public function __construct(Request $request) {
        // Log::debug('CONTROLLER_CALL: AdminController called');
        $this->request = $request;
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
    
    public function stats(Request $request){

        $this->_accomodations = new Alloggio;
        $tipo = $request->input('type');
        $data_inizio = $request->input('start-date');
        $data_fine = $request->input('end-date','');
        $accomodations = $this->_accomodations->make_stats($tipo, $data_inizio, $data_fine);
        return view('public.catalog')->with('accomodations',$accomodations);
    }
}
