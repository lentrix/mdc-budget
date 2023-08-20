<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\ProcurementPlan;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index() {
        $user = auth()->user();

        $budgets = $user->budgets;

        return inertia('Budgets/Index',[
            'budgets'=>$budgets
        ]);
    }

    public function manage(Budget $budget) {
        $budget->load('department');
        return inertia('Budgets/Manage',[
            'budget'=>$budget
        ]);
    }
}
