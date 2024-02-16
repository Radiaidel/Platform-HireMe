<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use App\Models\Company;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class JobOfferController extends Controller
{
    public function index()
    {
        $message = null;
        $offers = collect();
        if (auth()->user()->role === 'company' && auth()->user()->company !== null) {
            $offers = JobOffer::where('company_id', auth()->user()->company->id)->get();

            if ($offers->isEmpty()) {
                $message = "Vous n'avez pas encore ajouté d'offres d'emploi.";
            }
        } else {
            if (auth()->user()->role === 'company') {
                $message = "Veuillez compléter votre profil d'entreprise pour ajouter une offre.";
            } else {
                $offers = JobOffer::all();
            }
        }

        return view('offers.index', compact('offers', 'message'));
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
    public function destroy(Request $request)
    {
        $offer = JobOffer::findOrFail($request->offer_id);

        if ($offer->company_id !== auth()->user()->company->id) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à supprimer cette offre.');
        }

        $offer->delete();

        return redirect()->back()->with('success', 'L\'offre a été supprimée avec succès.');
    }




    public function searchOffers(Request $request)
    {
        $message = '';
        $searchTerm = $request->input('search');

        $offers = JobOffer::where('title', 'like', "%$searchTerm%")
            ->orWhere('skills_required', 'like', "%$searchTerm%")
            ->orWhere('contract_type', 'like', "%$searchTerm%")
            ->orWhere('location', 'like', "%$searchTerm%")
            ->with('company') // Charger les informations de l'entreprise associée à chaque offre
            ->get();

        if ($offers->isEmpty()) {
            $offers = JobOffer::all();
            $message = 'Aucune offre trouvée.';
        }
        return view('offers.index', compact('offers'))->with('message', $message);
    }

    public function OfferByCompany($id)
    {
        $company = Company::findOrFail($id);
        $offers = $company->jobOffers; // Assurez-vous que vous avez défini une relation entre les entreprises et les offres dans vos modèles

        return view('company.offers-company', compact('company', 'offers'));
    }

   
    public function softDelete(Request $request, $id)
    {
        $offer = JobOffer::findOrFail($id);
        $offer->delete();

        return redirect()->back()->with('message', 'L\'offre a été archivée avec succès.');
    }
}
