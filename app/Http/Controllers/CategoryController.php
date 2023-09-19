<?php

namespace App\Http\Controllers;

use App\Models\BudgetItem;
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

    public function create() {
        return inertia('Categories/Create');
    }

    public function store(Request $request) {
        $fields = $request->validate([
            'category_name' => 'required',
            'category_description' => 'required',
            'type' => 'required',
        ]);

        Category::create($fields);

        return redirect('/categories')->with('Info','A new category has been created.');
    }

    public function show(Category $category) {
        $budgetItems = BudgetItem::whereHas('item', function($q1) use($category) {
            $q1->where('category_id', $category->id);
        })->whereHas('budget', function($q2) {
            $q2->whereHas('procurementPlan', function($q3){
                $q3->where('active', 1);
            });
        })->get()
        ->map(function($bi, $idx){
            return [
                'department' => $bi->budget->department->name,
                'item' => $bi->item->item_name,
                'qty' => $bi->qty,
                'price' => $bi->custom_price,
                'regularPrice' => $bi->item->regular_price,
                'amount' => $bi->qty * $bi->custom_price,
                'remarks' => $bi->remarks
            ];
        });

        return inertia('Categories/Show',[
            'category'=>$category,
            'budgetItems' => $budgetItems
        ]);
    }

    public function edit(Category $category) {
        return inertia('Categories/Edit',[
            'category' => $category
        ]);
    }

    public function update(Category $category, Request $request) {
        $fields = $request->validate([
            'category_name' => 'required',
            'category_description' => 'required',
            'type' => 'required',
        ]);

        $category->update($fields);

        return redirect('/categories/' . $category->id)->with('Info','This category has been updated.');
    }
}
