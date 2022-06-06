<?php

namespace App\Models;

use App\Models\Resources\Alloggio;
use App\Models\Resources\Messaggio;
use Illuminate\Support\Facades\Log;


class Rented
{
    protected $_rented;
    public function make_stats2($tipo, $data_inizio, $data_fine){
            $_accomodations = new Alloggio;
            if ($tipo == 'alloggio')
            {
                $tipo = '';
            }
            Log::debug('tipo = '. $tipo);
            $messages = new Messaggio;
            if((is_null($data_inizio)) and is_null($data_fine))
            {  
                $_rented = Alloggio::join('messaggi', 'messaggi.id_alloggio','=','alloggi.id')->whereRaw(' tipo like "%'. $tipo .'" and messaggi.id_alloggio IS NOT NULL')->count();
            }    
            else
            {
                $data_inizio = date("Y-m-d",strtotime($data_inizio));
                $data_fine = date("Y-m-d",strtotime($data_fine));
                $_rented = Alloggio::join('messaggi', 'messaggi.id_alloggio','=','alloggi.id')->whereRaw(' tipo like "%'. $tipo .'%" and alloggi.created_at between "'. $data_inizio. '" and "'.$data_fine .'" and messaggi.id_alloggio IS NOT NULL')->count();
            }
            Log::debug('query = '. $_rented);
            return $_rented;
	}
}
