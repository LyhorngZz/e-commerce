<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'created_by',
        'assigned_to',
    ];

    // One category has many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // User who created the category
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // User (staff) assigned to the category
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
