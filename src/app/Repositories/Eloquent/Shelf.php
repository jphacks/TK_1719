<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    protected $fillable = [
        'name', 'description', 'owner_id', 'is_secret'
    ];

    public function users()
    {
        return $this->belongsToMany('App\Repositories\Eloqunet\User', 'user_shelf_pairs');
    }

    public function collections()
    {
        return $this->belongsToMany('App\Repositories\Eloquent\Collection');
    }
}
