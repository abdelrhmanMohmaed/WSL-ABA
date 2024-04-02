<?php

namespace Modules\Kids\Entities;

use Illuminate\Database\Eloquent\Model;


class Usersessions extends Model
{

    protected $table = 'user_sessions';

    public function Kid()
    {
        return $this->belongsTo('Modules\Kids\Entities\Kid', 'kid_id', 'id');
    }

    public function Customer()
    {
        return $this->belongsTo('App\Models\Customer', 'doctor_id', 'id');
    }

    public function session(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SessionK::class, 'session_id', 'id');
    }

    public function Appsessions()
    {
        return $this->hasMany('Modules\Kids\Entities\Appsessions', 'session_id', 'id');
    }

    public function Anssessions()
    {
        return $this->hasMany('Modules\Kids\Entities\Anssessions', 'session_id', 'id');
    }
}
