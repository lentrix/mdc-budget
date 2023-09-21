<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\ProcurementPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $budgets = Budget::whereHas('procurementPlan', function($q1) {
            $q1->where('active',1);
        })->get()
        ->map(function($budget, $idx) {
            return [
                'department' => $budget->department->name,
                'threshold' => $budget->department->threshold,
                'appropriation' => $budget->totalAppropriations,
                'user' => $budget->department->user->full_name,
                'departmentId' => $budget->department_id
            ];
        });

        return inertia('Procurement/Show',[
            'pp'=>$pp,
            'budgets' => $budgets
        ]);
    }

    public function activate(ProcurementPlan $pp) {
        DB::table('procurement_plans')->update(['active'=>0]);
        $pp->active=1;
        $pp->save();

        return redirect('/procurement-plans/' . $pp->id)->with('Info','This procurement plan has been activated.');
    }
}
