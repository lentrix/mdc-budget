<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $capex = Category::where('type','capex')->orderBy('category_name')->get();
        $opex = Category::where('type','opex')->orderBy('category_name')->get();

        return inertia('Categories/Index',[
            'capex' => $capex,
            'opex' => $opex,
        ]);
    }
}
