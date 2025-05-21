<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PublicProfileController;
use App\Http\Controllers\PDFController;

use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Tableau de bord après connexion
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Routes protégées (authentification requise)
Route::middleware('auth')->group(function () {

    // Édition du profil
     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.edit');
   

    // CRUD projets et compétences
    Route::resource('projects', ProjectController::class);
Route::resource('skills', SkillController::class);
    Route::post('/profile/project', [App\Http\Controllers\ProjectController::class, 'storeFromProfile'])->name('profile.project.store');
Route::post('/profile/skill', [App\Http\Controllers\SkillController::class, 'storeFromProfile'])->name('profile.skill.store');

    // Génération de CV en PDF
    Route::get('/pdf/{username}', [PDFController::class, 'generate'])->name('pdf.generate');
});

// Affichage du profil public accessible sans authentification
Route::get('/profile/{username}', [PublicProfileController::class, 'show'])->name('profile.show');

// Auth routes Breeze
require __DIR__.'/auth.php';

Route::get('/pdf/{username}', [PDFController::class, 'generate'])->name('pdf.generate');