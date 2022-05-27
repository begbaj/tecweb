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
    $this->data_inizio = date("Y-m-d",strtotime($this->data_inizio));
    $this->data_fine = date("Y-m-d",strtotime($this->data_fine));
    $get_filtered = Alloggio::whereRaw('tipo = "' . $tipo .'" and created_at between "'. $data_inizio. '" and "'.$data_fine .'";')->get();
    return $get_filtered;
}
}