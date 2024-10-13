<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Town extends Model
{
    protected $table = 'towns'; // Specify the table if needed

    public function county()
    {
        return $this->belongsTo(County::class, 'countyid');
    }

    public function populations()
    {
        return $this->hasMany(Population::class, 'townid');
    }
}