<?php

namespace Modules\Kids\Entities;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Session extends Model
{
    protected $table = 'sessions';

    protected $fillable = [
        'kid_id','customer_id','goal_id','indoctrination_type_id','percentage','description'
    ];

    public function kid(): BelongsTo
    {
        return $this->belongsTo(Kid::class, 'kid_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function goal(): BelongsTo
    {
        return $this->belongsTo(Goal::class, 'goal_id', 'id');
    }

    public function IndoctrinationType(): BelongsTo
    {
        return $this->belongsTo(IndoctrinationType::class,'indoctrination_type_id','id');
    }
}
