
<!-- 
<center>
{{--
<div>
    <img src="{{asset('img/brand/logo-colored_1.jpg')}}"  alt= "" width="80" height="80"> 
</div>
</center>
--}}
<br>
<br>
<br>
-->

<strong>Oggetto: conferma di opzione per l'alloggio {{$alloggio_id}}.</strong>
<br>
<br>

Gentile {{$nome_locatario}} {{$cognome_locatario}} nato il {{substr($eta_locatario, 0, -9)}},


<p> Le comunico che la richiesta di opzionamento di {{substr(str_replace('_', ' ', $alloggio_tipo),2,-2)}} 
    @php
        if (substr($alloggio_tipo,1,-1) != 'posto_letto'){
        echo "(con " .substr($alloggio_posti_letto,1,-1). " posti letto e " .substr($alloggio_camere,1,-1)." camere)";}
    @endphp
    n°: {{$alloggio_id}}, titolo: {{substr($alloggio_titolo,1,-1)}} in {{substr($alloggio_indirizzo,1,-1)}}, {{substr($alloggio_citta,1,-1)}}, 
    {{substr($alloggio_provincia,1,-1)}} e di {{substr($alloggio_superficie,1,-1)}} metri quadrati è stata confermata. </p>
<p> Le ricordo che il canone di affitto è pari a {{sprintf("%.2f",substr($alloggio_prezzo,1,-1))}} &euro; al mese e che il suo periodo di permanenza è limitato tra
il {{substr($alloggio_data_min, 2, -11)}} e il {{substr($alloggio_data_max, 2, -11)}}.</p>


Cordiali saluti, {{$nome_locatore}} {{$cognome_locatore}}.
<br>
<br>
<br>
<p>
Firma:
<br>
<br>
<hr style="width:25%;text-align:left;margin-left:0">
</p>
