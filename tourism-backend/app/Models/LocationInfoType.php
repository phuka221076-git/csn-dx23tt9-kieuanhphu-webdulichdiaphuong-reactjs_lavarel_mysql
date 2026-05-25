<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationInfoType extends Model
{
    protected $fillable = ['name', 'slug', 'icon'];

    public function contents()
    {
        return $this->hasMany(LocationContent::class, 'info_type_id');
    }
}