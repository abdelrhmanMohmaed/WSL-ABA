<?php

namespace Modules\Kids\Entities;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Favorite extends Model
{
    protected $table = 'favorite';
    protected $fillable = [
        'kid_id','customer_id','create_date',
        'frist_instruction', 'second_instruction', 'third_instruction', 'fourth_instruction',
        'frist_name', 'second_name', 'third_name', 'fourth_name', 'fifth_name', 'sixth_name',
        'frist_percentage', 'second_percentage', 'third_percentage', 'fourth_percentage', 'fifth_percentage', 'sixth_percentage',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
