<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem; // Assuming you have a CartItem model

class CartController extends Controller
{
    public function index()
    {
        $carts = CartItem::all();
        return response()->json($carts);
    }
    public function addToCart(Request $request)
    {
        try {
            // Validate incoming request
            $validated = $request->validate([
                'car_name' => 'required|string',
                'model_name' => 'required|string',
                'image' => 'required|string',
                'amount_per_day' => 'required|numeric',
            ]);

            // Save data to the CartItem model
            $cartItem = new CartItem();
            $cartItem->car_name = $validated['car_name'];
            $cartItem->model_name = $validated['model_name'];
            $cartItem->image = $validated['image'];
            $cartItem->amount_per_day = $validated['amount_per_day'];
            $cartItem->save();

            return response()->json(['message' => 'Item added to cart'], 201);

        } catch (\Exception $e) {
            // Log the error and return a response
            \Log::error('Error adding product to cart: ' . $e->getMessage());
            return response()->json(['error' => 'Error adding product to cart'], 500);
        }

    }
    public function show($id)
    {
        $product = CartItem::find($id);

        if ($product) {
            return response()->json($product);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
    public function update(Request $request, $id)
    {
        $product = CartItem::find($id);

        if ($product) {
            // Validate and update the product
            $validatedData = $request->validate([
                'car_name' => 'required|string|max:255',
                'model_name' => 'required|string|max:255',
                'image' => 'required',
                'amount_per_day' => 'required|numeric|min:0',
            ]);

            $product->update($validatedData);

            return response()->json($product);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
    public function destroy($id)
    {
        $product = CartItem::find($id);

        if ($product) {
            // Delete the product
            $product->delete();

            return response()->json(['message' => 'Product deleted successfully']);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
}

