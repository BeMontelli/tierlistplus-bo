<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

// > php artisan make:policy
// > RolePolicy
class RolePolicy
{
    public function accessAdmin(User $user): bool
    {
        return $user->role === "admin";
    }
}
