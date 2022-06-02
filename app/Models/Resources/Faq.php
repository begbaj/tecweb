<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
	protected $table = 'faq';
	protected $primarykey = 'id';

	protected $guarded = ['id'];

	public $timestamps = true;


public function insert_faq($question,$answer){
    $faq = new Faq;
    $faq->domanda = $question;
    $faq->risposta = $answer;
    $faq->ordine = $this->count_faq();
    $faq->save();
    $allfaqs = $faq->all();
    return $allfaqs;
}

public function count_faq()
{
    $faq = new Faq;
    $faq = $faq->all()->count();
    return $faq;
}

public function delete_faq(){
    
}

public function modify_faq(){
    
}
        
        
}        