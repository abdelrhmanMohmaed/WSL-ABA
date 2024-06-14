<?php

namespace Modules\Kids\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Family extends Model
{
    protected $table = 'family';
    protected $fillable = [
        'kid_id', 'num_of', 'num_of_pro', 'num_of_sis', 'sort_of', 'bro_autism', 'has_twins', 'marital_status', 'with_live', 'income'
        , 'with_live_comm'
    ];

    public function kid(): BelongsTo
    {
        return $this->belongsTo(Kid::class, 'kid_id', 'id');
    }

}
