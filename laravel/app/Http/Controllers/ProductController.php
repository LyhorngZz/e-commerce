<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // // --- Get /api/products ---
    // public function getProducts(){
    //     return ["message" => "Getting list of products"];
    // }

    // // --- Post /api/products ---
    // public function createProduct(Request $request){
    //     return ["message" => "Creating 1 new product"];
    // }

    // // --- Patch /api/products/{productId} ---
    // public function updateProduct($productId){
    //     return ["message" => "Updating 1 product base on given productID"];
    // }

    // // --- Delete /api/products/{productId} ---
    // public function deleteProduct($productId){
    //     return ["message" => "Deleting 1 product base on given productID"];
    // }

    // GET /api/products
    public function getProducts()
    {
        return response()->json(
            Product::with('category')->get()
        );
    }

    // POST /api/products
    public function createProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'pricing' => 'required|numeric',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
        ]);

        $product = Product::create($validated);

        return response()->json($product, 201);
    }

    // GET /api/products/{productId}
    public function getProduct($productId)
    {
        return response()->json(
            Product::with('category')->findOrFail($productId)
        );
    }

    // PATCH /api/products/{productId}
    public function updateProduct(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $validated = $request->validate([
            'name' => 'sometimes|string',
            'category_id' => 'sometimes|exists:categories,id',
            'pricing' => 'sometimes|numeric',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
        ]);

        $product->update($validated);

        return response()->json($product);
    }

    // DELETE /api/products/{productId}
    public function deleteProduct($productId)
    {
        Product::findOrFail($productId)->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }
}
