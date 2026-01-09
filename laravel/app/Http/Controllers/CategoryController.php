<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * GET /api/categories
     */
    public function getCategories(Request $request)
    {
        $user = $request->user();

        if ($user->hasRole('admin')) {
            return response()->json(Category::all());
        }

        if ($user->hasRole('manager')) {
            return response()->json(
                Category::where('created_by', $user->id)->get()
            );
        }

        if ($user->hasRole('staff')) {
            return response()->json(
                Category::where('assigned_to', $user->id)->get()
            );
        }

        abort(403, 'Unauthorized');
    }

    /**
     * POST /api/categories
     */
    public function createCategory(Request $request)
    {
        $user = $request->user();

        abort_unless($user->can('categories.create'), 403);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $category = Category::create([
            'name'        => $validated['name'],
            'created_by'  => $user->id,
            'assigned_to' => $validated['assigned_to'] ?? null,
        ]);

        return response()->json($category, 201);
    }

    /**
     * GET /api/categories/{id}
     */
    public function getCategory(Request $request, $categoryId)
    {
        $category = Category::findOrFail($categoryId);

        $this->authorize('view', $category);

        return response()->json($category);
    }

    /**
     * PATCH /api/categories/{id}
     */
    public function updateCategory(Request $request, $categoryId)
    {
        $category = Category::findOrFail($categoryId);

        $this->authorize('update', $category);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $category->update($validated);

        return response()->json($category);
    }

    public function updateStatus(Request $request, Category $category)
    {
        $this->authorize('updateStatus', $category);

        $validated = $request->validate([
            'status' => 'required|string'
        ]);

        $category->update([
            'status' => $validated['status']
        ]);

        return response()->json($category);
    }


    /**
     * DELETE /api/categories/{id}
     */
    public function deleteCategory(Request $request, $categoryId)
    {
        $category = Category::findOrFail($categoryId);

        $this->authorize('delete', $category);

        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully'
        ]);
    }
}
