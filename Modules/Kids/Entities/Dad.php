<?php

namespace Modules\Kids\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Dad extends Model
{
    protected $table = 'dads';

    protected $fillable = [
        'kid_id', 'name', 'num', 'date', 'marital_status', 'phone', 'learning', 'work',
        'smoking', 'smoking_com', 'obstruction', 'obstruction_com', 'chronic_diseases', 'chronic_diseases_com',
        'genetic_diseases', 'genetic_diseases_com', 'mental_state', 'mental_state_com', 'health_problems', 'health_problems_com',
        'communication', 'communication_com'
    ];

    public function kid(): BelongsTo
    {
        return $this->belongsTo(Kid::class, 'kid_id', 'id');
    }


}
