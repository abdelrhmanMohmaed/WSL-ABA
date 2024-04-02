<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use URL;

class Customer extends Authenticatable
{
    use HasFactory;

    public function Files()
    {
        return $this->hasMany('App\Models\Files','user_id','id');
    }
    

    public function getAvatarUrlAttribute()
    {
        return URL::to('uploads/customers/avatar/'.$this->avatar);
    }


}
