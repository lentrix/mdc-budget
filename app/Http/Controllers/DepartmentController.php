<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index() {
        $depts = Department::orderBy('name')->get();

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
}
