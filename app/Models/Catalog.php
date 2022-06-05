<?php

namespace App\Models;

use App\Models\Resources\Alloggio;
use App\Models\Resources\Servizio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Catalog extends Model
{
    public function getServiziAlloggio($id_alloggio){
	    $alloggio = Servizio::select('servizi.*')->join('inclusioni', 'servizi.id', '=', 'id_servizio')->where('id_alloggio', $id_alloggio);
	    return $alloggio->get();
    }
    
   public function getIdServiziAlloggio($id_alloggio){
	    $alloggio = Servizio::select('servizi.id')->join('inclusioni', 'servizi.id', '=', 'id_servizio')->where('id_alloggio', $id_alloggio);
	    return $alloggio->pluck('id')->toArray();
    } 
}
