<?php

namespace App\Http\Controllers;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'company') {
            $offers = JobOffer::where('company_id', auth()->user()->company->id)->get();
        } else {
            $offers = JobOffer::all();
        }

        return view('dashboard', ['offers' => $offers]);
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
    }}
