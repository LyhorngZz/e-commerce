<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
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
        abort_unless(
            optional($request->user())->can('products.create'),
            403
        );

        $validated = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'pricing' => 'required|numeric',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
        ]);

        return response()->json(
            Product::create($validated),
            201
        );
    }

    // PATCH /api/products/{productId}
    public function updateProduct(Request $request, $productId)
    {
        abort_unless(
            optional($request->user())->can('products.update'),
            403
        );

        $product = Product::findOrFail($productId);

        $product->update(
            $request->only([
                'name',
                'category_id',
                'pricing',
                'description',
                'images',
            ])
        );

        return response()->json($product);
    }

    // DELETE /api/products/{productId}
    public function deleteProduct(Request $request, $productId)
    {
        abort_unless(
            optional($request->user())->can('products.delete'),
            403
        );

        Product::findOrFail($productId)->delete();

        return response()->json([
            'message' => 'Product deleted'
        ]);
    }
}
