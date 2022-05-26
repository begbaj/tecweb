<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Alloggio extends Model
{
	protected $table = 'alloggi';
	protected $primarykey = 'id';

	protected $guarded = ['id'];

	public $timestamps = true;



public function make_stats($tipo, $data_inizio, $data_fine){
    $get_filtered = Alloggio::whereRaw('tipo = "' . $tipo .'" and created_at between DATE('. $data_inizio. ') and DATE('.$data_fine .');')->get();
    return $get_filtered;
}


}