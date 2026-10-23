<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    protected $fillable = [
        'name',
    ];

    public function fish(): HasMany {
        return $this->hasMany(Fish::class);
    }
}
