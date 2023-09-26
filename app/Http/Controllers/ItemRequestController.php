<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\ItemRequest;
use Illuminate\Http\Request;

class ItemRequestController extends Controller
{
    public function index() {
        return inertia('ItemRequests/Index',[
            'pending' => ItemRequest::where('requested_by', auth()->user()->id)
                    ->where('status','pending')->with('category')->with('requestedBy')->get(),

            'accepted' => ItemRequest::where('requested_by', auth()->user()->id)
                    ->where('status','accepted')->with('category')->get(),

            'rejected' => ItemRequest::where('requested_by', auth()->user()->id)
                    ->where('status','rejected')->with('category')->get(),
            'categories' => Category::orderBy('category_name')->get()
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'item_name' => 'required',
            'item_description' => 'required',
            'unit' => 'required',
            'regular_price' => 'numeric|required',
            'category_id' => 'integer|required'
        ]);

        ItemRequest::create([
            'item_name' => $request->item_name,
            'item_description' => $request->item_description,
            'unit' => $request->unit,
            'regular_price' => $request->regular_price,
            'category_id' => $request->category_id,
            'requested_by' => auth()->user()->id,
        ]);

        return redirect('/item-requests')->with('Info','A new item entry request has been made.');
    }

    public function review($status="pending") {
        $items = ItemRequest::where('status', $status)->with('requestedBy')->with('category')->get();

        return inertia('ItemRequests/Review',[
            'items' => $items
        ]);
    }

    public function accept(ItemRequest $itemRequest) {
        $itemRequest->status="accepted";
        $itemRequest->save();

        //store new item
        Item::create([
            'item_name' => $itemRequest->item_name,
            'item_description' => $itemRequest->item_description,
            'unit' => $itemRequest->unit,
            'regular_price' => $itemRequest->regular_price,
            'category_id' => $itemRequest->category_id,
        ]);

        return back()->with('Info','The requested item has been added to the official list.');
    }

    public function reject(ItemRequest $itemRequest) {
        $itemRequest->status = 'rejected';
        $itemRequest->save();

        return back()->with('Info',"The item request for $itemRequest->item_name has been rejected.");
    }
}
