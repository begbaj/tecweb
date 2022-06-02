<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewAccomodationRequest;
use App\Models\Resources\Alloggio;
use App\Models\Resources\Messaggio;
use App\Models\Chat;
use App\Models\Catalog;
use App\Http\Requests\NewMessageRequest;
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
    
    public function profileLocatore(){
       return view('user.profileInfo');
    }
    
   /**
    * Redirection to Locatore chats 
    *
    */
    public function chatLocatore($chatId=null){
	$chat = new Chat;
	$rubrica = $chat->getRubric(Auth::user()->id);
	if(is_null($chatId)){
		if(count($rubrica)>0){
			$messaggi=$chat->getChat(Auth::user()->id, $rubrica[0]->id);
		}else{
			$messaggi=$chat->getChat(Auth::user()->id, null);
		}
	}else{
		$messaggi=$chat->getChat(Auth::user()->id, $chatId);
	}
       return view('user.chat')->with('rubrica', $rubrica)->with('messaggi', $messaggi)->with('userid',Auth::user()->id)->with('chatId', $chatId);
    }

   /**
    * Send message to $chatId 
    *
    */
    public function sendMessage(NewMessageRequest $request, $chatId){
		$message = new Messaggio;
		$message->id_mittente=Auth::user()->id;
		$message->id_destinatario=$chatId;
		$message->created_at= Carbon::now()->toDateTimeString();
		$message->fill($request->validated());
		$message->save();

		return redirect()->route('chatLocatore', [$message->id_destinatario]);
    }

    /**
     * Redirect to accomodation details page
     */    
    public function detailsLocatore($accomId){
	$catalog = new Catalog;
	$alloggio = Alloggio::where('id', $accomId)->get();
	$servizi = $catalog->getServiziAlloggio($accomId);
        return view('details')->with('alloggio', $alloggio->first())->with('servizi', $servizi);
    }
}
