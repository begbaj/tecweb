<?php

namespace App\Http\Controllers;

use App\Models\Resources\Alloggio;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocatoreController extends Controller
{
    public function __construct() {
        // Log::debug('CONTROLLER_CALL: LocatoreController called');
        $this->middleware('can:isLocatore');
    }

    public function index() {
        $accoms = Alloggio::where('id_locatore', Auth::user()->id)->get();
        return view('locatore')->with('accoms', $accoms);
    }

    public function newaccom() {
        return view('locatore.make_alloggio');
    }
    
    public function profileLocatore(){
       return view('user.profileInfo');
    }

    public function chatLocatore($chatId=null){
	$chat = new Chat;
	$rubrica = $chat->getRubric(Auth::user()->id);
	if(is_null($chatId)){
		$messaggi=$chat->getChat(Auth::user()->id, $rubrica[0]->id);
	}else{
		$messaggi=$chat->getChat(Auth::user()->id, $chatId);
	}
       return view('user.chat')->with('data', ['rubrica'=>$rubrica, 'messaggi'=>$messaggi, 'userid'=>Auth::user()->id, 'chatId'=>$chatId]);
    }
}
