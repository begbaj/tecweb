<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class Faq extends Model
{
	protected $table = 'faq';
	protected $primarykey = 'id';

	protected $guarded = ['id'];

	public $timestamps = true;
}
=======
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
>>>>>>> d480c018321e1857ad1db207724d54a7c44294f4
