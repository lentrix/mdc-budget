<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('full_name')->get();
        return inertia('Users/Index',[
            'users' => $users
        ]);
    }

    public function edit(User $user) {
        return inertia('Users/Edit', [
            'user' => $user
        ]);
    }
}
