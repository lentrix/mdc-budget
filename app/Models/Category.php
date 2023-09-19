<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $fillable = ['category_name','category_description','type'];

    protected $appends = ['total','formattedTotal'];

    public function items() {
        return $this->hasMany('App\Models\Item');
    }

    public function getTotalAttribute() {
        return DB::table('budget_items')
            ->join('items','budget_items.item_id','items.id')
            ->join('categories','items.category_id','categories.id')
            ->join('budgets','budget_items.budget_id','budgets.id')
            ->join('procurement_plans','budgets.procurement_plan_id','procurement_plans.id')
            ->where('categories.id', $this->id)
            ->where('procurement_plans.active',1)
            ->select(DB::raw("SUM(budget_items.qty * budget_items.custom_price) AS 'total'"))
            ->first()->total;
    }

    public function getFormattedTotalAttribute() {
        return number_format($this->total, 2, '.',',');
    }
}
