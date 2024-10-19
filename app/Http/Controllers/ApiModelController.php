<?php

namespace App\Http\Controllers;

use App\Models\Amodel;
use Illuminate\Http\Request;

class ApiModelController extends Controller
{

    public function index()
    {

        $products = Amodel::all();
        return $products;

    }

    public function store(Request $request)
    {
       $Amodel = new Amodel();
       $Amodel->description = $request->description;
       $Amodel->price = $request->price;
       $Amodel->stock = $request->stock;

       $Amodel->save();
    }

    public function show($id)
    {
        $Amodel = Amodel::find($id);
        return $Amodel;
    }

    public function update(Request $request, $id)
    {
        $Amodel = Amodel::findOrFail($request->id);
        $Amodel->description = $request->description;
        $Amodel->price = $request->price;
        $Amodel->stock = $request->stock;

        $Amodel->save();
        return $Amodel;
    }

    public function destroy($id)
    {
       $Amodel = Amodel::destroy($id);
       return $Amodel;
    }
}
