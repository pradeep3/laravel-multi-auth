<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyCollection extends Model
{
    public function users()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }

    public function groups()
    {
        return $this->hasMany(\App\ListGroup::class, 'id', 'group_id');
    }

    public function listings()
    {
        return $this->hasMany(\App\Listing::class, 'id', 'list_id');
    }
}
