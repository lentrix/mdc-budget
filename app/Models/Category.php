<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name','category_description','type'];

    protected $appends = ['total','formattedTotal'];

    public function items() {
        return $this->hasMany('App\Models\Item');
    }

    public function getTotalAttribute() {
        $activePP = ProcurementPlan::getActive();
        //for implementation....
        return 1230;
    }

    public function getFormattedTotalAttribute() {
        return number_format($this->total, 2, '.',',');
    }
}
