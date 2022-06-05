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

    public function getAlloggiSortedByFilters($filters){
	    $whereString;
	    foreach($filters as $filter){
		    $whereString = $whereString.' AND '.$filter->nome.' '.$filter->operatore.' '.$filter->valore;
	    }
	    $risultati = Alloggi::whereRaw($filters);
	    for($i=count($filters); $i>0; $i++){
		    foreach(getCombinations($filters, $i) as $combination){
			    //Trasformazione combinazione di k filtri in un where RAW
			    $whereString;
			    foreach($filters as $filter){
				    $whereString = $whereString.' AND '.$filter->nome.' '.$filter->operatore.' '.$filter->valore;
			    }
				    $risultati = $risultati->union(Alloggi::whereRaw($combination));
		    }
	    }
	    return $risultati->get();
    }
}
