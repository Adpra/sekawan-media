<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function accessAdminPanel(User $user)
    {
        return $user->isAdmin();
    }

    public function accessManagerPanel(User $user)
    {
        return $user->isManager();
    }
}
