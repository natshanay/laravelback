<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\CarModel;
class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showindex()
    {
        $models = CarModel::all();
        return response()->json($models);
    }
    public function index()
    {
        $models = CarModel::all();
        return view('models.index', compact('models'));

    }

    public function create()
    {

        return view('models.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([

            'name'=>'required|string|max:255',
        ]);
        CarModel::create($valid);
return redirect()->route('models.index');

    }

    /**edit
     * Display the specified resource.
     */
    public function show(CarModel $model)
    {

        return view('models.show', compact('model'));
    }

    public function edit(CarModel $model)
    {
        return view('models.edit', compact('model'));
    }

    public function update(Request $request, CarModel $model)
    {
        $request->validate([
            'name' => 'required|string|max:255',

        ]);

        $model->update($request->all());

        return redirect()->route('models.index')->with('success', 'model updated successfully.');
    }

    public function destroy(CarModel $model)
    {
        $model->delete();
        return redirect()->route('models.index')->with('success', 'model deleted successfully.');
    }
}
