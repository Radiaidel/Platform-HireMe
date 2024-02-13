<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurriculumVitae;

class CvController extends Controller
{
    public function index()
    {
        return view('profile.curriculum-vitae');
    }
    public function store(Request $request)
    {
        $cvData = $request->all();
    
    
        $cv = new CurriculumVitae([
            'skills' => $cvData['competence'],
            'experiences' => $cvData['experience'],
            'education' => $cvData['education'],
            'languages' => $cvData['langue'],
            'job_seeker_id'=> auth()->user()->jobseeker->id,
        ]);
    
        $cv->save();
    
        return response()->json(['message' => 'CV enregistré avec succès !']);
    }

}
