<?php

use Livewire\Volt\Component;
use App\Models\Produit;
use App\Models\VarianteProduit;
use App\Models\Pack;

new class extends Component {
    public array $articles = [];
    public int $sousTotalCalculé = 0;

    // Modale de confirmation
    public bool $afficherModaleConfirmation = false;
    public string $cleASupprimer = '';
    public string $typeSuppression = '';

    public function mount(): void
    {
        $this->chargerPanier();
    }

    public function chargerPanier(): void
    {
        $panier = session('panier', []);
        $this->articles = [];

        foreach ($panier as $cle => $item) {
            if (($item['type'] ?? null) === 'pack') {
                $pack = Pack::with(['articles.produit.images', 'articles.produit.categorie'])->find($item['pack_id']);
                if (!$pack) continue;

                $prixUnitaire = $item['prix_unitaire'] ?? ($pack->prix_promo ?? $pack->prix_base);

                $this->articles[$cle] = [
                    'cle' => $cle,
                    'type' => 'pack',
                    'pack' => $pack,
                    'quantite' => $item['quantite'],
                    'prix_unitaire' => $prixUnitaire,
                    'total' => $prixUnitaire * $item['quantite'],
                ];
            } else {
                $produit = Produit::with('images')->find($item['produit_id'] ?? null);
                if (!$produit) continue;

                $variante = null;
                if (!empty($item['variante_id'])) {
                    $variante = VarianteProduit::with(['matiere', 'couleur', 'taille'])->find($item['variante_id']);
                }

                $prix = $variante && $variante->prix ? $variante->prix : $produit->prix_base;

                $this->articles[$cle] = [
                    'cle' => $cle,
                    'type' => 'produit',
                    'produit' => $produit,
                    'variante' => $variante,
                    'quantite' => $item['quantite'],
                    'prix_unitaire' => $prix,
                    'total' => $prix * $item['quantite'],
                ];
            }
        }

        $this->sousTotalCalculé = array_sum(array_column($this->articles, 'total'));
    }

    public function incrementer(string $cle): void
    {
        $panier = session('panier', []);
        if (isset($panier[$cle])) {
            $panier[$cle]['quantite']++;
            session(['panier' => $panier]);
            $this->chargerPanier();
            $this->dispatch('panier-modifie');
        }
    }

    public function decrementer(string $cle): void
    {
        $panier = session('panier', []);
        if (isset($panier[$cle]) && $panier[$cle]['quantite'] > 1) {
            $panier[$cle]['quantite']--;
            session(['panier' => $panier]);
            $this->chargerPanier();
            $this->dispatch('panier-modifie');
        }
    }

    public function demanderSuppression(string $cle): void
    {
        $this->cleASupprimer = $cle;
        $this->typeSuppression = 'article';
        $this->afficherModaleConfirmation = true;
    }

    public function demanderVidage(): void
    {
        $this->typeSuppression = 'tout';
        $this->afficherModaleConfirmation = true;
    }

    public function confirmerSuppression(): void
    {
        $panier = session('panier', []);

        if ($this->typeSuppression === 'tout') {
            session(['panier' => []]);
            $this->chargerPanier();
            $this->dispatch('panier-modifie');
            session()->flash('succes', 'Panier vidé');
        } else {
            if (isset($panier[$this->cleASupprimer])) {
                unset($panier[$this->cleASupprimer]);
                session(['panier' => $panier]);
                $this->chargerPanier();
                $this->dispatch('panier-modifie');
                session()->flash('succes', 'Article retiré du panier');
            }
        }

        $this->afficherModaleConfirmation = false;
        $this->cleASupprimer = '';
        $this->typeSuppression = '';
    }

    public function annulerSuppression(): void
    {
        $this->afficherModaleConfirmation = false;
        $this->cleASupprimer = '';
        $this->typeSuppression = '';
    }

    public function getSousTotalProperty(): int
    {
        return array_sum(array_column($this->articles, 'total'));
    }

    public function getNombreArticlesProperty(): int
    {
        return array_sum(array_column($this->articles, 'quantite'));
    }
};
?>

<div>
    {{-- Toast de succès --}}
    @if (session()->has('succes'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed top-24 right-4 z-50 bg-white border-2 border-nissa-rose rounded-2xl shadow-2xl p-4 max-w-sm">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-nissa-rose/10 rounded-full flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-nissa-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-nissa-choco text-sm">{{ session('succes') }}</p>
                </div>
                <button @click="show = false" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    @endif

    {{-- Modale de confirmation --}}
    @if ($afficherModaleConfirmation)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
            <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full p-8">
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 bg-red-50 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-nissa-choco mb-2" style="font-family: 'Playfair Display', serif;">
                        @if ($typeSuppression === 'tout')
                            Vider tout le panier ?
                        @else
                            Supprimer cet article ?
                        @endif
                    </h3>
                    <p class="text-sm text-gray-500 mb-6">
                        @if ($typeSuppression === 'tout')
                            Tous les articles seront retirés de votre panier.
                        @else
                            Cet article sera retiré de votre panier.
                        @endif
                    </p>
                    <div class="flex gap-3">
                        <button wire:click="annulerSuppression"
                            class="flex-1 px-6 py-3 border-2 border-gray-200 text-gray-700 rounded-2xl font-semibold hover:bg-gray-50 transition">
                            Annuler
                        </button>
                        <button wire:click="confirmerSuppression"
                            class="flex-1 px-6 py-3 bg-red-500 text-white rounded-2xl font-semibold hover:bg-red-600 transition">
                            Confirmer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (count($articles) > 0)

        {{-- Liste des articles --}}
        <div class="space-y-5">
            @foreach ($articles as $cle => $article)

                {{-- PACK --}}
                @if ($article['type'] === 'pack')
                    <article class="bg-white rounded-3xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden">
                        <div class="p-6 sm:p-7">
                            <div class="flex items-start gap-4">
                                <div class="w-14 h-14 bg-nissa-rose/10 rounded-2xl flex items-center justify-center shrink-0">
                                    <svg class="w-7 h-7 text-nissa-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                                    </svg>
                                </div>

                                <div class="flex-1 min-w-0">
                                    <span class="text-[10px] uppercase tracking-[0.2em] font-semibold text-nissa-rose">
                                        Pack · {{ $article['pack']->articles->count() }} pièces
                                    </span>
                                    <h3 class="text-lg sm:text-xl font-semibold text-nissa-choco mt-1" style="font-family: 'Playfair Display', serif;">
                                        {{ $article['pack']->nom }}
                                    </h3>
                                </div>

                                <div class="text-right shrink-0">
                                    <p class="text-lg sm:text-xl font-bold text-nissa-choco">
                                        {{ number_format($article['total'], 0, ',', ' ') }}
                                    </p>
                                    <span class="text-xs text-gray-400">FCFA</span>
                                </div>
                            </div>

                            <div class="mt-6 grid gap-3">
                                @foreach ($article['pack']->articles as $packArticle)
                                    @php
                                        $img = $packArticle->produit->images->where('est_principale', true)->first() ?? $packArticle->produit->images->first();
                                        $cheminImg = $img ? (str_starts_with($img->chemin, 'http') ? $img->chemin : asset('storage/' . $img->chemin)) : null;
                                    @endphp
                                    <div class="flex items-center gap-3 bg-gray-50 rounded-2xl p-3">
                                        <div class="w-12 h-12 rounded-xl bg-white overflow-hidden shrink-0 border border-gray-100">
                                            @if ($cheminImg)
                                                <img src="{{ $cheminImg }}" alt="{{ $packArticle->produit->nom }}" class="w-full h-full object-cover">
                                            @endif
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-700 truncate">{{ $packArticle->produit->nom }}</p>
                                        </div>
                                        <span class="text-xs font-semibold text-nissa-rose shrink-0">×{{ $packArticle->quantite }}</span>
                                    </div>
                                @endforeach
                            </div>

                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mt-6">
                                <div class="flex items-center gap-3">
                                    <span class="text-sm text-gray-500">Quantité</span>
                                    <div class="inline-flex items-center bg-gray-100 rounded-full p-1">
                                        <button wire:click="decrementer('{{ $cle }}')"
                                            class="w-8 h-8 rounded-full bg-white text-gray-600 hover:bg-nissa-rose hover:text-white transition flex items-center justify-center shadow-sm">−</button>
                                        <span class="w-10 text-center font-semibold text-nissa-choco">{{ $article['quantite'] }}</span>
                                        <button wire:click="incrementer('{{ $cle }}')"
                                            class="w-8 h-8 rounded-full bg-white text-gray-600 hover:bg-nissa-rose hover:text-white transition flex items-center justify-center shadow-sm">+</button>
                                    </div>
                                </div>
                                <button wire:click="demanderSuppression('{{ $cle }}')" class="text-sm text-gray-400 hover:text-red-500 transition">
                                    Supprimer le pack
                                </button>
                            </div>
                        </div>
                    </article>

                {{-- PRODUIT SIMPLE --}}
                @else
                    @php
                        $image = $article['produit']->images->where('est_principale', true)->first() ?? $article['produit']->images->first();
                        $cheminImage = $image ? (str_starts_with($image->chemin, 'http') ? $image->chemin : asset('storage/' . $image->chemin)) : null;
                    @endphp

                    <article class="bg-white rounded-3xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow duration-300 p-5 sm:p-6">
                        <div class="flex flex-col sm:flex-row gap-5">
                            <div class="w-full sm:w-28 h-28 bg-gray-50 rounded-2xl overflow-hidden shrink-0 border border-gray-100">
                                @if ($cheminImage)
                                    <img src="{{ $cheminImage }}" alt="{{ $article['produit']->nom }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-10 h-10 text-nissa-rose/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <div class="flex-1 min-w-0">
                                <span class="text-[10px] uppercase tracking-[0.18em] text-gray-400">
                                    {{ $article['produit']->categorie->nom ?? 'Accessoire' }}
                                </span>
                                <h3 class="text-lg sm:text-xl font-semibold text-nissa-choco mt-1" style="font-family: 'Playfair Display', serif;">
                                    {{ $article['produit']->nom }}
                                </h3>

                                @if ($article['variante'])
                                    <div class="flex flex-wrap gap-x-3 gap-y-1 mt-2">
                                        @if ($article['variante']->matiere)
                                            <span class="text-sm text-gray-500">{{ $article['variante']->matiere->nom }}</span>
                                        @endif
                                        @if ($article['variante']->couleur)
                                            <span class="text-sm text-gray-500">· {{ $article['variante']->couleur->nom }}</span>
                                        @endif
                                        @if ($article['variante']->taille)
                                            <span class="text-sm text-gray-500">· {{ $article['variante']->taille->nom }}</span>
                                        @endif
                                    </div>
                                @endif

                                <p class="text-sm font-semibold text-nissa-rose mt-3">
                                    {{ number_format($article['prix_unitaire'], 0, ',', ' ') }} FCFA
                                </p>
                            </div>

                            <div class="flex sm:flex-col sm:items-end justify-between gap-4 sm:min-w-[150px]">
                                <div class="text-left sm:text-right">
                                    <p class="text-[10px] uppercase tracking-wider text-gray-400">Total</p>
                                    <p class="text-xl font-bold text-nissa-choco mt-1">
                                        {{ number_format($article['total'], 0, ',', ' ') }}
                                        <span class="text-xs font-medium">FCFA</span>
                                    </p>
                                </div>

                                <div class="inline-flex items-center bg-gray-100 rounded-full p-1">
                                    <button wire:click="decrementer('{{ $cle }}')"
                                        class="w-8 h-8 rounded-full bg-white hover:bg-nissa-rose hover:text-white transition flex items-center justify-center shadow-sm">−</button>
                                    <span class="w-9 text-center text-sm font-semibold text-nissa-choco">{{ $article['quantite'] }}</span>
                                    <button wire:click="incrementer('{{ $cle }}')"
                                        class="w-8 h-8 rounded-full bg-white hover:bg-nissa-rose hover:text-white transition flex items-center justify-center shadow-sm">+</button>
                                </div>

                                <button wire:click="demanderSuppression('{{ $cle }}')" class="text-xs text-gray-400 hover:text-red-500 transition">
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    </article>
                @endif
            @endforeach
        </div>

        {{-- Récapitulatif --}}
        <div class="bg-nissa-choco text-white rounded-3xl p-6 sm:p-7 mt-8 mb-6">
            <div class="flex justify-between text-white/70 mb-3">
                <span>Sous-total ({{ $this->nombreArticles }} article(s))</span>
                <span>{{ number_format($this->sousTotal, 0, ',', ' ') }} FCFA</span>
            </div>
            <div class="flex justify-between text-white/70 mb-5">
                <span>Livraison</span>
                <span class="text-nissa-rose font-medium">À définir</span>
            </div>
            <div class="pt-5 border-t border-white/20 flex justify-between items-center">
                <span class="text-xl font-bold text-white">Total</span>
                <span class="text-2xl font-bold text-nissa-rose">
                    {{ number_format($this->sousTotal, 0, ',', ' ') }}
                    <span class="text-sm">FCFA</span>
                </span>
            </div>
        </div>

        {{-- Message d'orientation --}}
        <div class="bg-nissa-rose/5 border border-nissa-rose/20 rounded-3xl p-6 mb-6 text-center">
            <p class="text-sm text-gray-700 mb-1 font-medium">Prête à commander ?</p>
            <p class="text-xs text-gray-500">
                Passez à l'étape suivante pour saisir vos informations de livraison et choisir votre mode de paiement.
            </p>
        </div>

        {{-- Boutons d'action --}}
        <div class="space-y-3">
            <a href="{{ route('commande.index') }}" class="btn-nissa block text-center text-lg py-4">
                Continuer vers le paiement →
            </a>
            <button type="button" onclick="commanderWhatsApp()"
                class="w-full bg-white border border-gray-200 text-nissa-choco hover:border-nissa-rose hover:text-nissa-rose text-center px-6 py-4 rounded-2xl font-semibold transition">
                Commander rapidement via WhatsApp
            </button>
        </div>

        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('boutique') }}" class="text-sm text-gray-500 hover:text-nissa-rose transition">
                ← Continuer mes achats
            </a>
            <button wire:click="demanderVidage" class="text-sm text-gray-400 hover:text-red-500 transition">
                Vider le panier
            </button>
        </div>

        {{-- Script WhatsApp SIMPLIFIÉ --}}
        <script>
            function commanderWhatsApp() {
                const articlesPanier = @json(array_values($articles));
                const sousTotalPanier = @json($sousTotalCalculé);
                const urlSite = window.location.origin;

                let message = 'Bonjour Nissa Accessoires !\n\n';
                message += 'Je souhaite commander :\n\n';

                let counter = 1;
                articlesPanier.forEach(function(article) {
                    if (article.type === 'pack') {
                        message += counter + '. PACK : ' + article.pack.nom + '\n';
                        message += '   Quantité : ' + article.quantite + '\n';
                        message += '   Prix : ' + article.prix_unitaire.toLocaleString('fr-FR') + ' FCFA\n';
                        message += '   Total : ' + article.total.toLocaleString('fr-FR') + ' FCFA\n';
                        message += '   Contenu :\n';
                        article.pack.articles.forEach(function(packArticle) {
                            message += '      - ' + packArticle.produit.nom + ' (×' + packArticle.quantite + ')\n';
                        });
                        message += '   Voir : ' + urlSite + '/packs/' + article.pack.slug + '\n\n';
                    } else {
                        const nomProduit = article.produit.nom;
                        let options = [];
                        if (article.variante) {
                            if (article.variante.couleur) options.push('Couleur: ' + article.variante.couleur.nom);
                            if (article.variante.taille) options.push('Taille: ' + article.variante.taille.nom);
                            if (article.variante.matiere) options.push('Matière: ' + article.variante.matiere.nom);
                        }
                        message += counter + '. ' + nomProduit + '\n';
                        if (options.length > 0) message += '   ' + options.join(' | ') + '\n';
                        message += '   Quantité : ' + article.quantite + '\n';
                        message += '   Prix : ' + article.prix_unitaire.toLocaleString('fr-FR') + ' FCFA\n';
                        message += '   Total : ' + article.total.toLocaleString('fr-FR') + ' FCFA\n';
                        message += '   Voir : ' + urlSite + '/produit/' + article.produit.slug + '\n\n';
                    }
                    counter++;
                });

                message += '--------------------------------\n';
                message += 'TOTAL : ' + sousTotalPanier.toLocaleString('fr-FR') + ' FCFA\n';
                message += '--------------------------------\n\n';
                message += 'Merci de me confirmer la disponibilité !';

                const url = 'https://wa.me/2290191309710?text=' + encodeURIComponent(message);
                window.open(url, '_blank');
            }
        </script>

    @else
        {{-- Panier vide --}}
        <div class="bg-white rounded-3xl border border-gray-200 text-center py-24 px-6">
            <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-gray-50 flex items-center justify-center">
                <svg class="w-10 h-10 text-nissa-rose/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
            </div>
            <h2 class="text-3xl font-semibold text-nissa-choco mb-3" style="font-family: 'Playfair Display', serif;">
                Votre panier est vide
            </h2>
            <p class="text-gray-500 mb-8">Découvrez les créations de Nissa.</p>
            <a href="{{ route('boutique') }}" class="btn-nissa inline-block px-8 py-3">Découvrir la boutique</a>
        </div>
    @endif
</div>