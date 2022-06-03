<?php

namespace App\Http\Controllers;

use App\Models\Resources\Alloggio;
use App\Models\Resources\Messaggio;
use App\Models\Chat;
use App\Models\Catalog;
use App\Http\Requests\NewMessageRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LocatarioController extends Controller
{
    public function __construct() {
        $this->middleware('can:isLocatario');
    }

    public function index() {
        $this->_accomodations = new Alloggio;
        $accomodations = $this->_accomodations->getAlloggiByDate();
        return view('locatario')
            ->with('accomodations', $accomodations);
    }
    
    public function profileLocatario(){
       return view('user.profileInfo');
    }
    
    public function detailsLocatario($accomId){
        $catalog = new Catalog;
	$alloggio = Alloggio::where('id', $accomId)->get();
	$servizi = $catalog->getServiziAlloggio($accomId);     
        return view('details')->with('alloggio', $alloggio->first())->with('servizi', $servizi);
    }
}
