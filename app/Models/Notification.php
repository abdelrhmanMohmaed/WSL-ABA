<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Date;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';

    protected $appends = [
        'date'
    ];

    public function getDateAttribute()
    {
        return Date::parse($this->created_at)->format('Y-m-d | h:i');
        // return Date::parse($this->created_at)->format('Y/m/d');
    }
}
