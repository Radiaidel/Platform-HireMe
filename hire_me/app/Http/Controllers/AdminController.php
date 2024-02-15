<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\JobOffer;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Nombre total d'utilisateurs
        $totalUsers = User::count();

        // Nombre total d'entreprises
        $totalCompanies = Company::count();

        // Nombre total d'offres
        $totalOffers = JobOffer::count();

        return view('admin.index', compact('totalUsers', 'totalCompanies', 'totalOffers'));
    }
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
