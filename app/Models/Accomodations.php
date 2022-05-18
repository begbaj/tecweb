<?php

namespace App\Models;

class Accomodations{

    const DESCPROD = '<p>Appartamento bello bello</p>';

    protected $_accomodations;

    public function __construct() {
        $this->_accomodations = collect(
                array(
                    (object) array(
                        'appId' => '1',
                        'titolo' => 'Appartamento1',
                        'desc' => 'Questo è un appartamento',
                        'data_ins' => '17/05/2022',
                        'eta_min' => '18',
                        'eta max' => '25',
                        'genere' => 'tutti',
                        'prezzo' => '1000',
                        'superficie' => '200',
                        'data_max' => '1/01/2023',
                        'data_min' => '7/08/2022',
                        'prov' => 'Ancona',
                        'citta' => 'Ancona',
                        'indir' => 'via Crocioni 60',
                        'CAP' => '60131',
                        'posti_letto' => '4',
                        'tipologia' => 'app'
                    ),
                (object) array(
                        'appId' => '2',
                        'titolo' => 'PostoLetto2',
                        'desc' => 'Questo è un posto letto',
                        'data_ins' => '17/05/2022',
                        'eta_min' => '18',
                        'eta max' => '25',
                        'genere' => 'tutti',
                        'prezzo' => '1000',
                        'superficie' => '200',
                        'data_max' => '1/01/2023',
                        'data_min' => '7/08/2022',
                        'prov' => 'Ancona',
                        'citta' => 'Ancona',
                        'indir' => 'via Crocioni 60',
                        'CAP' => '60131',
                        'posti_letto' => '1',
                        'tipologia' => 'pl'
                    )
            )
        );
    }
    public function getAccomodations() {
        return $this->_accomodations;
    }
}
