<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

// AUTH (LOGIN)

Route::post('/login', function (Request $request) {

    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Invalid credentials'
        ], 401);
    }

    // Passport access token
    $token = $user->createToken('api-token')->accessToken;

    return response()->json([
        'token' => $token,
        'user'  => $user
    ]);
});

// PROTECTED API ROUTES

Route::middleware('auth:api')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Roles of the authenticated user
    Route::get('/me', function (Request $request) {
        return $request->user()->load('roles');
    });

    // Categories
    Route::controller(CategoryController::class)
        ->prefix('categories')
        ->group(function () {
            Route::get('/', 'getCategories');
            Route::post('/', 'createCategory');
            Route::get('/{categoryId}', 'getCategory');
            Route::patch('/{categoryId}', 'updateCategory');
            Route::patch('/{category}/status', 'updateStatus');
            Route::delete('/{categoryId}', 'deleteCategory');
        });

    // Products
    Route::controller(ProductController::class)
        ->prefix('products')
        ->group(function () {
            Route::get('/', 'getProducts');
            Route::post('/', 'createProduct');
            Route::get('/{productId}', 'getProduct');
            Route::patch('/{productId}', 'updateProduct');
            Route::delete('/{productId}', 'deleteProduct');
        });
});
