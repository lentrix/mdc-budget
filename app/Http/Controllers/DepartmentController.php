<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index() {
        $depts = Department::orderBy('name')
            ->get()
            ->map(function($dept, $index) {
                return [
                    'id'=>$dept->id,
                    'departmentName' => $dept->name,
                    'threshold' => $dept->threshold,
                    'appropriations' => $dept->activeBudget?->totalAppropriations,
                    'inCharge' => $dept->user->full_name,
                ];
            });

        return inertia('Departments/Index',[
            'depts' => $depts
        ]);
    }

    public function create() {
        $users = User::orderBy('full_name')->get();
        return inertia('Departments/Create',[
            'users' => $users
        ]);
    }

    public function store(Request $request) {
        $fields = $request->validate([
            'name' => 'required',
            'threshold' => 'numeric|required',
            'user_id' => 'integer|required'
        ]);

        Department::create($fields);

        return redirect('/departments')->with('Info','A new department has been created.');
    }

    public function show(Department $dept) {
        $dept->load('user');
        return inertia('Departments/Show',[
            'dept' => $dept,
            'opex' => $dept->activeBudget->getItemsByType('opex'),
            'capex' => $dept->activeBudget->getItemsByType('capex'),
            'opexTotal' => $tot_opex = $dept->activeBudget->categoryTotal('opex'),
            'capexTotal' => $tot_capex = $dept->activeBudget->categoryTotal('capex'),
            'total' => ($tot_opex+$tot_capex)
        ]);
    }

    public function edit(Department $dept) {
        $users = User::orderBy('full_name')->get();
        return inertia('Departments/Edit', [
            'dept' => $dept,
            'users' => $users
        ]);
    }

    public function update(Request $request, Department $dept) {
        $fields = $request->validate([
            'name' => 'required',
            'threshold'=>'numeric|required',
            'user_id'=>'integer|required'
        ]);

        $dept->update($fields);

        return redirect('/departments/' . $dept->id)->with('Info','This department has been updated.');
    }
}
