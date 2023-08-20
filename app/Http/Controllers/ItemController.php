<?php

namespace App\Http\Controllers;

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
}
