<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Resources\Alloggio;
use App\Models\Resources\Faq;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use App\Models\Rented;

class AdminController extends Controller
{       
    protected $_accomodations;
    protected $requested;
    protected $faq;

    public function __construct(Request $request) {
        // Log::debug('CONTROLLER_CALL: AdminController called');
        $this->request = $request;
        $this->middleware('can:isAdmin');
    }

    public function index() {
        $this->_accomodations = new Alloggio;
        $accomodations = $this->_accomodations->getAlloggiByDate();
        return view('public.catalog')
            ->with('accomodations', $accomodations);
    }
    
    public function catalog(){
        $this->_accomodations = new Alloggio;
        $accomodations = $this->_accomodations->getAlloggiByDate();
            return view('public.catalog')
            ->with('accomodations', $accomodations);    
    }
    
    public function getStats(Request $request){
        $this->_accomodations = new Alloggio;
        $this->requested = new Rented;
        $tipo = $request->input('type');
        $data_inizio = $request->input('start-date');
        $data_fine = $request->input('end-date');

        if (!is_null($data_fine) and !is_null($data_inizio)){
            $request->validate([
                'start-date' => 'date_format:Y-m-d|before:today',
                'end-date' => 'date_format:Y-m-d|after:start-date'  
            ]);
                $count_rent = $this->_accomodations->make_stats($tipo, $data_inizio, $data_fine);
                $count_request = $this->_accomodations->make_stats3($tipo, $data_inizio, $data_fine);
                $count_assigned = $this->requested->make_stats2($tipo, $data_inizio, $data_fine);            
        }
        else{
            $count_rent = $this->_accomodations->make_stats($tipo, $data_inizio, $data_fine);
            $count_request = $this->_accomodations->make_stats3($tipo, $data_inizio, $data_fine);
            $count_assigned = $this->requested->make_stats2($tipo, $data_inizio, $data_fine);
        }
        return view('admin.statistics')->with('count_rent',$count_rent)->with('count_request',$count_request)->with('count_assigned',$count_assigned);
    }
    
    public function statistics()
    {
        return view('admin.statistics');
    }
    
    public function faqs(){
        $this->faq = new Faq;
        $faq = $this->faq->all();
        return view('admin.admfaqs')->with('faq',$faq);
    }
    
    public function addfaq(Request $request)
    {
        $this->faq = new Faq;
        $domanda = $request->input('domanda');
        $risposta = $request->input('risposta');
        $validator_start = $request->validate([
            'domanda' => 'required',
            'risposta' => 'required'  
        ]);
        $this->faq->insert_faq($domanda, $risposta);
        $faq = $this->faq->all();
        return redirect()->route('admin.faq'); //view('admin.admfaqs')->with('faq',$faq); 
    }
    
    public function deletefaq($id)
    {
        $this->faq = new Faq;
        $this->faq->delete_faq($id);
        return redirect()->route('admin.faq', ['success' => 'Eliminazione avvenuta correttamente']);        
    }
    
    public function updateFaq(Request $request, $id)
    {
        $request->validate([
            'domanda' => 'required',
            'risposta' => 'required'
        ]);
        Faq::where('id',$id)->update(['domanda'=>$request->domanda,
                                      'risposta'=>$request->risposta]);
        return redirect()->route('admin.faq');
    }
}