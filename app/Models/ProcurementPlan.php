<?php

namespace App\Models;

use Carbon\Carbon;
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

    /**
     * get the Procurement Plan that is still
     * within the preparation period.
     */
    public static function getPrepPeriod() {
        $now = Carbon::now();
        return static::where('prep_start','<', $now)
                ->where('prep_end', '>', $now)->first();
    }
}
