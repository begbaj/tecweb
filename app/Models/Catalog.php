<?php

namespace App\Models;

use App\Models\Resources\Alloggio;
use App\Models\Resources\AlloggioServiziView as AlloggioServiziView;
use App\Models\Resources\Servizio;
use DateTime;
use App\Models\Resources\Messaggio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

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

    public function search($filters){
        if(
            "" != $filters->luogo and
            "" != $filters->eta_min and
            "" != $filters->eta_max and
            "" != $filters->sesso and
            "" != $filters->prezzo_min and
            "" != $filters->prezzo_max and
            "" != $filters->data_min and
            "" != $filters->data_max and
            "" != $filters->servizi) {
            
            return AlloggioServiziView::orderBy('created_at')->paginate(15);
        }

        Log::debug('LOCATARIO DATAMIN: ' . $filters->data_min);
        $data_min = date("Y-m-d",strtotime(str_replace('/', '-',$filters->data_min)));
        $data_max = date("Y-m-d",strtotime(str_replace('/', '-',$filters->data_max)));
        


        $thenFirst = "citta LIKE '" . ("" != $filters->luogo ? $filters->luogo . " %" : "%") . "' " .
            (("" != $filters->tipo) ?       "AND tipo = '" . $filters->tipo ."' " : "") .
            (("" != $filters->eta_min) ?    "AND eta_min = '" . $filters->eta_min ."' " : "") .
            (("" != $filters->eta_max) ?    "AND eta_max = '" . $filters->eta_max ."' " : "") .
            (("" != $filters->sesso) ?      "AND sesso = '" . $filters->sesso ."' "  : "") .
            (("" != $filters->prezzo_max) ? "AND prezzo <= '" . $filters->prezzo_max."' "  : "") .
            (("" != $filters->prezzo_min) ? "AND prezzo >= '" . $filters->prezzo_min."' "  : "") .
            (("" != $filters->data_min) ?   "AND data_min = '" . $data_min . "' "   : "") .
            (("" != $filters->data_max) ?   "AND data_max = '" . $data_max . "' "  : "") .
            (("" != $filters->camere) ?     "AND camere = '" . $filters->camere."' "  : "") .
            (("" != $filters->posti_letto) ? "AND posti_letto = '" . $filters->posti_letto."' "  : "");

        if(isset($filters->servizi))
        {
            $thenFirst .= " AND ( ";
            $first = true;
            foreach ($filters->servizi as $value) { 
                $thenFirst .= (!$first? " AND " : "") . "id_servizi LIKE '%" . $value . "%'";
                $first = false;
            }
            $thenFirst .= ") ";
        }
        Log::debug('LOCATARIO DATAMIN: ' . $thenFirst);

        $thenSecond = "citta LIKE '" . ("" != $filters->luogo ? $filters->luogo . "%" : "%") . "' " .
            (("" != $filters->tipo) ? "AND tipo = '" . $filters->tipo ."' " : "") .
            (("" != $filters->eta_min) ? "AND eta_min >= '" . $filters->eta_min ."' " : "") .
            (("" != $filters->eta_max) ? "AND eta_max <= '" . $filters->eta_max ."' " : "") .
            (("" != $filters->sesso) ? "AND sesso = '" . $filters->sesso ."' "  : "") .
            (("" != $filters->prezzo_max) ? "AND prezzo <= '" . $filters->prezzo_max."' "  : "") .
            (("" != $filters->prezzo_min) ? "AND prezzo >= '" . $filters->prezzo_min."' "  : "") .
            (("" != $filters->data_min) ? "AND data_min >= '" . $data_min ."' "   : "") .
            (("" != $filters->data_max) ? "AND data_max <= '" . $data_max ."' "  : "") .
            (("" != $filters->camere) ? "AND camere >= '" . $filters->camere."' "  : "") .
            (("" != $filters->posti_letto) ? "AND posti_letto >= '" . $filters->posti_letto."' "  : "");

        if(isset($filters->servizi))
        {
            $thenSecond .= " AND ( ";
            $first = true;
            foreach ($filters->servizi as $value) { 
                $thenSecond .= (!$first? " AND " : "") . "id_servizi LIKE '%" . $value . "%'";
                $first = false;
            }
            $thenSecond .= ") ";
        }
        $thenThird = "citta LIKE '" . ("" != $filters->luogo ? "%" . $filters->luogo . "%" : "%") . "' " .
            (("" != $filters->eta_min) ? "AND eta_min >= '" . $filters->eta_min ."' " : "") .
            (("" != $filters->eta_max) ? "AND eta_max <= '" . $filters->eta_max ."' " : "") .
            (("" != $filters->sesso) ? "AND sesso = '" . $filters->sesso ."' "  : "") .
            (("" != $filters->prezzo_max) ? "AND prezzo <= '" . $filters->prezzo_max."' "  : "") .
            (("" != $filters->prezzo_min) ? "AND prezzo >= '" . $filters->prezzo_min."' "  : "") .
            (("" != $filters->data_min) ? "AND data_min >= '" . $data_min ."' "   : "") .
            (("" != $filters->data_max) ? "AND data_max <= '" . $data_max ."' "  : "") .
            (("" != $filters->camere) ? "AND camere >= '" . $filters->camere."' "  : "") .
            (("" != $filters->posti_letto) ? "AND posti_letto >= '" . $filters->posti_letto."' "  : "");

        if(isset($filters->servizi))
        {
            $thenThird .= " AND ( ";
            $first = true;
            foreach ($filters->servizi as $value) { 
                $thenThird .= (!$first? " AND " : "") . "id_servizi LIKE '%" . $value . "%'";
                $first = false;
            }
            $thenThird .= ") ";
        }
        $thenFourth =" ( citta LIKE '" . ("" != $filters->luogo ? "%" . $filters->luogo . "%" : "%") . "' " .
            " OR provincia LIKE '" . ("" != $filters->luogo ? $filters->luogo  : "%") . "') " .
            (("" != $filters->eta_min) ? "AND eta_min >= '" . $filters->eta_min ."' " : "") .
            (("" != $filters->eta_max) ? "AND eta_max <= '" . $filters->eta_max ."' " : "") .
            (("" != $filters->sesso) ? "AND sesso = '" . $filters->sesso ."' "  : "") .
            (("" != $filters->prezzo_max) ? "AND prezzo <= '" . $filters->prezzo_max."' "  : "") .
            (("" != $filters->prezzo_min) ? "AND prezzo >= '" . $filters->prezzo_min."' "  : "") .
            (("" != $filters->camere) ? "AND camere >= '" . $filters->camere."' "  : "") .
            (("" != $filters->posti_letto) ? "AND posti_letto >= '" . $filters->posti_letto."' "  : "");
        if(isset($filters->servizi))
        {
            $thenFourth .= " AND ( ";
            $first = true;
            foreach ($filters->servizi as $value) { 
                $thenFourth .= (!$first? " AND " : "") . "id_servizi LIKE '%" . $value . "%'";
                $first = false;
            }
            $thenFourth .= ") ";
        }
        $thenFifth = " CONCAT(citta, ' ' , provincia, ' ', indirizzo, ' ', cap) LIKE '" . ("" != $filters->luogo ? "%" . $filters->luogo . "%" : "%") . "' " .
            (("" != $filters->eta_min) ? "OR eta_min >= '" . $filters->eta_min ."' " : "") .
            (("" != $filters->eta_max) ? "OR eta_max <= '" . $filters->eta_max ."' " : "") .
            (("" != $filters->sesso) ? "OR sesso = '" . $filters->sesso ."' "  : "") .
            (("" != $filters->prezzo_max) ? "OR prezzo <= '" . $filters->prezzo_max."' "  : "") .
            (("" != $filters->prezzo_min) ? "OR prezzo >= '" . $filters->prezzo_min."' "  : "") .
            (("" != $filters->camere) ? "OR camere >= '" . $filters->camere."' "  : "") .
            (("" != $filters->posti_letto) ? "OR posti_letto >= '" . $filters->posti_letto."' "  : "");


        Log::debug('LOCATARIO FIRST: '  . $thenFirst);
        Log::debug('LOCATARIO SECOND: ' . $thenSecond);
        Log::debug('LOCATARIO THIRD: '  . $thenThird);
        Log::debug('LOCATARIO FOURTH: ' . $thenFourth);
        Log::debug('LOCATARIO FIFTH: '  . $thenFifth);

        return AlloggioServiziView::select('*')
                 ->orderByRaw("CASE " .
                     " WHEN " . $thenFirst . " THEN 1" .
                     " WHEN " . $thenSecond . " THEN 2" .
                     " WHEN " . $thenThird . " THEN 3" .
                     " WHEN " . $thenFourth . " THEN 4" .
                     " WHEN " . $thenFifth . " THEN 5" .
                     " ELSE 10 END ASC")
                ->paginate(15);
    }

}
