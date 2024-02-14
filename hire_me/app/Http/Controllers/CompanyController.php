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
    }

    public function index()
    {
        $companies = User::where('role', 'company')
                        ->join('companies', 'users.id', '=', 'companies.user_id')
                        ->select('users.name', 'users.image_url', 'companies.*')
                        ->get();
    
        return view('company.index', compact('companies'));
    }
}
