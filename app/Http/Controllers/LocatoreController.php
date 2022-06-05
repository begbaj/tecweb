<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewAccomodationRequest;
use App\Models\Resources\Alloggio;
use App\Models\Resources\Inclusione;
use App\Models\Catalog;
use App\Models\AlloggiServizi;
use Carbon\Carbon;
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
        $accoms = Alloggio::where('id_locatore', Auth::user()->id)->orderBy('updated_at', 'desc')->orderBy('created_at', 'desc')->get();
        return view('locatore')->with('accoms', $accoms);
    }

    public function viewMakeAccom() {
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
        $seracc = new AlloggiServizi;
        $inc->delete_inclusione($accomId);
        $acc->delete_alloggio($accomId);
        $this->deleteDirectory(public_path('assets/' . $accomId));
        //$seracc->delete_service_alloggio($accomId);
        return redirect()->route('homepage');
    }

    public function editAccom($accomId){
        $catalog = new Catalog;
        $alloggio = Alloggio::where('id', $accomId)->get();
        $servizi = $catalog->getIdServiziAlloggio($accomId);
        return view('locatore.edit_alloggio')->with('alloggio', $alloggio->first())->with('servizi', $servizi);
    }
    
    public function confirmEdit(Request $request){
        $alloggio = Alloggio::find($request->id);
        
        $v = Validator::make($request->all(), [
            'titolo' => 'required|string|min:4|max:100',
            'descrizione' => 'required|string|min:20|max:5000',
            'tipo' => 'required',
            'eta_min' => 'sometimes|numeric|nullable|min:18|max:100',
            'eta_max' => 'required_with:eta_min|numeric|min:18|max:100|greater_than_field:eta_min',
            'sesso' => 'sometimes|nullable|string',
            'prezzo' => 'required|numeric|min:0',
            'superficie' => 'required|numeric|min:0',
            'data_min' => 'required|date_format:d/m/Y',
            'data_max' => 'required|date_format:d/m/Y|after:start-date',
            'provincia' => 'required|string|max:50',
            'citta' => 'required|string|max:50',
            'indirizzo' => 'required|string|max:100',
            'cap' => 'required|string|size:5',
            'posti_letto' => 'required|numeric|min:1',
            'camere' => 'required|numeric|min:1'   
        ]);
        $data = $v->validated();
        $data->data_min = date("Y-m-d",strtotime(str_replace('/', '-',$request->data_min)));
        $data->data_max = date("Y-m-d",strtotime(str_replace('/', '-',$request->data_max)));
        $alloggio->update($data);
        return redirect()->route('lore');
    } 
}
