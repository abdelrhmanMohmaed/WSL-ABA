<?php

namespace Modules\Kids\Entities;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Goal extends Model
{
    protected $table = 'goals';

    protected $fillable = [
        'kid_id','customer_id','appeal_id', 'status','mastery','target','stimulus','description'
    ];

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class, 'goal_id', 'id');
    }
    public function kid(): BelongsTo
    {
        return $this->belongsTo(Kid::class, 'kid_id', 'id');
    }
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function appeal(): BelongsTo
    {
        return $this->belongsTo(Appale_Num::class, 'appeal_id', 'id');
    }
}
