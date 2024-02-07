<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function manageUsers(User $user)
    {
        $this->authorize('manageUsers', $user);
        // Logique pour gérer les utilisateurs
    }

    public function manageCompanies(User $user)
    {
        $this->authorize('manageCompanies', $user);
        // Logique pour gérer les entreprises
    }

    public function manageJobs(User $user)
    {
        $this->authorize('manageJobs', $user);
        // Logique pour gérer les offres d'emploi
    }
}
