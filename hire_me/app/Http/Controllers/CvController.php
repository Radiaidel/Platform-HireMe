<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurriculumVitae;
use Dompdf\Dompdf;
use Dompdf\Options;

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
            'job_seeker_id' => auth()->user()->jobseeker->id,
        ]);

        $cv->save();

        return response()->json(['message' => 'CV enregistré avec succès !']);
    }
    public function Show()
    {
        $user = auth()->user();

        $cv = $user->jobSeeker->curriculumVitae;

        return view('profile.CV.show-curriculum-vitae', compact('user', 'cv'));
    }
    public function downloadCV()
    {
        $user = auth()->user();
        $cv = $user->jobSeeker->curriculumVitae;
        $cvContent = view('profile.CV.show-curriculum-vitae', compact('user', 'cv'))->with(['user' => $user])->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($cvContent);

        $dompdf->setPaper('A4');
        $dompdf->render();

        return $dompdf->stream('CV_' . $user->name . '.pdf');
    }
}
