<?php

namespace App\Policies;

use App\Models\User;


class AdminPolicy
{
    public function manageUsers(User $user)
    {
        return $user->role === 'admin';
    }
    public function manageCompanies(User $user)
    {
        return $user->role === 'admin';
    }
    public function manageJobs(User $user)
    {
        return $user->role === 'admin';
    }
}
