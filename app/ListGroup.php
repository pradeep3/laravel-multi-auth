<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ListGroup extends Model
{
    use Searchable;

    public function users()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }

    public function mycollection()
    {
        return $this->belongsTo(\App\ListGroup::class, 'id', 'group_id');
    }

    public function searchableAs()
    {
        return 'list_groups_index';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        return $array;
    }
}
