<?php

namespace Modules\Kids\Entities;

use App\Models\City;
use App\Models\Country;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Kid extends Model
{
    protected $table = 'kids';
    protected $fillable = [
        'doctor_id', 'city_id', 'country_id',
        'name', 'num', 'date', 'place_date', 'area', 'gender',
        'other_obstruction', 'other_obstruction_com', 'chronic_diseases', 'chronic_diseases_com',
        'genetic_diseases', 'genetic_diseases_com', 'health_problems', 'health_problems_com',
        'growth_stage', 'growth_stage_com'
    ];

    public function userSessions(): HasMany
    {
        return $this->hasMany(Usersessions::class, 'kid_id', 'id');
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class, 'kid_id', 'id');
    }

    public function dad(): HasOne
    {
        return $this->hasOne(Dad::class, 'kid_id', 'id');
    }

    public function mom(): HasOne
    {
        return $this->hasOne(Mom::class, 'kid_id', 'id');
    }

    public function family(): HasOne
    {
        return $this->hasOne(Family::class, 'kid_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'doctor_id', 'id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function goals(): HasMany
    {
        return $this->hasMany(Goal::class, 'kid_id', 'id');
    }

}
