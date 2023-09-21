<?php

namespace App\Http\Controllers;

use App\Models\BudgetItem;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        $items = Item::orderBy('item_name')->get();

        return inertia('Items/Index',[
            'items' => $items,
            'canManageItems' => auth()->user()->can('manage-items')
        ]);
    }

    public function create() {
        $categories = Category::orderBy('category_name')->get();

        return inertia('Items/Create',[
            'categories' => $categories
        ]);
    }

    public function store(Request $request) {
        $fields = $request->validate([
            'item_name' => 'required',
            'item_description' => 'required',
            'unit' => 'required',
            'regular_price' => 'numeric|required',
            'category_id' => 'integer|required'
        ]);

        Item::create($fields);

        return redirect('/items')->with('Info','A new item has been created');
    }

    public function show(Item $item) {
        $budgetItems = BudgetItem::where('item_id', $item->id)
                ->whereHas('budget', function($q1){
                    $q1->whereHas('procurementPlan', function($q2){
                        $q2->where('active', 1);
                    });
                })->get()
                ->map(function($bi, $idx) {
                    return [
                        'id' => $bi->id,
                        'department' => $bi->budget->department->name,
                        'qty' => $bi->qty,
                        'price' => $bi->custom_price,
                        'regularPrice' => $bi->item->regular_price,
                        'amount' => $bi->custom_price*$bi->qty,
                        'remarks' => $bi->remarks
                    ];
                });

        return inertia('Items/Show',[
            'item' => $item,
            'budgetItems' => $budgetItems
        ]);
    }

    public function edit(Item $item) {
        $categories = Category::orderBy('category_name')->get();
        return inertia('Items/Edit',[
            'categories' => $categories,
            'item' => $item
        ]);
    }

    public function update(Request $request, Item $item) {
        $fields = $request->validate([
            'item_name' => 'required',
            'item_description' => 'required',
            'unit' => 'required',
            'regular_price' => 'numeric|required',
            'category_id' => 'integer|required'
        ]);

        $item->update($fields);

        return redirect('/items/' . $item->id)->with('Info','This item has been updated.');
    }
}
