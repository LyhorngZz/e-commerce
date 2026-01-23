<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'author_id' => 'required|exists:authors,id',
            'name' => 'required|string',
        ]);

        return Article::create([
            'name' => $request->name,
            'author_id' => $request->author_id,
        ]);
    }
}
