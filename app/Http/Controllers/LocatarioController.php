<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    
    public function chatLocatario($chatId=null){
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

    public function sendMessage(NewMessageRequest $request, $chatId){
		$message = new Messaggio;
		$message->id_mittente=Auth::user()->id;
		$message->id_destinatario=$chatId;
		$message->created_at= Carbon::now()->toDateTimeString();
		$message->fill($request->validated());
		$message->save();

		return redirect()->route('chatLocatario', [$message->id_destinatario]);
    }
    
    public function detailsLocatario($accomId){
        $catalog = new Catalog;
	$alloggio = Alloggio::where('id', $accomId)->get();
	$servizi = $catalog->getServiziAlloggio($accomId);     
        return view('details')->with('alloggio', $alloggio->first())->with('servizi', $servizi);
    }
}
