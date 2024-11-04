<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    use HasFactory;

    protected $table = 'populations';

    // Define the relationship with Town
    public function town()
    {
        return $this->belongsTo(Town::class, 'townid', 'id');
    }
}
