<?php

namespace App\Http\Controllers\Sost;

use Illuminate\Http\Request;
use App\Models\Sost; // Import your model
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;




class UserSostController extends Controller
{
    public function index()
    {
        // Implement the index logic if needed
    }



public function create(Request $request)
{
    $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => '422',
            'error' => $validator->errors(),
        ], 422);
    }

    try {
        Sost::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return response()->json(['msg' => 'Post added successfully'], 200);
    } catch (\Exception $e) {
        \Log::error('Error creating post: ' . $e->getMessage());
        return response()->json(['status' => '500', 'error' => 'An internal server error occurred.'], 500);
    }
}






}

