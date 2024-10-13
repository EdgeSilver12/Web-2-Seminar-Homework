<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $table = 'counties'; // Specify the table if needed

    public function towns()
    {
        return $this->hasMany(Town::class, 'countyid');
    }
}
