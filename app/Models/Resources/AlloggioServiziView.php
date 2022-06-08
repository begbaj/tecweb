<?php


namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class AlloggioServiziView extends Model
{
    // RESOURCE MODEL DEFINITION
    protected $table = 'alloggio_servizi_view';
    protected $primarykey = 'id';

    protected $guarded = ['id'];

    public $timestamps = false;
    // RESOURCE MODEL DEFINITION
}
