<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Alloggio extends Model
{
	protected $table = 'alloggi';
	protected $primarykey = 'id';

	protected $guarded = ['id'];

	public $timestamps = true;
}
