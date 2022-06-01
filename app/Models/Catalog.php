<?php

namespace App;

use App\Models\Resources\Alloggio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Catalog extends Model
{
    public function getAll($number=0){
        $alloggi = new Alloggio;
    }
}
