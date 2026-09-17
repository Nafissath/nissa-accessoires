<?php

namespace App\Http\Controllers;

use App\Mail\BienvenueNewsletter;
use App\Models\AbonneNewsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $email = strtolower(trim($request->email));

        $existant = AbonneNewsletter::where('email', $email)->first();

        if ($existant && $existant->actif) {
            return back()->with('erreur', 'Cette adresse email est déjà inscrite à la newsletter.');
        }

        if ($existant) {
            $existant->update(['actif' => true]);
            $abonne = $existant;
        } else {
            $abonne = AbonneNewsletter::create([
                'email' => $email,
                'token' => Str::random(40),
                'actif' => true,
                'source' => $request->input('source', 'footer'),
            ]);
        }

        try {
            Mail::to($abonne->email)->send(new BienvenueNewsletter($abonne));
        } catch (\Exception $e) {
            Log::error('Erreur email bienvenue newsletter : ' . $e->getMessage());
        }

        return back()->with('succes', 'Merci ! Votre inscription à la newsletter est confirmée.');
    }

    public function desinscription($token)
    {
        $abonne = AbonneNewsletter::where('token', $token)->first();

        if (!$abonne) {
            return redirect()->route('accueil')->with('erreur', 'Lien de désinscription invalide.');
        }

        $abonne->update(['actif' => false]);

        return redirect()->route('accueil')->with('succes', 'Vous êtes désinscrite de la newsletter.');
    }
}