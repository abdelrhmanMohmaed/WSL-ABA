<?php

namespace Modules\Kids\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Mom extends Model
{
    protected $table = 'moms';
    protected $fillable = [
        'kid_id', 'name', 'num', 'date', 'marital_status', 'phone', 'learning', 'work',
        'smoking', 'obstruction', 'obstruction_com', 'chronic_diseases', 'chronic_diseases_com',
        'genetic_diseases', 'genetic_diseases_com', 'health_problems', 'health_problems_com',
        'mental_state', 'mental_state_com', 'communication', 'communication_com',
        'pregnancy', 'pregnancy_com', 'pregnancy_month', 'pregnancy_problems', 'pregnancy_problems_com',
        'birth_status', 'birth_problems', 'birth_problems_com', 'birth_after_problems', 'birth_after_problems_com', 'lactation'
    ];

    public function kid(): BelongsTo
    {
        return $this->belongsTo(Kid::class, 'kid_id', 'id');
    }


}
