<?php

namespace App\Http\Controllers;

use App\Models\ProcurementPlan;
use Illuminate\Http\Request;

class ProcurementPlanController extends Controller
{
    public function index() {
        $pps = ProcurementPlan::orderBy('period_start','desc')->get();
        return inertia('Procurement/Index', [
            'pps' => $pps
        ]);
    }
}
