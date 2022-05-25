<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
	protected $table = 'faq';
	protected $primarykey = 'id';

	protected $guarded = ['id'];

	public $timestamps = true;
}
