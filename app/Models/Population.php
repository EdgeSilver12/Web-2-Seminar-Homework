<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Population extends Model
{
    protected $table = 'populations'; // Specify the table if needed

    public function town()
    {
        return $this->belongsTo(Town::class, 'townid');
    }
}
