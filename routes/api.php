<?php

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/items/search', function(Request $request) {
    $items = Item::where('item_name','like',"%$request->name%");
    return response()->json($items->limit(50)->get());
});

Route::get('/user-roles/{role}', function(Role $role) {
    return response()->json($role->permissions->pluck('name'));
});
