<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['item_name','item_description','unit','regular_price','category_id'];

    protected $appends = ['formattedRegularPrice','categoryName'];

    public function getFormattedRegularPriceAttribute() {
        return number_format($this->regular_price,2,".",",");
    }

    public function getCategoryNameAttribute() {
        return $this->category->category_name;
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
}
