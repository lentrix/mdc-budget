<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['item_name','item_description','unit','regular_price'];

    public function getFormattedRegularPriceAttribute() {
        return number_format($this->regular_price,2,".",",");
    }
}
