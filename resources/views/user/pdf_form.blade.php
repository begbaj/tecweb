
Gentile {{$nome_locatario}} {{$cognome_locatario}} nato il {{substr($eta_locatario, 0, -8)}},


<p> Le comunico che la richiesta di opzionamento di {{substr(str_replace('_', ' ', $alloggio_tipo),2,-2)}} 
    @php
        if (substr($alloggio_tipo,1,-1) != 'posto_letto'){
        echo "(con posti letto " .substr($alloggio_posti_letto,1,-1) .")";}
    @endphp
    n°:{{$alloggio_id}}, titolo:{{substr($alloggio_titolo,1,-1)}} in {{substr($alloggio_indirizzo,1,-1)}}, {{substr($alloggio_citta,1,-1)}}, 
    {{substr($alloggio_provincia,1,-1)}} e di {{substr($alloggio_superficie,1,-1)}} metri quadrati è stata confermata. </p>
<p> Le ricordo che il canone di affitto è pari a {{substr($alloggio_prezzo,1,-1)}} &euro; al mese e che il suo periodo di permanenza è limitato tra
il {{substr($alloggio_data_min, 2, -10)}} e {{substr($alloggio_data_max, 2, -10)}}.</p>


Cordiali saluti, {{$nome_locatore}} {{$cognome_locatore}}.

<!--

<br>
<br>
<br>
<div> <img src="{{public_path('./img/brand/logo-colored_1.jpg')}}"  alt= "" width="200" height="80"> </div>
-->