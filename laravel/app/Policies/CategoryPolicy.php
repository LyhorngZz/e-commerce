<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Category;

class CategoryPolicy
{
    public function view(User $user, Category $category): bool
    {
        if ($user->hasRole('admin')) return true;
        if ($user->hasRole('manager')) return $category->created_by === $user->id;
        if ($user->hasRole('staff')) return $category->assigned_to === $user->id;

        return false;
    }

    public function update(User $user, Category $category): bool
    {
        return $user->hasRole('admin')
            || ($user->hasRole('manager') && $category->created_by === $user->id);
    }

    public function delete(User $user, Category $category): bool
    {
        return $user->hasRole('admin');
    }

    public function updateStatus(User $user, Category $category): bool
    {
        return $user->hasRole('staff')
            && $category->assigned_to === $user->id;
    }
}
