<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index()
    {
        $items = Item::all(); // Retrieve all items
        return response()->json($items); // Return JSON response
    }

    public function showIndex()
    {
        $items = Item::all(); // Retrieve all items
        return view('items.index', compact('items')); // Return view with items
    }
    public function create()
    {
        return view('items.create'); // Return a view with the form
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
        ]);

        // Create a new item
        $item = new Item;
        $item->name = $validated['name'];
        $item->quantity = $validated['quantity'];
        $item->save();

        // Redirect or return a response
        return redirect()->route('items.index')->with('success', 'Item created successfully!');
    }
}
