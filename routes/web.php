<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemRequestController;
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

    Route::get('/items',[ItemController::class, 'index']);


    Route::middleware('role:admin')->group(function() {
        Route::patch('/users/role/{user}',[UserController::class, 'assign']);
        Route::get('/users/create',[UserController::class, 'create']);
        Route::patch('/users/{user}', [UserController::class, 'update']);
        Route::get('/users', [UserController::class,'index']);
        Route::post('/users',[UserController::class, 'store']);
        Route::get('/users/edit/{user}', [UserController::class, 'edit']);
    });

    Route::middleware('role:budget-officer')->group(function() {
        Route::get('/procurement-plans/create',[ProcurementPlanController::class, 'create']);
        Route::post('/procurement-plans/{pp}/activate',[ProcurementPlanController::class, 'activate']);
        Route::get('/procurement-plans/{pp}',[ProcurementPlanController::class, 'show']);
        Route::get('/procurement-plans',[ProcurementPlanController::class,'index']);
        Route::post('/procurement-plans',[ProcurementPlanController::class, 'store']);

        Route::get('/departments/create',[DepartmentController::class, 'create']);
        Route::get('/departments/{dept}',[DepartmentController::class, 'show']);
        Route::patch('/departments/{dept}',[DepartmentController::class, 'update']);
        Route::get('/departments/edit/{dept}',[DepartmentController::class, 'edit']);
        Route::post('/departments',[DepartmentController::class, 'store']);
        Route::get('/departments',[DepartmentController::class, 'index']);

        Route::resource('categories', CategoryController::class);

        // Route::resource('items', ItemController::class);
        Route::get('/items/create', [ItemController::class,'create']);
        Route::post('/items', [ItemController::class, 'store']);
        Route::get('/items/{item}',[ItemController::class, 'show']);
        Route::get('/items/{item}/edit',[ItemController::class, 'edit']);
        Route::patch('/items/{item}', [ItemController::class, 'update']);


        Route::post('/budgets/{budget}/approve', [BudgetController::class,'approve']);
        Route::post('/budgets/{budget}/retract-approval', [BudgetController::class,'retractApproval']);
    });

    Route::middleware('can:manage-budget')->group(function(){
        Route::delete('/budgets/delete-item',[BudgetController::class,'deleteItem']);
        Route::get('/budgets/{budget}/manage',[BudgetController::class,'manage']);
        Route::post('/budgets/{budget}/add-item',[BudgetController::class, 'addItem']);
        Route::get('/budgets',[BudgetController::class, 'index']);

        Route::get('/item-requests', [ItemRequestController::class, 'index']);
        Route::post('/item-requests', [ItemRequestController::class, 'store']);

    });

});

require __DIR__.'/auth.php';
