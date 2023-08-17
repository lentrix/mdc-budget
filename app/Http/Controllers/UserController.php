<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('full_name')->get();
        return inertia('Users/Index',[
            'users' => $users
        ]);
    }

    public function edit(User $user) {
        $assignedRoles = $user->getRoleNames();
        $availableRoles = Role::whereNotIn('name', $assignedRoles);
        return inertia('Users/Edit', [
            'user' => $user,
            'availableRoles' => $availableRoles->get(),
            'assignedRoles' => $assignedRoles
        ]);
    }

    public function update(User $user, Request $request) {
        $request->validate([
            'full_name' => 'required',
            'user_name' => 'required',
        ]);

        $user->update($request->only('user_name', 'full_name'));

        if($request->password) {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        return redirect('/users')->with('Info','The user has been updated.');
    }

    public function create() {
        return inertia('Users/Create');
    }

    public function store(Request $request) {
        $request->validate([
            'user_name' => 'required',
            'full_name' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'user_name' => $request->user_name,
            'full_name' => $request->full_name,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/users')->with('Info','User ' . $user->user_name . " has been created.");
    }

    public function assign(User $user, Request $request) {
        if(strcmp($request->action,'assign')==0) {
            //assign the role
            $user->assignRole($request->role);
            return back();
        }

        $user->removeRole($request->role);

        return back();
    }
}
