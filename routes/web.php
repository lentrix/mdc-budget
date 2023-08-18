<?php

use App\Http\Controllers\ProcurementPlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role:admin')->group(function() {
        Route::patch('/users/role/{user}',[UserController::class, 'assign']);
        Route::get('/users/create',[UserController::class, 'create']);
        Route::patch('/users/{user}', [UserController::class, 'update']);
        Route::get('/users', [UserController::class,'index']);
        Route::post('/users',[UserController::class, 'store']);
        Route::get('/users/edit/{user}', [UserController::class, 'edit']);
    });

    Route::middleware('role:budget-officer')->group(function() {
        Route::get('/procurement-plans',[ProcurementPlanController::class,'index']);
        Route::get('/procurement-plans/create',[ProcurementPlanController::class, 'create']);
        Route::post('/procurement-plans',[ProcurementPlanController::class, 'store']);
    });
});

require __DIR__.'/auth.php';
