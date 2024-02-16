<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\JobOffer;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function apply(JobOffer $offer)
    {
        $user = auth()->user();
        if (!$user || !$user->jobSeeker) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté en tant que demandeur d\'emploi pour postuler.');
        }

        if ($user->jobSeeker->applications()->where('job_offer_id', $offer->id)->exists()) {
            return redirect()->back()->with('error', 'Vous avez déjà postulé à cette offre.');
        }

        Application::create([
            'job_seeker_id' => $user->jobSeeker->id,
            'job_offer_id' => $offer->id,
        ]);

        return redirect()->back()->with('success', 'Votre candidature a été envoyée avec succès.');
    }


    public function getCandidates($identifier)
{
    $offer = JobOffer::where('id', $identifier)->firstOrFail();
    $candidates = $offer->applications()->with('jobSeeker.user','jobSeeker.curriculumVitae')->get();
    return response()->json($candidates);
}

}