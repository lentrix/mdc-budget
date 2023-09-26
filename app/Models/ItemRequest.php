<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemRequest extends Model
{
    protected $guarded = [];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function requestedBy() {
        return $this->belongsTo('App\Models\User','requested_by','id');
    }

}
