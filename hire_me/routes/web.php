<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CvController;

use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobSeekerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [JobOfferController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/offers/{offer}', [JobOfferController::class, 'show'])->name('offers.show');
    Route::post('/search-offers', [JobOfferController::class, 'searchOffers'])->name('search.offers');

});

Route::middleware(['auth', 'role:company'])->group(function () {
    Route::post('/ajouter-offre', [JobOfferController::class, 'store'])->name('offer.store');
    Route::post('/offers', [JobOfferController::class, 'destroy'])->name('offer.destroy');
    Route::get('/offers/{offer}/edit', [JobOfferController::class, 'edit'])->name('offers.edit');
    Route::put('/offers/update', [JobOfferController::class, 'update'])->name('offers.update');
    Route::get('/get-candidates/{id}', [ApplicationController::class, 'getCandidates']);
    Route::get('/CV/Show{id}', [CvController::class, 'ShowByid'])->name('CV.Show');

});


Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/remplir-cv', [CvController::class, 'index'])->name('cv.form');
    Route::get('/CV/Show', [CvController::class, 'Show'])->name('CV.Show');
    Route::post('/save-cv', [CVController::class, 'store']);
    Route::get('/download-cv', [CVController::class, 'downloadCV'])->name('download-cv');
    Route::get('/postuler/{offer}', [ApplicationController::class, 'apply'])->name('apply');
    Route::get('/company', [CompanyController::class, 'index'])->name('company');
    Route::get('/company/{id}/offers', [JobOfferController::class, 'OfferByCompany'])->name('company.offers');
    Route::get('/companies/search', [CompanyController::class, 'search'])->name('company.search');
    Route::post('/subscribe-newsletter', [CompanyController::class, 'subscribeToNewsletter'])->name('subscribe.newsletter');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboardAdmin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/archive-offers', [JobOfferController::class, 'softDelete'])->name('archive.offers');
    Route::get('/company', [CompanyController::class, 'index'])->name('company');
    Route::get('/company/{id}/offers', [JobOfferController::class, 'OfferByCompany'])->name('company.offers');
    Route::get('/companies/search', [CompanyController::class, 'search'])->name('company.search');
    Route::delete('/company/{id}/archive', [CompanyController::class, 'softDelete'])->name('company.softdelete');
    Route::delete('/offers/{id}',[JobOfferController::class, 'softDelete'])->name('offers.softDelete');
    Route::get('/users', [JobSeekerController::class, 'index'])->name('users.index');
    Route::delete('/users/{id}',  [JobSeekerController::class, 'softDelete'])->name('users.softDelete');
});

require __DIR__ . '/auth.php';
