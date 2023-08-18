<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcurementPlan extends Model
{
    protected $fillable = ['title','period_start','period_end','prep_start','prep_end','remarks'];

    protected $appends = ['period_start_str'];

    public $casts = [
        'period_start' => 'datetime'
    ];

    public function getPeriodStartStrAttribute() {
        return $this->period_start->format('M-d-Y');
    }
}
