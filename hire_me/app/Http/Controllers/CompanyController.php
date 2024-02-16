<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Spatie\Newsletter\Facades\Newsletter;


class CompanyController extends Controller
{
    public function manageJobs(User $user, Company $company)
    {
        $this->authorize('manageJobs', $company);
    }

    public function index()
    {
        $users = User::where('role', 'company')
            ->join('companies', 'users.id', '=', 'companies.user_id')
            ->select('users.name', 'users.image_url', 'companies.*')
            ->get();

        return view('company.index', compact('users'));
    }

    public function search(Request $request)
    {
        $message = '';
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

        return view('company.index', compact('companies'))->with('message', $message);
    }


    public function subscribeToNewsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        try {
            if (Newsletter::isSubscribed($request->email)) {
                return redirect()->back()->with('error', 'Email already subscribed');
            } else {
                Newsletter::subscribe($request->email);
                return redirect()->back()->with('success', 'Email subscribed');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function softDelete($id)
    {
        $company = Company::findOrFail($id);

        $company->delete();

        return redirect()->back()->with('message', 'L\'entreprise a été archivée avec succès.'); // Redirection avec un message de succès
    }
}
