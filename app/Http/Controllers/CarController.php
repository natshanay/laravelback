<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarModel;
use App\Models\Type;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));

    }
    public function showindex()
    {

        $cars = Car::all();
        return response()->json($cars);


    }



    public function create()
    {
        $models = CarModel::all();
        $types = Type::all();
        return view('cars.create',compact('models'));
    }

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'model_id' => 'required|exists:car_models,id',
        'availability' => 'required|boolean',
        'images.*' => 'required|image|max:2048|mimes:png,jpg,jpeg,webp',
    ]);

    $car = Car::create($validatedData);
    if ($request->hasFile('images')) {
        try {
            $imagespath = public_path('images');
            $savedImages = [];
            foreach ($request->file('images') as $file) {
                $filename = date('Ymd_His') . '_' . $file->getClientOriginalName();
                $file->move($imagespath, $filename);
                $savedImages[] = [
                    'car_id' => $car->id,
                    'images' => $filename,
                ];
            }
            CarImage::insert($savedImages);
            Car::insert($savedImages);

        } catch (\Exception $e) {
            // Handle any exceptions that occurred during image upload and saving
            return redirect()->route('cars.index')
                ->with('error', 'An error occurred while uploading the images.');
        }
    }

    return redirect()->route('cars.index')
        ->with('status', 'Car added successfully.');
}
    public function show(Car $car)
    {
        $proimages = CarImage::where('car_id',$car->id)->get();
        // return $proimages;
        return view('cars.show', compact('car','proimages'));

    }

    public function edit(Car $car )
    {

        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'availability' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $car = Car::findOrFail($id);
        // Find the car by ID

        // Check if a new image file is uploaded
        if ($request->hasFile('image')) {
            // Generate a unique file name
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            // Move the uploaded file to the public/images directory
            $request->file('image')->move(public_path('images'), $fileName);
            // Update the image path in the validated data
            $validatedData['image'] = $fileName;
        }

        // Update the car with the validated data
        $car->update($validatedData);

        // Redirect or return response

        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }
}
