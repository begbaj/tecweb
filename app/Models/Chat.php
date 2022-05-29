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
			['id_destinario', '=', $user2Id]
		])->orWhere([
			['id_mittente', '=', $user2Id],
			['id_destinario', '=', $user1Id]
		])->orderBy('created_at', 'desc')->get();
		return $messaggi;
	}

	//Ottieni tutti gli utenti con cui l'utente passato ha parlato ordinati per data dell'ultimo messaggio
	public function getRubric($userId){
		$ricevuti =  User::join('messaggi', 'users.id', '=', 'messaggi.id_mittente')->where('messaggi.id_destinario', '=', $userId);
		$mandati =  User::join('messaggi', 'users.id', '=', 'messaggi.id_destinario')->where('messaggi.id_mittente', '=', $userId);
		$utenti = $ricevuti->union($mandati)->get();
		return $utenti;
	}
}
