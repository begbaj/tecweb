<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Servizio extends Model
{
	protected $table = 'servizi';
	protected $primarykey = 'id';

	protected $guarded = ['id'];

	public $timestamps = true;

        static function getServs($type=null){
            if ($type!=null)
                return Servizio::whereRaw('tipo is NULL or tipo = ?', $type)->get();
            else
                return Servizio::all();
        }
}
