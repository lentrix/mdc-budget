<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetItem extends Model
{
    protected $fillable = ['budget_id','item_id','custom_price','qty','remarks'];

    protected $appends = ['formattedCustomPrice','total','formattedTotal'];

    public function budget() {
        return $this->belongsTo('App\Models\Budget');
    }

    public function item() {
        return $this->belongsTo('App\Models\Item');
    }

    public function getFormattedCustomPriceAttribute() {
        return number_format($this->custom_price,2,'.',',');
    }

    public function getTotalAttribute() {
        return $this->qty * $this->custom_price;
    }

    public function getFormattedTotalAttribute() {
        return number_format($this->total,2,".",",");
    }
}
