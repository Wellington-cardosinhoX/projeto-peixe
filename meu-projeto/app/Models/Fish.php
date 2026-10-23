<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    protected $table = 'fish';
    
    protected $fillable = [
        'type_id',
        'name',
        'color'
    ];

    public function type(): BelongsTo {
        return $this->belongsTo(Type::class);
    }
}
