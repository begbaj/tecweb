<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = 'faq';
    protected $primaryKey = 'id';
    
    public function getQuestion() {
        return $this->domanda;  
    }
    
    public function getAnswer(){
        return $this->risposta;
    }
}