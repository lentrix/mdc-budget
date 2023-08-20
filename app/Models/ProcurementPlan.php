<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcurementPlan extends Model
{
    protected $fillable = ['title','year','prep_start','prep_end','remarks'];

    public $casts = [
        'period_start' => 'datetime'
    ];

    public static function getActive() {
        return static::where('active',1)->first();
    }
}
