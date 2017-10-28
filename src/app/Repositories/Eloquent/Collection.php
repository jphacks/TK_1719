<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = [
        'url', 'title', 'image', 'shelf_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\Repositories\Eloqunet\User');
    }

    public function shelf()
    {
        return $this->belongsTo('App\Repositories\Eloquent\Shelf', 'shelf_id');
    }
}
