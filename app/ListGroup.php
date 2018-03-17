<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListGroup extends Model
{
    public function users()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }

    public function mycollection()
    {
        return $this->belongsTo(\App\ListGroup::class, 'id', 'group_id');
    }

}
