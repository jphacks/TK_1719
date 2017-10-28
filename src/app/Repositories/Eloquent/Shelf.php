<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    protected $fillable = [
        'name', 'description', 'owner_id'
    ];

    public function users()
    {
        return $this->belongsToMany('App\Repositories\Eloqunet\User');
    }
}
