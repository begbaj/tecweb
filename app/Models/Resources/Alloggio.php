<?php

namespace App\Models\Resources;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Alloggio extends Model
{
	protected $table = 'alloggi';
	protected $primarykey = 'id';

	protected $guarded = ['id'];

	public $timestamps = true;

	public function getAlloggiByDate($number=15){
            $accomodations = Alloggio::orderby('created_at', 'desc')->paginate($number);
            return $accomodations;
	}

        public function getAlloggioById($id){
            return Alloggio::all()->where('id', '=', $id);
        }
        
        public function get_alloggio()
        {
            $accomodations = Alloggio::all();
            return $accomodations;
        }

	public function make_stats($tipo, $data_inizio, $data_fine){
		$this->_accomodations = new Alloggio;
                if((is_null($data_inizio)) and is_null($data_fine))
		{            
		    $get_filtered = Alloggio::whereRaw('tipo like "%' . $tipo . '%"')->count();
		}

		else
		{
                    $data_inizio = date("Y-m-d",strtotime($data_inizio));
                    $data_fine = date("Y-m-d",strtotime($data_fine)); 
		    $get_filtered = Alloggio::whereRaw('tipo like "%'. $tipo .'%" and created_at between "'. $data_inizio. '" and "'.$data_fine .'";')->count();
		}
		return $get_filtered;
	}
        
        	public function make_stats3($tipo, $data_inizio, $data_fine){
		$this->_accomodations = new Alloggio;
                if((is_null($data_inizio)) and is_null($data_fine))
		{            
		    $get_filtered = Alloggio::whereRaw('tipo like "%' . $tipo . '%" and opzionato = 1')->count();
		}
		else
		{
                    $data_inizio = date("Y-m-d",strtotime($data_inizio));
                    $data_fine = date("Y-m-d",strtotime($data_fine));
		    $get_filtered = Alloggio::whereRaw('tipo like "%'. $tipo .'%" and created_at between "'. $data_inizio. '" and "'.$data_fine .'" and opzionato = 1')->count();
		}
		return $get_filtered;
	}
}
