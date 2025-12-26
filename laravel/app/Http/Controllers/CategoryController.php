<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // // --- Get /api/categories ---
    // public function getCategories(){
    //     return ["message" => "Getting list of categories"];
    // }

    // // --- Post /api/categories ---
    // public function createCategory(Request $request){
    //     return ["message" => "Creating 1 new category"];
    // }

    // // --- Patch /api/categories/{categoryId} ---
    // public function updateCategory($categoryId){
    //     return ["message" => "Updating 1 category base on given categoryID"];
    // }

    // // --- Delete /api/categories/{categoryId} ---
    // public function deleteCategory($categoryId){
    //     return ["message" => "Deleting 1 category base on given categoryID"];
    // }

    // GET /api/categories
    public function getCategories()
    {
        return Category::all();
    }

    // POST /api/categories
    public function createCategory(Request $request)
    {   
        $request->validate([
            'name' => 'required|string'
        ]);

        $category = Category::create([
            'name' => $request->name
        ]);

        return response()->json($category, 201);
    }


    // GET /api/categories/{categoryId}
    public function getCategory($categoryId)
    {
        return response()->json(
            Category::findOrFail($categoryId)
        );
    }

    // PATCH /api/categories/{categoryId}
    public function updateCategory(Request $request, $categoryId)
    {
        $category = Category::findOrFail($categoryId);

        $validated = $request->validate([
            'name' => 'nullable|string'
        ]);

        $category->update($validated);

        return response()->json($category);
    }

    // DELETE /api/categories/{categoryId}
    public function deleteCategory($categoryId)
    {
        Category::findOrFail($categoryId)->delete();

        return response()->json([
            'message' => 'Category deleted successfully'
        ]);
    }


}
