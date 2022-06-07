<?php

namespace App\Http\Controllers;

use App\Models\Resources\Messaggio;
use App\Models\Chat;
use App\Http\Requests\NewMessageRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Rented;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

class ChatController extends Controller
{

    public function __construct() {
        $this->middleware('can:isUser');
    }

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
    
    public function generate_pdf($id_alloggio,$id_locatario)
    {
        $chat = new Chat;
        $rented = new Rented;
        $info_alloggio = $rented->select_fields($id_alloggio);
        $locatario_info = $chat->get_locatario_info($id_locatario);
         $data = 
         [
            'id_locatore' => Auth::user()->id,
            'nome_locatore' => Auth::user()->nome,
            'cognome_locatore' => Auth::user()->cognome,
            'id_locatario' => $locatario_info->id,
            'nome_locatario' => $locatario_info->nome,
            'cognome_locatario' => $locatario_info->cognome,
            'eta_locatario' => $locatario_info->data_nascita,
            'genere_locatario' => $locatario_info->genere, 
            'alloggio_id' => $id_alloggio,
            'alloggio_titolo' => $info_alloggio->pluck('titolo'),
            'alloggio_prezzo' => $info_alloggio->pluck('prezzo'),
            'alloggio_data_min' => $info_alloggio->pluck('data_min'),
            'alloggio_data_max' => $info_alloggio->pluck('data_max'),
            'alloggio_indirizzo' => $info_alloggio->pluck('indirizzo'),
            'alloggio_provincia' => $info_alloggio->pluck('provincia'),
            'alloggio_citta' => $info_alloggio->pluck('citta'),
            'alloggio_superficie' => $info_alloggio->pluck('superficie'),
            'alloggio_tipo' => $info_alloggio->pluck('tipo'),
            'alloggio_posti_letto' => $info_alloggio->pluck('posti_letto')
         ];
       $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('user.pdf_form',$data);
       return $pdf->download('contratto.pdf');
       }

}
