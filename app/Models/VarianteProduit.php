<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VarianteProduit extends Model
{
    protected $table = 'variantes_produits';

    protected $fillable = [
        'produit_id',
        'sku',
        'matiere_id',
        'couleur_id',
        'couleurs_secondaires',
        'taille_id',
        'prix',
        'stock',
        'image',
        'actif',
        'par_defaut',
    ];

    protected $casts = [
        'actif' => 'boolean',
        'par_defaut' => 'boolean',
        'couleurs_secondaires' => 'array', // ← JSON casté en array automatiquement
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'matiere_id');
    }

    public function couleur()
    {
        return $this->belongsTo(Couleur::class, 'couleur_id');
    }

    public function taille()
    {
        return $this->belongsTo(Taille::class, 'taille_id');
    }

    /**
     * Récupère toutes les couleurs (principale + secondaires)
     */
    public function getAllCouleursAttribute()
    {
        $couleurs = collect();
        
        if ($this->couleur) {
            $couleurs->push($this->couleur);
        }
        
        if ($this->couleurs_secondaires) {
            foreach ($this->couleurs_secondaires as $data) {
                $couleur = new Couleur([
                    'nom' => $data['nom'] ?? '',
                    'code_hexadecimal' => $data['hex'] ?? '#D98B92',
                ]);
                $couleurs->push($couleur);
            }
        }
        
        return $couleurs;
    }

    /**
     * Retourne le nom d'affichage de la variante
     */
    public function getNomCompletAttribute()
    {
        $parties = [];
        
        if ($this->couleur) {
            $parties[] = $this->couleur->nom;
        }
        
        if ($this->couleurs_secondaires) {
            foreach ($this->couleurs_secondaires as $data) {
                $parties[] = $data['nom'] ?? '';
            }
        }
        
        if ($this->taille) $parties[] = $this->taille->nom;
        if ($this->matiere) $parties[] = $this->matiere->nom;
        
        return implode(' & ', array_filter($parties));
    }
}