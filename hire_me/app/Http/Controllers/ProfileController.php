<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Company;
use App\Models\JobSeeker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $company = $user->company;
        $jobseeker = $user->jobSeeker;
        return view('profile.edit', [
            'user' => $user,
            'company' => $company,
            'jobseeker' => $jobseeker,
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        if (auth()->user()->role == 'company') {

            $company = $user->company;

            if (!$company) {
                $company = new Company();
                $company->user_id = $user->id;
            }

            $company->fill($request->only(['slogan', 'industry', 'description']));
            $company->user_id = $user->id;
            $company->save();
        } else {

            $jobseeker = $user->jobseeker;

            if (!$jobseeker) {
                $jobseeker = new JobSeeker();
                $jobseeker->user_id = $user->id;
            }

            $jobseeker->fill($request->only(['current_position',
            'title',
            'industry',
            'address',
            'contact_information',
            'about',]));
            $jobseeker->user_id = $user->id;
            $jobseeker->save();

        }
        $user->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
