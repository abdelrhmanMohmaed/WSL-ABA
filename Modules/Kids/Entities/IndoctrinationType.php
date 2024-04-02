<?php

namespace Modules\Kids\Entities;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class IndoctrinationType extends Model
{
    protected $table = 'indoctrination_types';
    protected $fillable = [
        'name','color'
    ];
    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class, 'indoctrination_type_id', 'id');
    }

}
