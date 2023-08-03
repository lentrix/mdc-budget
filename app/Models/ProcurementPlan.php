<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcurementPlan extends Model
{
    protected $fillable = ['title','period_start','period_end','prep_start','prep_end','remarks'];


}
