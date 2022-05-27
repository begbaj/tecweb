<?php

namespace App;

use App\Models\Resources\Alloggio;
use App\Models\Resources\Messaggio;


class Rented
{
    public function make_stats2($tipo, $data_inizio, $data_fine){
		$this->_accomodations = new Alloggio;
                $this->_rented = new Messaggio;
		$this->data_inizio = date("Y-m-d",strtotime($this->data_inizio));
		$this->data_fine = date("Y-m-d",strtotime($this->data_fine));
                $this->_accomodations = Alloggio::find(['id']);
		if((($this->data_inizio)=="")&&($this->data_fine=""))
		{            
                    $this->_rented = Messaggio::find(['id_alloggio'],$this->_accomodations);
		}
		else
		{
                    $this->_rented = Messaggio::find(['id_alloggio'],$this->_accomodations)->whereRaw('tipo like "%'. $tipo .'%" and created_at between "'. $data_inizio. '" and "'.$data_fine .'" and opzionato = 1')->count();

		}
		return $this->_rented;
	}
}
