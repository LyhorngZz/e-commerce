<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audience;
use App\Models\User;

class AudienceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'audience_name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email|unique:users,email',
        ]);

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt('password'),
        ]);

        return Audience::create([
            'name' => $request->audience_name,
            'user_id' => $user->id,
        ]);
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'audience_id' => 'required|exists:audiences,id',
            'article_id' => 'required|exists:articles,id',
        ]);

        $audience = Audience::findOrFail($request->audience_id);
        $audience->article_id = $request->article_id;
        $audience->save();

        return $audience;
    }

}
