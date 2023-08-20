<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        $items = Item::orderBy('item_name')->get();

        return inertia('Items/Index',[
            'items' => $items
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
        return inertia('Items/Show',[
            'item' => $item
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
