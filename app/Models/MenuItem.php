<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = ['name', 'url', 'parent_id'];

    // Relationship to get child menu items
    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id');
    }
}
