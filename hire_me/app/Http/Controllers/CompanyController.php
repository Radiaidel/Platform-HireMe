<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function manageJobs(User $user, Company $company)
    {
        $this->authorize('manageJobs', $company);
        // Logique de gestion des offres d'emploi pour l'entreprise
    }
}
