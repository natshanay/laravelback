<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CarImage;
class CarImageController extends Controller
{
    public function showindex()
{
    $images = CarImage::all(); // Retrieve all images
    return response()->json($images); // Return JSON response with image paths
}
public function index()
{
    $cars = Car::all();
    return view('cars.index', compact('$cars'));

}

}
