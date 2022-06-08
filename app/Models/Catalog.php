<?php

namespace App\Models;

use App\Models\Resources\Servizio;
use App\Models\Resources\Messaggio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Catalog extends Model
{
    public function getServiziAlloggio($alloggioId){
	    $alloggio = Servizio::select('servizi.*')->join('inclusioni', 'servizi.id', '=', 'id_servizio')->where('id_alloggio', $alloggioId);
	    return $alloggio->get();
    }
    
   public function getIdServiziAlloggio($alloggioId){
	    $alloggio = Servizio::select('servizi.id')->join('inclusioni', 'servizi.id', '=', 'id_servizio')->where('id_alloggio', $alloggioId);
	    return $alloggio->pluck('id')->toArray();
    } 

    public function getOpzioniAlloggio($alloggioId, $userId){
	    $opzioni = Messaggio::whereRaw('id_alloggio = ? AND (id_mittente=? OR id_destinatario=?)', [$alloggioId, $userId, $userId])->orderBy('data_conferma_opzione', 'desc');
	    return $opzioni->get();
    }

    public function deleteServiziAlloggio($id_alloggio){
	    Servizio::select('inclusioni')->join('inclusioni', 'servizi.id_alloggio', '=', 'alloggi.id')->where('servizi.id_alloggio', $id_alloggio)->delete();
    }

}
