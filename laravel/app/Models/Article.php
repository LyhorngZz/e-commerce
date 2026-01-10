<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Author;
use App\Models\Audience;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Article extends Model
{
    protected $fillable = ['name', 'author_id'];

    // Article → Author
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // Article → Audiences
    public function audiences()
    {
        return $this->hasMany(Audience::class);
    }

    // Article → Comments (polymorphic)
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
