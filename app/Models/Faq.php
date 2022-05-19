<?php


namespace App\Models;

class Faq{

    protected $_faq;

    public function __construct() {
        $this->_faq = collect(
                array(
                    (object) array(
                        'domanda' => 'Come faccio ad accedere?',
                        'risposta' => 'Clicca sul bottone',                      
                    ),
                (object) array(
                        'domanda' => 'Come faccio ad iscrivermi?',
                        'risposta' => 'Clicca sul bottone',  
                    )
            )
        );
    }
    public function getFaq() {
        return $this->_faq;
    }
}
