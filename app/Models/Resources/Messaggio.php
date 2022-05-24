<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Messaggio extends Model
{
	protected $table = 'messaggi';
	protected $primarykey = 'id';

	protected $guarded = ['id'];

	public $timestamps = true;
}
