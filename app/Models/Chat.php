<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';
    public function oneUser()
	{
		return $this->belongsTo('App\Models\User','one_id','id');
	}
    public function towUser()
	{
		return $this->belongsTo('App\Models\User','tow_id','id');
	}

    public function Massages()
    {
        return $this->hasMany('App\Models\Massage','chat_id','id');
    }
}
