<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Messaggio extends Model
{
	protected $table = 'messaggi';
	protected $primarykey = 'id';

	protected $guarded = ['id'];

	public $timestamps = true;

	static function getOpzione($id_alloggio, $id_locatario){
		$opzione = Messaggio::whereRaw("id_alloggio = ? AND id_mittente = ? ", [$id_alloggio,$id_locatario]);
		return $opzione->get();
	}
}

