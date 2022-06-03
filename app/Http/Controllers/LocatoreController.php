<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewAccomodationRequest;
use App\Models\Resources\Alloggio;
use App\Models\Resources\Inclusione;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class LocatoreController extends Controller
{
    public function __construct() {
        // Log::debug('CONTROLLER_CALL: LocatoreController called');
        $this->middleware('can:isLocatore');
    }

    /**
     * Redirection to locatore homepage
     */
    public function index() {
        $accoms = Alloggio::where('id_locatore', Auth::user()->id)->get();
        return view('locatore')->with('accoms', $accoms);
    }

    public function newaccom() {
        Log::debug('Pagina Inserimento caricata');
        return view('locatore.make_alloggio');
    }
    

    public function insertNewAccom(NewAccomodationRequest $request) {
        Log::debug('Inserimento Alloggio: iniziato');

        $accom = new Alloggio;
        $accom->id_locatore = Auth::user()->id;
        $accom->opzionato = false;
        $accom->created_at = Carbon::now()->toDateTimeString();
        $accom->fill($request->validated());
        $accom->save();

        $accomid = Alloggio::latest()->get()->first()->id; // TODO: MOLTO RISCHIOSA, BISGONA TROVARE UN'ALTRA SOLUZIONE

        foreach($request->servizi as $serv){
            $servs = new Inclusione;
            $servs->id_servizio = $serv;
            $servs->id_alloggio = $accomid;
            $servs->save();
        }

        $_dir_ = public_path('assets/'.(string)$accom->id);

        Log::debug($_dir_);
        if(!file_exists($_dir_)) mkdir($_dir_);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        if (!is_null($imageName)) {
            $destinationPath = $_dir_ ; 
            $image->move($destinationPath, 'thumbnail');
        };


        return redirect()->route('homepage', [$accom->title]);
    }
}
