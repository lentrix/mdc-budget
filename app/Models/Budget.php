<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Budget extends Model
{
    protected $fillable = ['procurement_plan_id','department_id','notes','status'];

    public function procurementPlan() {
        return $this->belongsTo('App\Models\ProcurementPlan');
    }

    public function department() {
        return $this->belongsTo('App\Models\Department');
    }

    public function approvedBy() {
        return $this->belongsTo('App\Models\User','approved_by','id');
    }

    public function categoryTotal($category) {
        return DB::table('budget_items')
            ->join('items','items.id','budget_items.item_id')
            ->join('categories','categories.id','items.category_id')
            ->where('budget_items.budget_id', $this->id)
            ->where('categories.type', $category)
            ->sum(DB::raw('budget_items.custom_price * budget_items.qty'));
    }
}
