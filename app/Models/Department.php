<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name','threshold','user_id'];

    protected $appends = ['formattedThreshold'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function getFormattedThresholdAttribute() {
        return number_format($this->threshold, 2,".",",");
    }

    public function getActiveBudgetAttribute() {
        return Budget::where('department_id', $this->id)
                ->whereHas('procurementPlan', function($q1) {
                    $q1->where('active',1);
                })->first();
    }
}
