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
    public function search(Request $request)
    {
        $message='';
        $searchTerm = $request->input('search');
    
        $companies = Company::where('name', 'like', "%$searchTerm%")
                            ->orWhere('slogan', 'like', "%$searchTerm%")
                            ->join('users', 'companies.user_id', '=', 'users.id')
                            ->select('companies.*', 'users.name', 'users.image_url')
                            ->get();
    
        if ($companies->isEmpty()) {
            $companies = Company::join('users', 'companies.user_id', '=', 'users.id')
                                ->select('companies.*', 'users.name', 'users.image_url')
                                ->get();
    
            $message = 'Aucune entreprise trouvée.';
        }
    
        return view('company.index', compact('companies'))->with('message',$message);
    }
    
    
}
