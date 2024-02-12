<?php

namespace App\Http\Controllers;
use App\Models\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class JobOfferController extends Controller
{
    public function index()
    {
        $message = null;
        $offers = collect(); // Initialisation avec une collection vide    
        if (auth()->user()->role === 'company' && auth()->user()->company !== null) {
            $offers = JobOffer::where('company_id', auth()->user()->company->id)->get();
            
            if ($offers->isEmpty()) {
                $message = "Vous n'avez pas encore ajouté d'offres d'emploi.";
            }
        } else {
            $message = "Veuillez compléter votre profil d'entreprise pour ajouter une offre.";
        }
    
        return view('dashboard', compact('offers', 'message'));
    }
    

    public function show(JobOffer $offer)
    {
        return view('offers.show', compact('offer'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'skills_required' => 'required|string',
            'contract_type' => 'required',
            'location' => 'required|string|max:255',
        ]);

        $company = auth()->user()->company;

        $validatedData['company_id'] = $company->id;
    
        JobOffer::create($validatedData);

        return redirect()->route('dashboard')->with('success', 'Offre d\'emploi ajoutée avec succès!');
    }
    public function destroy(JobOffer $offer): RedirectResponse
    {

        if ($offer->company_id !== auth()->user()->company->id) {
            return redirect()->route('dashboard')->with('error', 'Vous n\'êtes pas autorisé à supprimer cette offre.');
        }
    
        $offer->delete();
    
        return redirect()->route('dashboard')->with('success', 'L\'offre a été supprimée avec succès.');
    }
}
