<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
