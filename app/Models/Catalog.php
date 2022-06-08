<?php

namespace App\Models;

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
	    $opzioni = Messaggio::whereRaw('id_alloggio = ? AND (id_mittente=? OR id_destinatario=?)', [$alloggioId, $userId, $userId])->orderBy('data_conferma_opzione');
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
            "" != $filters->servs) {
            
            return Alloggio::query()
                ->select('alloggi.id', 'alloggi.citta', 'alloggi.descrizione', 'alloggi.created_at', 'alloggi.tipo')->selectRaw('GROUP_CONCAT(DISTINCT servizi.id) servs')
                ->join('inclusioni', 'alloggi.id', '=', 'inclusioni.id_alloggio')  
                ->join('servizi', 'servizi.id', '=', 'inclusioni.id_servizio') 
                ->groupBy('alloggi.id' ,'alloggi.citta', 'alloggi.descrizione', 'alloggi.created_at', 'alloggi.tipo')->paginate(15);
        }

        Log::debug('LOCATARIO DATAMIN: ' . $filters->data_min);
        $data_min = date("Y-m-d",strtotime(str_replace('/', '-',$filters->data_min)));
        $data_max = date("Y-m-d",strtotime(str_replace('/', '-',$filters->data_max)));

        $thenFirst = "WHEN ".
            "CONCAT(alloggi.citta, ' ' , alloggi.provincia, ' ', alloggi.indirizzo, ' ', alloggi.cap) LIKE '" . ("" != $filters->luogo ? "%" . $filters->luogo . "%" : "%") . "' " .
            (("" != $filters->tipo) ? "AND alloggi.tipo = '" . $filters->tipo ."' " : "") .
            (("" != $filters->eta_min) ? "AND alloggi.eta_min = '" . $filters->eta_min ."' " : "") .
            (("" != $filters->eta_max) ? "AND alloggi.eta_max = '" . $filters->eta_max ."' " : "") .
            (("" != $filters->sesso) ? "AND alloggi.sesso = '" . $filters->sesso ."' "  : "") .
            (("" != $filters->prezzo_max) ? "AND alloggi.prezzo <= '" . $filters->prezzo_max."' "  : "") .
            (("" != $filters->prezzo_min) ? "AND alloggi.prezzo >= '" . $filters->prezzo_min."' "  : "") .
            (("" != $filters->data_min) ? "AND alloggi.data_min = '" . $data_min . "' "   : "") .
            (("" != $filters->data_max) ? "AND alloggi.data_max = '" . $data_max . "' "  : "") .
            (("" != $filters->camere) ? "AND alloggi.camere = '" . $filters->camere."' "  : "") .
            (("" != $filters->posti_letto) ? "AND alloggi.posti_letto = '" . $filters->posti_letto."' "  : "") .
            (("" != $filters->servs) ? "AND " . $filters->servs . " IN servs " : "").
            "THEN 1";

        $thenSecond = "WHEN ".
            "CONCAT(alloggi.citta, ' ' , alloggi.provincia, ' ', alloggi.indirizzo, ' ', alloggi.cap) LIKE '" . ("" != $filters->luogo ? "%" . $filters->luogo . "%" : "%") . "' " .
            (("" != $filters->tipo) ? "AND alloggi.tipo = '" . $filters->tipo ."' " : "") .
            (("" != $filters->eta_min) ? "AND alloggi.eta_min >= '" . $filters->eta_min ."' " : "") .
            (("" != $filters->eta_max) ? "AND alloggi.eta_max <= '" . $filters->eta_max ."' " : "") .
            (("" != $filters->sesso) ? "AND alloggi.sesso = '" . $filters->sesso ."' "  : "") .
            (("" != $filters->prezzo_max) ? "AND alloggi.prezzo <= '" . $filters->prezzo_max."' "  : "") .
            (("" != $filters->prezzo_min) ? "AND alloggi.prezzo >= '" . $filters->prezzo_min."' "  : "") .
            (("" != $filters->data_min) ? "AND alloggi.data_min >= '" . $data_min ."' "   : "") .
            (("" != $filters->data_max) ? "AND alloggi.data_max <= '" . $data_max ."' "  : "") .
            (("" != $filters->camere) ? "AND alloggi.camere >= '" . $filters->camere."' "  : "") .
            (("" != $filters->posti_letto) ? "AND alloggi.posti_letto >= '" . $filters->posti_letto."' "  : "") .
            (("" != $filters->servs) ? "AND " . $filters->servs . " ANY servs " : "").
            "THEN 2";

        $thenThird = "WHEN ".
            "CONCAT(alloggi.citta, ' ' , alloggi.provincia, ' ', alloggi.indirizzo, ' ', alloggi.cap) LIKE '" . ("" != $filters->luogo ? "%" . $filters->luogo . "%" : "%") . "' " .
            (("" != $filters->eta_min) ? "AND alloggi.eta_min >= '" . $filters->eta_min ."' " : "") .
            (("" != $filters->eta_max) ? "AND alloggi.eta_max <= '" . $filters->eta_max ."' " : "") .
            (("" != $filters->sesso) ? "AND alloggi.sesso = '" . $filters->sesso ."' "  : "") .
            (("" != $filters->prezzo_max) ? "AND alloggi.prezzo <= '" . $filters->prezzo_max."' "  : "") .
            (("" != $filters->prezzo_min) ? "AND alloggi.prezzo >= '" . $filters->prezzo_min."' "  : "") .
            (("" != $filters->data_min) ? "AND alloggi.data_min >= '" . $data_min ."' "   : "") .
            (("" != $filters->data_max) ? "AND alloggi.data_max <= '" . $data_max ."' "  : "") .
            (("" != $filters->camere) ? "AND alloggi.camere >= '" . $filters->camere."' "  : "") .
            (("" != $filters->posti_letto) ? "AND alloggi.posti_letto >= '" . $filters->posti_letto."' "  : "") .
            (("" != $filters->servs) ? "AND " . $filters->servs . " ANY servs " : "").
            "THEN 3";


        $thenFourth = "WHEN ".
            "CONCAT(alloggi.citta, ' ' , alloggi.provincia, ' ', alloggi.indirizzo, ' ', alloggi.cap) LIKE '" . ("" != $filters->luogo ? "%" . $filters->luogo . "%" : "%") . "' " .
            (("" != $filters->eta_min) ? "AND alloggi.eta_min >= '" . $filters->eta_min ."' " : "") .
            (("" != $filters->eta_max) ? "AND alloggi.eta_max <= '" . $filters->eta_max ."' " : "") .
            (("" != $filters->sesso) ? "AND alloggi.sesso = '" . $filters->sesso ."' "  : "") .
            (("" != $filters->prezzo_max) ? "AND alloggi.prezzo <= '" . $filters->prezzo_max."' "  : "") .
            (("" != $filters->prezzo_min) ? "AND alloggi.prezzo >= '" . $filters->prezzo_min."' "  : "") .
            (("" != $filters->camere) ? "AND alloggi.camere >= '" . $filters->camere."' "  : "") .
            (("" != $filters->posti_letto) ? "AND alloggi.posti_letto >= '" . $filters->posti_letto."' "  : "") .
            (("" != $filters->servs) ? "AND " . $filters->servs . " ANY servs " : "").
            "THEN 4";

        $thenFifth = "WHEN ".
            "CONCAT(alloggi.citta, ' ' , alloggi.provincia, ' ', alloggi.indirizzo, ' ', alloggi.cap) LIKE '" . ("" != $filters->luogo ? "%" . $filters->luogo . "%" : "%") . "' " .
            (("" != $filters->eta_min) ? "OR alloggi.eta_min >= '" . $filters->eta_min ."' " : "") .
            (("" != $filters->eta_max) ? "OR alloggi.eta_max <= '" . $filters->eta_max ."' " : "") .
            (("" != $filters->sesso) ? "OR alloggi.sesso = '" . $filters->sesso ."' "  : "") .
            (("" != $filters->prezzo_max) ? "OR alloggi.prezzo <= '" . $filters->prezzo_max."' "  : "") .
            (("" != $filters->prezzo_min) ? "OR alloggi.prezzo >= '" . $filters->prezzo_min."' "  : "") .
            (("" != $filters->camere) ? "OR alloggi.camere >= '" . $filters->camere."' "  : "") .
            (("" != $filters->posti_letto) ? "OR alloggi.posti_letto >= '" . $filters->posti_letto."' "  : "") .
            (("" != $filters->servs) ? "OR " . $filters->servs . " ANY servs " : "").
            "THEN 5";

        Log::debug('LOCATARIO FIRST: ' . $thenFirst);
        Log::debug('LOCATARIO SECOND: ' . $thenSecond);
        Log::debug('LOCATARIO THIRD: ' . $thenThird);
        Log::debug('LOCATARIO FOURTH: ' . $thenFourth);
        Log::debug('LOCATARIO FIFTH: ' . $thenFifth);

        return Alloggio::query()
            ->select('alloggi.id', 'alloggi.citta', 'alloggi.descrizione', 'alloggi.created_at', 'alloggi.tipo')->selectRaw('GROUP_CONCAT(DISTINCT servizi.id) servs')
            ->join('inclusioni', 'alloggi.id', '=', 'inclusioni.id_alloggio')  
            ->join('servizi', 'servizi.id', '=', 'inclusioni.id_servizio') 
            ->groupBy('alloggi.id' ,'alloggi.citta', 'alloggi.descrizione', 'alloggi.created_at', 'alloggi.tipo')
            ->orderByRaw("CASE " . $thenFirst . " " .$thenSecond . " " . $thenThird . " " . $thenFourth . " " . $thenFifth . " ELSE 100 END")->orderby('alloggi.created_at', "DESC")->paginate(15);
    }

}
