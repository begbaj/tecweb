<?php

namespace App\Models;

use App\Models\Resources\Alloggio;
use App\Models\Resources\Servizio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AlloggiServizi extends Model
{

    public function delete_service_alloggio($id_alloggio){
	    Servizio::select('inclusioni')->join('inclusioni', 'servizi.id_alloggio', '=', 'alloggi.id')->where('servizi.id_alloggio', $id_alloggio)->delete();
    }

}
