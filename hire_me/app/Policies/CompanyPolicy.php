<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Company;

class CompanyPolicy
{
    public function manageJobs(User $user, Company $company)
    {
        return $user->role === 'company' && $user->id === $company->user_id;
    }

    public function viewApplications(User $user, Company $company)
    {
        return $user->role === 'company' && $user->id === $company->user_id;
    }
}
