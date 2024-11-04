<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;

    protected $table = 'towns';

    // Define the relationship with County
    public function county()
    {
        return $this->belongsTo(County::class, 'countyid', 'id');
    }

    // Define the relationship with Population
    public function populations()
    {
        return $this->hasMany(Population::class, 'townid', 'id');
    }
}
