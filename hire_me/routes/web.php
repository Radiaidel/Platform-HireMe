<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobOfferController;
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
});

Route::middleware(['auth', 'role:company'])->group(function () {
    Route::post('/ajouter-offre', [JobOfferController::class, 'store'])->name('offer.store');
    Route::post('/offers', [JobOfferController::class, 'destroy'])->name('offer.destroy');
    Route::get('/offers/{offer}/edit', [JobOfferController::class, 'edit'])->name('offers.edit');
    Route::put('/offers/update', [JobOfferController::class, 'update'])->name('offers.update');
});


Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/remplir-cv', [JobSeekerController::class, 'index'])->name('cv.form');
    Route::post('/enregistrer-cv', [JobSeekerController::class, 'storeCV'])->name('cv.store');
    
});

// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
