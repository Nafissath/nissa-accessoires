<?php

use Livewire\Volt\Component;
use App\Models\Produit;

new class extends Component
{
    public Produit $produit;
    public int $quantite = 1;
    public ?int $varianteSelectionnee = null;
    public ?int $couleurSelectionnee = null;
    public ?int $tailleSelectionnee = null;

    public function mount(Produit $produit): void
    {
        $this->produit = $produit;
        if ($produit->variantes->count() > 0) {
            $premiere = $produit->variantes->first();
            $this->varianteSelectionnee = $premiere->id;
            $this->couleurSelectionnee = $premiere->couleur_id;
            $this->tailleSelectionnee = $premiere->taille_id;
        }
    }

    public function mettreAJourVariante(): void
    {
        $variante = $this->produit->variantes
            ->where('couleur_id', $this->couleurSelectionnee)
            ->where('taille_id', $this->tailleSelectionnee)
            ->first();

        if ($variante) {
            $this->varianteSelectionnee = $variante->id;
        }
    }

    public function ajouterAuPanier(): void
    {
        $panier = session('panier', []);
        $cle = $this->produit->id . '-' . ($this->varianteSelectionnee ?? 'defaut');

        if (isset($panier[$cle])) {
            $panier[$cle]['quantite'] += $this->quantite;
        } else {
            $panier[$cle] = [
                'produit_id' => $this->produit->id,
                'variante_id' => $this->varianteSelectionnee,
                'quantite' => $this->quantite,
            ];
        }

        session(['panier' => $panier]);
        $this->dispatch('panier-modifie');
        session()->flash('succes', '✨ ' . $this->produit->nom . ' ajouté au panier !');
    }
};
?>

<div>
    @if(session()->has('succes'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700">
            {{ session('succes') }}
            <a href="{{ route('panier.index') }}" class="underline font-semibold ml-2">Voir le panier →</a>
        </div>
    @endif

    @if($produit->variantes->pluck('couleur')->filter()->unique('id')->count() > 0)
        <div class="mb-6">
            <label class="block text-sm font-semibold text-nissa-choco mb-3">Couleur</label>
            <div class="flex flex-wrap gap-3">
                @foreach($produit->variantes->pluck('couleur')->filter()->unique('id') as $couleur)
                    <button type="button" 
                            wire:click="$set('couleurSelectionnee', {{ $couleur->id }}); mettreAJourVariante()"
                            class="w-12 h-12 rounded-full border-2 transition {{ $couleurSelectionnee == $couleur->id ? 'border-nissa-choco ring-2 ring-nissa-rose' : 'border-gray-200' }}"
                            style="background-color: {{ $couleur->code_hexadecimal ?? '#E8B4B8' }};"
                            title="{{ $couleur->nom }}">
                    </button>
                @endforeach
            </div>
        </div>
    @endif

    @if($produit->variantes->pluck('taille')->filter()->unique('id')->count() > 0)
        <div class="mb-6">
            <label class="block text-sm font-semibold text-nissa-choco mb-3">Taille</label>
            <div class="flex flex-wrap gap-3">
                @foreach($produit->variantes->pluck('taille')->filter()->unique('id') as $taille)
                    <button type="button"
                            wire:click="$set('tailleSelectionnee', {{ $taille->id }}); mettreAJourVariante()"
                            class="px-5 py-3 border-2 rounded-full font-medium transition {{ $tailleSelectionnee == $taille->id ? 'border-nissa-choco bg-nissa-choco text-white' : 'border-gray-200 hover:border-nissa-rose' }}">
                        {{ $taille->nom }}
                    </button>
                @endforeach
            </div>
        </div>
    @endif

    <div class="mb-8">
        <label class="block text-sm font-semibold text-nissa-choco mb-3">Quantité</label>
        <div class="inline-flex items-center border-2 border-gray-200 rounded-full">
            <button type="button" wire:click="$set('quantite', {{ max(1, $quantite - 1) }})"
                    class="w-12 h-12 flex items-center justify-center hover:bg-nissa-cream rounded-l-full transition">−</button>
            <span class="w-16 text-center font-bold text-lg">{{ $quantite }}</span>
            <button type="button" wire:click="$set('quantite', {{ $quantite + 1 }})"
                    class="w-12 h-12 flex items-center justify-center hover:bg-nissa-cream rounded-r-full transition">+</button>
        </div>
    </div>

    <div class="space-y-3">
        <button type="button" wire:click="ajouterAuPanier" 
                class="w-full btn-nissa flex items-center justify-center gap-3 text-lg py-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            Ajouter au panier
        </button>
    </div>
</div>