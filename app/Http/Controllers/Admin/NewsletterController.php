<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewsletterGroupMail;
use App\Models\AbonneNewsletter;
use App\Models\NewsletterEnvoi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function index(Request $request)
    {
        // Recherche par email
        $query = AbonneNewsletter::query();
        
        if ($request->filled('search')) {
            $query->where('email', 'like', '%' . $request->search . '%');
        }
        
        if ($request->filled('statut')) {
            if ($request->statut === 'actif') {
                $query->where('actif', true);
            } elseif ($request->statut === 'desinscrit') {
                $query->where('actif', false);
            }
        }

        $abonnes = $query->latest()->paginate(25)->withQueryString();
        $totalActifs = AbonneNewsletter::where('actif', true)->count();
        $totalDesinscrits = AbonneNewsletter::where('actif', false)->count();
        $total = AbonneNewsletter::count();

        // Historique paginé
        $historique = NewsletterEnvoi::latest()->paginate(15);

        return view('admin.newsletter.index', compact(
            'abonnes', 'totalActifs', 'totalDesinscrits', 'total', 'historique'
        ));
    }

    public function creer()
    {
        $totalActifs = AbonneNewsletter::where('actif', true)->count();
        return view('admin.newsletter.creer', compact('totalActifs'));
    }

    public function envoyer(Request $request)
    {
        $request->validate([
            'sujet'   => 'required|string|max:255',
            'contenu' => 'required|string|min:10',
        ]);

        $abonnes = AbonneNewsletter::where('actif', true)->get();

        if ($abonnes->isEmpty()) {
            return back()->with('erreur', 'Aucun abonné actif à qui envoyer.');
        }

        $envoi = NewsletterEnvoi::create([
            'sujet'                => $request->sujet,
            'contenu'              => $request->contenu,
            'nombre_destinataires' => $abonnes->count(),
            'envoyes_reussis'      => 0,
            'envoyes_echoues'      => 0,
        ]);

        $reussis = 0;
        $echoues = 0;

        foreach ($abonnes as $abonne) {
            try {
                Mail::to($abonne->email)->send(new NewsletterGroupMail($envoi, $abonne->token));
                $reussis++;
            } catch (\Exception $e) {
                $echoues++;
                Log::error('Erreur envoi newsletter à ' . $abonne->email . ' : ' . $e->getMessage());
            }
        }

        $envoi->update([
            'envoyes_reussis' => $reussis,
            'envoyes_echoues' => $echoues,
            'envoye_at'       => now(),
        ]);

        if ($reussis > 0 && $echoues === 0) {
            return redirect()->route('admin.newsletter.index')
                ->with('success', "Newsletter envoyée avec succès à {$reussis} abonné(s).");
        } elseif ($reussis > 0 && $echoues > 0) {
            return redirect()->route('admin.newsletter.index')
                ->with('erreur', "Envoi partiel : {$reussis} succès, {$echoues} échec(s).");
        } else {
            return redirect()->route('admin.newsletter.index')
                ->with('erreur', "Échec total : {$echoues} échec(s). Vérifiez les logs.");
        }
    }

    public function export()
    {
        $abonnes = AbonneNewsletter::where('actif', true)->orderBy('email')->get();

        $filename = 'abonnes-newsletter-' . now()->format('Y-m-d-His') . '.csv';

        return response()->streamDownload(function () use ($abonnes) {
            $handle = fopen('php://output', 'w');
            // BOM UTF-8 pour Excel
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));
            fputcsv($handle, ['Email', 'Source', 'Inscrit le'], ';');
            
            foreach ($abonnes as $abonne) {
                fputcsv($handle, [
                    $abonne->email,
                    $abonne->source ?? '-',
                    $abonne->created_at->format('d/m/Y H:i'),
                ], ';');
            }
            
            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    public function toggle(AbonneNewsletter $abonne)
    {
        $abonne->update(['actif' => !$abonne->actif]);
        return back()->with('success', 'Statut mis à jour.');
    }

    public function supprimer(AbonneNewsletter $abonne)
    {
        $abonne->delete();
        return back()->with('success', 'Abonné supprimé.');
    }

    public function supprimerEnvoi(NewsletterEnvoi $envoi)
    {
        $envoi->delete();
        return back()->with('success', 'Historique supprimé.');
    }
}