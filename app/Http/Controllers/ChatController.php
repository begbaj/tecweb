<?php

namespace App\Http\Controllers;

use App\Models\Resources\Messaggio;
use App\Models\Chat;
use App\Http\Requests\NewMessageRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ChatController extends Controller
{

    /**
     * Get chat by $chatId
     *
     * @chatId id of the user which current user is chatting with
     */
    public function getChat($chatId=null){
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
     * @chatId id of the user which current user is chatting with
     */
    public function sendMessage(NewMessageRequest $request, $chatId){
		$message = new Messaggio;
		$message->id_mittente=Auth::user()->id;
		$message->id_destinatario=$chatId;
		$message->created_at= Carbon::now()->toDateTimeString();
		$message->fill($request->validated());
		$message->save();

		return redirect()->route('chat', [$message->id_destinatario]);
    }

}
