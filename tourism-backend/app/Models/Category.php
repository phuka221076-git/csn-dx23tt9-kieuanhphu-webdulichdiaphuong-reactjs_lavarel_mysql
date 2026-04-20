<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name', 'slug'];

    public function locations()
    {
        // Một danh mục có nhiều địa điểm
        return $this->hasMany(Location::class);
    }
}
