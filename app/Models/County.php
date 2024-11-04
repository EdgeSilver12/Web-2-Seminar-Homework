<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;

    protected $table = 'counties';

    // Define the relationship with Town
    public function towns(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Town::class, 'countyid', 'id');
    }
}
