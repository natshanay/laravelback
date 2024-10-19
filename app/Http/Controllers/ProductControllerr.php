<?php

namespace App\Http\Controllers;

use App\Models\Productt;
use Illuminate\Http\Request;

class ProductControllerr extends Controller
{

    public function index()
    {

        $products = Productt::all();
        return $products;
        
    }

    public function store(Request $request)
    {
       $productt = new Productt();
       $productt->description = $request->description;
       $productt->price = $request->price;
       $productt->stock = $request->stock;

       $productt->save();
    }

    public function show($id)
    {
        $productt = Productt::find($id);
        return $productt;
    }

    public function update(Request $request, $id)
    {
        $productt = Productt::findOrFail($request->id);
        $productt->description = $request->description;
        $productt->price = $request->price;
        $productt->stock = $request->stock;

        $productt->save();
        return $productt;
    }

    public function destroy($id)
    {
       $productt = Productt::destroy($id);
       return $productt;
    }
}
