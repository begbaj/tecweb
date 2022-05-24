<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Inclusione extends Model
{
	protected $table = 'inclusioni';
	protected $primarykey = ['id_alloggio', 'id_servizio'];

	protected $guarded = ['id_alloggio', 'id_servizio'];

	public $timestamps = true;
}
