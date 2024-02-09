<?php

namespace App\Http\Controllers;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'skills_required' => 'required|string',
            'contract_type' => 'required|in:distance,hybride,temps_plein',
            'location' => 'required|string|max:255',
        ]);

        // Ajout de l'offre avec l'ID de l'entreprise associée à l'utilisateur connecté
        $validatedData['company_id'] = auth()->user()->id;
        JobOffer::create($validatedData);

        // Redirection vers le tableau de bord après la création de l'offre
        return redirect()->route('dashboard')->with('success', 'Offre d\'emploi ajoutée avec succès!');
    }}
