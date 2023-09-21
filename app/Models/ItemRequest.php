<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemRequest extends Model
{
    protected $guarded = [];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function requestBy() {
        return $this->belongsTo('App\Users','requested_by','id');
    }

}
