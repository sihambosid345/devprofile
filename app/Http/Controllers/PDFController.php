<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generate($username)
    {
        // Récupère l'utilisateur et ses projets/compétences
        $user = User::where('username', $username)
            ->with('projects', 'skills')
            ->firstOrFail();

        // Génére le PDF à partir de la vue cv.blade.php
        $pdf = Pdf::loadView('cv', compact('user'));

        // Retourne le téléchargement
        return $pdf->download('cv_' . $user->username . '.pdf');
    }
}
