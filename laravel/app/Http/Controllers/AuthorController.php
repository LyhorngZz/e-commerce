<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\User;

class AuthorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'author_name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email|unique:users,email',
        ]);

        // 1. Create user
        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt('password'),
        ]);

        // 2. Create author
        $author = Author::create([
            'name' => $request->author_name,
            'user_id' => $user->id,
        ]);

        return response()->json($author, 201);
    }

}
