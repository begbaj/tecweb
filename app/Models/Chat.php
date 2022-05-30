<?php

namespace App\Models;

use App\Models\Resources\Messaggio;
use App\User;

class Chat
{
	//Ottieni tutti i messaggi tra i due user ordinati per data
	public function getChat($user1Id, $user2Id){
		$messaggi = Messaggio::where([
			['id_mittente', '=', $user1Id],
			['id_destinatario', '=', $user2Id]
		])->orWhere([
			['id_mittente', '=', $user2Id],
			['id_destinatario', '=', $user1Id]
		])->orderBy('created_at')->get();
		return $messaggi;
	}

	//Ottieni tutti gli utenti con cui l'utente passato ha parlato ordinati per data dell'ultimo messaggio
	public function getRubric($userId){
		$ricevuti = User::select('users.nome', 'users.cognome', 'users.id', \DB::raw('MAX(messaggi.created_at) as max'))
			->join('messaggi', 'users.id', '=', 'id_mittente')->where('id_destinatario', '=', $userId)->groupBy('users.nome', 'users.cognome', 'users.id');
		$mandati = User::select('users.nome', 'users.cognome', 'users.id', \DB::raw('MAX(messaggi.created_at) as max'))
			->join('messaggi', 'users.id', '=', 'id_destinatario')->where('id_mittente', '=', $userId)->groupBy('users.nome', 'users.cognome', 'users.id');
		$utenti = $ricevuti->union($mandati);
		$utenti2 = \DB::query()->fromSub($utenti, 'a')->select('nome', 'cognome', 'id', \DB::raw('MAX(max) as max'))->groupBy('nome', 'cognome', 'id')->orderBy('max', 'desc');

		return $utenti2->get();
	}
}
