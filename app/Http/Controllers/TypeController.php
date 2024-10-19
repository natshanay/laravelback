<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('types.index', compact('types'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('types.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([

            'name'=>'required|string|max:255',
        ]);
        Type::create($valid);
return redirect()->route('types.index');

    }

    /**edit
     * Display the specified resource.
     */
    public function show(Type $type)
    {

        return view('types.show', compact('type'));
    }

    public function edit(Type $type)
    {
        return view('types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $request->validate([
            'name' => 'required|string|max:255',

        ]);

        $type->update($request->all());

        return redirect()->route('types.index')->with('success', 'type updated successfully.');
    }

    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('types.index')->with('success', 'type deleted successfully.');
    }
}
