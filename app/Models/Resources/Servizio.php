<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Servizio extends Model
{
	protected $table = 'servizi';
	protected $primarykey = 'id';

	protected $guarded = ['id'];

	public $timestamps = true;
}
