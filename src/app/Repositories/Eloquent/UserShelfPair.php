<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

class UserShelfPair extends Model
{
    protected $fillable = [
        'user_id', 'shelf_id', 'is_favorite'
    ];

    public function users()
    {
        return $this->hasOne('App\Repositories\Eloqunet\User', 'id', 'user_id');
    }

    public function shelves()
    {
        return $this->hasOne('App\Repositories\Eloqunet\Shelf', 'id', 'shelf_id');
    }
}
