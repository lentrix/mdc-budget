<?php

namespace App\Http\Controllers;

use App\Models\ProcurementPlan;
use Illuminate\Http\Request;

class ProcurementPlanController extends Controller
{
    public function index() {
        $pps = ProcurementPlan::orderBy('prep_start','desc')->get();
        return inertia('Procurement/Index', [
            'pps' => $pps
        ]);
    }

    public function create() {
        return inertia('Procurement/Create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'year'=>'integer|required',
            'prep_start' => 'required',
            'prep_end' => 'required',
        ]);

        ProcurementPlan::create($request->all());

        return redirect('/procurement-plans')->with('Info','A new procurement plan has been created.');
    }

    public function show(ProcurementPlan $pp) {
        return inertia('Procurement/Show',[
            'pp'=>$pp
        ]);
    }
}
