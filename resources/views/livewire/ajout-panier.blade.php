<?php

use Livewire\Volt\Component;
use App\Models\Produit;

new class extends Component {
    public Produit $produit;
    public int $quantite = 1;
    public ?int $varianteSelectionnee = null;
    public ?int $couleurSelectionnee = null;
    public ?int $tailleSelectionnee = null;
    public ?int $matiereSelectionnee = null;
    public int $prixActuel = 0;
    public int $stockActuel = 0;

    public ?string $toastSucces = null;
    public ?string $toastErreur = null;

    public function mount(Produit $produit): void
    {
        $this->produit = $produit;
        $this->prixActuel = $produit->prix_promo ?? $produit->prix_base;

        // ✅ Initialiser le stock selon les variantes
        if ($produit->variantes->count() === 0) {
            // Produit sans variantes : stock = 10 par défaut (ou à définir)
            $this->stockActuel = 10;
            $this->varianteSelectionnee = null;
        } elseif ($produit->variantes->count() === 1) {
            // Une seule variante : sélection automatique
            $premiere = $produit->variantes->first();
            $this->varianteSelectionnee = $premiere->id;
            $this->couleurSelectionnee = $premiere->couleur_id;
            $this->tailleSelectionnee = $premiere->taille_id;
            $this->matiereSelectionnee = $premiere->matiere_id;
            $this->mettreAJourVariante();
        } else {
            // Plusieurs variantes : stock = 0 en attendant sélection
            $this->stockActuel = 0;
        }
    }

    public function updated(): void
    {
        $this->toastSucces = null;
        $this->toastErreur = null;
    }

    public function updatedCouleurSelectionnee(): void
    {
        $this->mettreAJourVariante();
    }

    public function updatedTailleSelectionnee(): void
    {
        $this->mettreAJourVariante();
    }

    public function updatedMatiereSelectionnee(): void
    {
        $this->mettreAJourVariante();
    }

    public function updatedQuantite($value): void
    {
        $this->quantite = max(1, (int)$value);

        // ✅ Bloquer la quantité au stock disponible
        if ($this->stockActuel > 0 && $this->quantite > $this->stockActuel) {
            $this->quantite = $this->stockActuel;
            $this->toastErreur = "⚠️ Stock limité à {$this->stockActuel} unité(s).";
        }
    }

    public function mettreAJourVariante(): void
    {
        $variante = $this->produit->variantes
            ->when($this->couleurSelectionnee, fn($q) => $q->where('couleur_id', $this->couleurSelectionnee))
            ->when($this->tailleSelectionnee, fn($q) => $q->where('taille_id', $this->tailleSelectionnee))
            ->when($this->matiereSelectionnee, fn($q) => $q->where('matiere_id', $this->matiereSelectionnee))
            ->first();

        if ($variante) {
            $this->varianteSelectionnee = $variante->id;

            if ($variante->prix && $variante->prix > 0) {
                $this->prixActuel = $variante->prix;
            } else {
                $this->prixActuel = $this->produit->prix_promo ?? $this->produit->prix_base;
            }

            $this->stockActuel = $variante->stock ?? 0;

            // ✅ Réinitialiser la quantité si elle dépasse le nouveau stock
            if ($this->quantite > $this->stockActuel && $this->stockActuel > 0) {
                $this->quantite = $this->stockActuel;
            }
        } else {
            $this->varianteSelectionnee = null;
            $this->prixActuel = $this->produit->prix_promo ?? $this->produit->prix_base;
            $this->stockActuel = 0;
        }

        $this->dispatch('prix-mis-a-jour', ['prix' => $this->prixActuel]);
    }

    public function ajouterAuPanier(): void
    {
        $this->toastErreur = null;

        // ✅ Vérification 1 : Variantes sélectionnées
        if ($this->produit->variantes->count() > 0 && !$this->varianteSelectionnee) {
            $this->toastErreur = '⚠️ Veuillez sélectionner toutes les options.';
            return;
        }

        // ✅ Vérification 2 : Stock disponible
        if ($this->stockActuel <= 0) {
            $this->toastErreur = '❌ Ce produit est en rupture de stock.';
            return;
        }

        // ✅ Vérification 3 : Quantité vs stock
        if ($this->quantite > $this->stockActuel) {
            $this->toastErreur = "⚠️ Stock limité à {$this->stockActuel} unité(s).";
            return;
        }

        // Ajout au panier
        $panier = session('panier', []);
        $cle = 'produit-' . $this->produit->id . '-' . ($this->varianteSelectionnee ?? 'defaut');

        if (isset($panier[$cle])) {
            $nouvelleQuantite = $panier[$cle]['quantite'] + $this->quantite;
            
            // ✅ Vérification 4 : Quantité totale dans le panier vs stock
            if ($nouvelleQuantite > $this->stockActuel) {
                $quantiteDisponible = $this->stockActuel - $panier[$cle]['quantite'];
                if ($quantiteDisponible <= 0) {
                    $this->toastErreur = "⚠️ Ce produit est déjà dans votre panier avec la quantité maximale ({$panier[$cle]['quantite']}).";
                    return;
                }
                $this->toastErreur = "⚠️ Stock limité. Vous avez déjà {$panier[$cle]['quantite']} unité(s) dans votre panier. Maximum disponible : {$quantiteDisponible}.";
                return;
            }
            
            $panier[$cle]['quantite'] = $nouvelleQuantite;
        } else {
            $panier[$cle] = [
                'type' => 'produit',
                'produit_id' => $this->produit->id,
                'variante_id' => $this->varianteSelectionnee,
                'quantite' => $this->quantite,
            ];
        }

        session(['panier' => $panier]);

        // Message personnalisé
        $message = $this->produit->nom;
        if ($this->varianteSelectionnee) {
            $variante = $this->produit->variantes->find($this->varianteSelectionnee);
            $details = [];
            if ($variante?->couleur) $details[] = $variante->couleur->nom;
            if ($variante?->taille) $details[] = $variante->taille->nom;
            if ($variante?->matiere) $details[] = $variante->matiere->nom;
            if ($details) $message .= ' (' . implode(' / ', $details) . ')';
        }
        $message .= ' ajouté au panier !';

        $this->toastSucces = $message;
        $this->dispatch('panier-modifie');
    }
};
?>

<div>
    {{-- ✅ TOAST SUCCÈS --}}
    @if ($toastSucces)
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-x-8"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0 transform translate-x-8"
            class="fixed top-6 right-6 z-[9999] bg-white border-2 border-green-500 rounded-2xl shadow-2xl p-4 max-w-sm">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-nissa-choco text-sm">Ajouté au panier !</p>
                    <p class="text-sm text-gray-600 mt-0.5">{{ $toastSucces }}</p>
                </div>
                <button @click="show = false" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <a href="{{ route('panier.index') }}"
                class="mt-3 block w-full text-center py-2 bg-nissa-choco text-white rounded-xl text-sm font-semibold hover:bg-nissa-rose transition">
                Voir mon panier →
            </a>
        </div>
    @endif

    {{-- ✅ TOAST ERREUR --}}
    @if ($toastErreur)
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-x-8"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0 transform translate-x-8"
            class="fixed top-6 right-6 z-[9999] bg-white border-2 border-red-500 rounded-2xl shadow-2xl p-4 max-w-sm">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-red-700 text-sm">Oups !</p>
                    <p class="text-sm text-gray-600 mt-0.5">{{ $toastErreur }}</p>
                </div>
                <button @click="show = false" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    {{-- SÉLECTION COULEUR --}}
    @if ($produit->variantes->count() > 0 && $produit->variantes->whereNotNull('couleur_id')->count() > 0)
        <div class="mb-6">
            <label class="block text-sm font-semibold text-nissa-choco mb-3">
                Couleur :
                <span class="font-normal text-gray-600">
                    @if ($couleurSelectionnee)
                        {{ $produit->variantes->firstWhere('couleur_id', $couleurSelectionnee)?->nom_complet }}
                    @else
                        Choisir
                    @endif
                </span>
            </label>
            <div class="flex flex-wrap gap-3">
                @foreach ($produit->variantes->filter(fn($v) => $v->couleur_id)->unique('couleur_id') as $variante)
                    @php
                        $allCouleurs = $variante->all_couleurs;
                    @endphp
                    <button type="button" wire:click="$set('couleurSelectionnee', {{ $variante->couleur_id }})"
                        class="relative transition-all hover:scale-110
                            {{ $couleurSelectionnee == $variante->couleur_id
                                ? 'ring-2 ring-nissa-rose ring-offset-2'
                                : 'ring-1 ring-gray-200' }}"
                        title="{{ $variante->nom_complet }}">

                        @if ($allCouleurs->count() === 1)
                            <div class="w-12 h-12 rounded-full"
                                style="background-color: {{ $allCouleurs->first()->code_hexadecimal ?? '#D98B92' }}">
                            </div>
                        @else
                            <div class="w-12 h-12 rounded-full overflow-hidden flex">
                                @foreach ($allCouleurs as $c)
                                    <div class="flex-1 h-full"
                                        style="background-color: {{ $c->code_hexadecimal ?? '#D98B92' }}">
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if ($couleurSelectionnee == $variante->couleur_id)
                            <svg class="w-5 h-5 text-white absolute inset-0 m-auto" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" style="filter: drop-shadow(0 1px 2px rgba(0,0,0,0.5));">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                            </svg>
                        @endif
                    </button>
                @endforeach
            </div>
        </div>
    @endif

    {{-- SÉLECTION TAILLE --}}
    @if ($produit->variantes->pluck('taille')->filter()->unique('id')->count() > 0)
        <div class="mb-6">
            <label class="block text-sm font-semibold text-nissa-choco mb-3">
                Taille :
                <span class="font-normal text-gray-600">
                    {{ $tailleSelectionnee
                        ? $produit->variantes->firstWhere('taille_id', $tailleSelectionnee)?->taille?->nom
                        : 'Choisir' }}
                </span>
            </label>
            <div class="flex flex-wrap gap-2">
                @foreach ($produit->variantes->pluck('taille')->filter()->unique('id') as $taille)
                    <button type="button" wire:click="$set('tailleSelectionnee', {{ $taille->id }})"
                        class="px-5 py-2.5 rounded-full border-2 font-medium transition-all text-sm
                                {{ $tailleSelectionnee == $taille->id
                                    ? 'border-nissa-choco bg-nissa-choco text-white'
                                    : 'border-gray-200 hover:border-nissa-rose text-nissa-choco' }}">
                        {{ $taille->nom }}
                    </button>
                @endforeach
            </div>
        </div>
    @endif

    {{-- SÉLECTION MATIÈRE --}}
    @if ($produit->variantes->pluck('matiere')->filter()->unique('id')->count() > 0)
        <div class="mb-6">
            <label class="block text-sm font-semibold text-nissa-choco mb-3">
                Matière :
                <span class="font-normal text-gray-600">
                    {{ $matiereSelectionnee
                        ? $produit->variantes->firstWhere('matiere_id', $matiereSelectionnee)?->matiere?->nom
                        : 'Choisir' }}
                </span>
            </label>
            <div class="flex flex-wrap gap-2">
                @foreach ($produit->variantes->pluck('matiere')->filter()->unique('id') as $matiere)
                    <button type="button" wire:click="$set('matiereSelectionnee', {{ $matiere->id }})"
                        class="px-5 py-2.5 rounded-full border-2 font-medium transition-all text-sm
                                {{ $matiereSelectionnee == $matiere->id
                                    ? 'border-nissa-choco bg-nissa-choco text-white'
                                    : 'border-gray-200 hover:border-nissa-rose text-nissa-choco' }}">
                        {{ $matiere->nom }}
                    </button>
                @endforeach
            </div>
        </div>
    @endif

    {{-- PRIX DYNAMIQUE + STOCK --}}
    <div class="mb-6 p-4 bg-nissa-cream rounded-2xl">
        <div class="flex items-baseline gap-3">
            <span class="text-3xl font-bold text-nissa-rose">
                {{ number_format($prixActuel, 0, ',', ' ') }}
            </span>
            <span class="text-sm text-gray-500">FCFA</span>
            @if ($produit->prix_promo && $prixActuel == $produit->prix_promo)
                <span class="text-lg text-gray-400 line-through">
                    {{ number_format($produit->prix_base, 0, ',', ' ') }} FCFA
                </span>
            @endif
        </div>
        @if ($produit->variantes->count() > 0)
            <p class="text-sm mt-2 {{ $stockActuel > 5 ? 'text-green-600' : ($stockActuel > 0 ? 'text-orange-600' : 'text-red-500') }}">
                @if ($stockActuel > 0)
                    ✓ {{ $stockActuel }} en stock
                @else
                    ✕ Rupture de stock
                @endif
            </p>
        @endif
    </div>

    {{-- QUANTITÉ --}}
    <div class="mb-8">
        <label class="block text-sm font-semibold text-nissa-choco mb-3">Quantité</label>
        <div class="inline-flex items-center border-2 border-gray-200 rounded-full">
            <button type="button" wire:click="$set('quantite', {{ max(1, $quantite - 1) }})"
                class="w-12 h-12 flex items-center justify-center hover:bg-nissa-cream rounded-l-full transition"
                @if ($quantite <= 1) disabled @endif>
                −
            </button>

            <input type="number"
                wire:model.live="quantite"
                min="1"
                max="{{ $stockActuel > 0 ? $stockActuel : 999 }}"
                class="w-16 h-12 text-center font-bold text-lg border-0 focus:ring-0 focus:outline-none bg-transparent"
                style="-moz-appearance: textfield;">

            <button type="button" wire:click="$set('quantite', {{ $quantite + 1 }})"
                class="w-12 h-12 flex items-center justify-center hover:bg-nissa-cream rounded-r-full transition"
                @if ($quantite >= $stockActuel && $stockActuel > 0) disabled @endif>
                +
            </button>
        </div>

        @if ($produit->variantes->count() > 0 && $stockActuel > 0)
            <p class="text-xs text-gray-500 mt-2">
                {{ $stockActuel }} disponible(s) en stock
            </p>
        @endif
    </div>

    <div class="space-y-3">
        <button type="button" wire:click="ajouterAuPanier"
            @if ($produit->variantes->count() > 0 && !$varianteSelectionnee) disabled @endif
            @if ($stockActuel <= 0) disabled @endif
            class="w-full btn-nissa flex items-center justify-center gap-3 text-lg py-4
                    {{ ($produit->variantes->count() > 0 && !$varianteSelectionnee) || $stockActuel <= 0 ? 'opacity-50 cursor-not-allowed' : '' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            @if ($produit->variantes->count() > 0 && !$varianteSelectionnee)
                Choisir les options
            @elseif ($stockActuel <= 0)
                Rupture de stock
            @else
                Ajouter au panier
            @endif
        </button>
    </div>
</div>

<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>