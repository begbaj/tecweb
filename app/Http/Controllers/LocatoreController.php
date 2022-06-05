<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewAccomodationRequest;
use App\Models\Resources\Alloggio;
use App\Models\Resources\Inclusione;
use App\Models\Catalog;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\AlloggiServizi;

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
}
