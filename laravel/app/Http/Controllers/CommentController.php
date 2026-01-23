<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'commentable_type' => 'required|string',
            'commentable_id' => 'required|integer',
            'name' => 'required|string',
        ]);

        return Comment::create($request->all());
    }
}
