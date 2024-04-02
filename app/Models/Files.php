<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table = 'files';
   

	public function User()
	{
		return $this->belongsTo('App\Models\Customer','user_id','id');
	}
   
}
