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

    public function getItemsByType($type) {
        return BudgetItem::whereHas('item', function($q1) use ($type){
            $q1->whereHas('category', function($q2) use ($type){
                $q2->where('type', $type);
            });
        })->where('budget_id', $this->id)
        ->get()->map(function($bitem, $index) {
            return [
                'id' => $bitem->id,
                'item' => $bitem->item->item_name,
                'description' => $bitem->item->item_description,
                'price' => $bitem->custom_price,
                'regularPrice' => $bitem->item->regular_price,
                'qty' => $bitem->qty,
                'remarks' => $bitem->remarks
            ];
        });
    }

    public function summaryStatement($category) {
        return DB::table('budget_items')
            ->join('items','items.id','budget_items.item_id')
            ->join('categories','categories.id','items.category_id')
            ->where('budget_items.budget_id', $this->id)
            ->where('categories.type', $category)
            ->groupBy('category_name')
            ->select(DB::raw('categories.category_name, SUM(budget_items.custom_price * budget_items.qty) AS amount'))
            ->get();
    }

    public function getTotalAppropriationsAttribute() {
        return BudgetItem::where('budget_id', $this->id)
            ->select(DB::raw("SUM(qty * custom_price) AS 'amount'"))
            ->first()->amount;
    }
}
