<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewAccomodationRequest;
use App\Models\Resources\Alloggio;
use App\Models\Resources\Inclusione;
use App\Models\Catalog;
use App\Models\AlloggiServizi;
use App\Models\Resources\Messaggio;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
	$catalog = new Catalog;
	$accomsAssegnati = $catalog->getAlloggiAssegnatiInseriti(Auth::user()->id);
	$accomsAttivi = $catalog->getAlloggiAttiviInseriti(Auth::user()->id);
        return view('locatore')->with('accomsAttivi', $accomsAttivi)->with('accomsAssegnati', $accomsAssegnati);
    }

    public function viewMakeAccom() {
        Log::debug('Pagina Inserimento caricata');
        return view('locatore.make_alloggio');
    }
    

    public function insertNewAccom(NewAccomodationRequest $request) {
        Log::debug('Inserimento Alloggio: iniziato');

        $accom = new Alloggio;
        $accom->id_locatore = Auth::user()->id;
        $accom->confermato = false;
        $accom->created_at = Carbon::now()->toDateTimeString();
        $accom->fill($request->validated());

        $accom->data_min = date("Y-m-d",strtotime(str_replace('/', '-',$request->data_min)));
        $accom->data_max = date("Y-m-d",strtotime(str_replace('/', '-',$request->data_max)));
        $accom->save();

        $accomid = Alloggio::latest()->get()->first()->id; // TODO: MOLTO RISCHIOSA, BISGONA TROVARE UN'ALTRA SOLUZIONE
        if (isset($request->servizi))
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
            $image->move($_dir_, 'thumbnail');
        } else {
            link(public_path('img/app/default.png'), $_dir_ . "/thumbnail");
        }

        return redirect()->route('homepage', [$accom->title]);
    }

    private function deleteDirectory($dir) {
        if (!file_exists($dir)) {
            return true;
        }

        if (!is_dir($dir)) {
            return unlink($dir);
        }

        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }

            if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }

        }

        return rmdir($dir);
    }

    public function removeAccom($accomId){
		$acc = new Alloggio;
		$inc = new Inclusione;
		$catalog = new Catalog;
		$seracc = new AlloggiServizi;
		$inc->delete_inclusione($accomId);
		$accomOptions = $catalog->getOpzioniAlloggio($accomId, Auth::user()->id);
		foreach($accomOptions as $option){
		$messaggio = new Messaggio;
		$messaggio->id_mittente=$option->id_destinatario;
		$messaggio->id_destinatario=$option->id_mittente;
		$messaggio->testo="L'annuncio per l'alloggio $accom->id, da lei opzionato, è stato cancellato.";
		$messaggio->freshTimestamp();
		$messaggio->save();
	}
        $acc->delete_alloggio($accomId);
        $this->deleteDirectory(public_path('assets/' . $accomId));
        //$seracc->delete_service_alloggio($accomId);
        return redirect()->route('homepage');
    }

    public function editAccom($accomId){
        $catalog = new Catalog;
        $alloggio = Alloggio::where('id', $accomId)->get()->first();
        $date = DateTime::createFromFormat('Y-m-d', substr($alloggio->data_min, 0,-9));
        $alloggio->data_min = $date->format('d-m-Y');
        $date = DateTime::createFromFormat('Y-m-d', substr($alloggio->data_max, 0,-9));
        $alloggio->data_max = $date->format('d-m-Y');
        $alloggio->data_min = str_replace('-', '/',$alloggio->data_min);
        $alloggio->data_max = str_replace('-', '/',$alloggio->data_max);
        $servizi = $catalog->getIdServiziAlloggio($accomId);
        return view('locatore.edit_alloggio')->with('alloggio', $alloggio)->with('servizi', $servizi);
    }
    
    public function confirmEdit(NewAccomodationRequest $request){
        $accom = Alloggio::find($request->id);
        $accom->fill($request->validated());

        $accom->data_min = date("Y-m-d",strtotime(str_replace('/', '-',$request->data_min)));
        $accom->data_max = date("Y-m-d",strtotime(str_replace('/', '-',$request->data_max)));

        $accom->update();

        if (isset($request->servizi))
            Inclusione::where('id_alloggio', $accom->id)->delete();
            foreach($request->servizi as $serv){
                $servs = new Inclusione;
                $servs->id_servizio = $serv;
                $servs->id_alloggio = $accom->id;
                $servs->save();
            }

        $_dir_ = public_path('assets/'.(string)$accom->id);

        Log::debug($_dir_);
        if(!file_exists($_dir_)) mkdir($_dir_);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->move($_dir_, 'thumbnail');
        }
        return redirect()->route('homepage', [$accom->title]);
    } 

    public function confirmOption(Request $request){;
	$option = Messaggio::where('id', $request->id_opzione)->first();
	$accom = Alloggio::where('id', $option->id_alloggio)->first();
    	if(!($accom->confermato)){
		$option = Messaggio::where('id', $request->id_opzione)->first();
		$option->data_conferma_opzione=Carbon::now();
		$option->update();
		$accom->confermato=true;
		$accom->update();
		$messaggio = new Messaggio;
		$messaggio->id_mittente=$option->id_destinatario;
		$messaggio->id_destinatario=$option->id_mittente;
		$messaggio->testo="La tua richiesta per l'alloggio $accom->id e' stata accettata, vai sulla pagina dei dettagli per scaricare il contratto.";
		$messaggio->freshTimestamp();
		$messaggio->save();
	}
	return redirect()->route('catalog.accom.details', [$option->id_alloggio]);
    }
}
