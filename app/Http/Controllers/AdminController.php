<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Resources\Alloggio;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{       
    protected $_accomodations;
    protected $messages;


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
        //$this->messages = new Rented;
        $tipo = $request->input('type');
        $data_inizio = $request->input('start-date');
        $data_fine = $request->input('end-date','');
        $count_rent = $this->_accomodations->make_stats($tipo, $data_inizio, $data_fine);
        $count_request = $this->_accomodations->make_stats3($tipo, $data_inizio, $data_fine);
        Log::debug("cr = " . $count_rent);
        Log::debug("df = " . $data_fine);

        //$count_assigned = $this->messages->make_stats2($tipo, $data_inizio, $data_fine);
        return view('statistics')->with('count_rent',$count_rent)->with('count_request',$count_request);
    }
}
