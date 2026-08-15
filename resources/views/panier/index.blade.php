@extends('layouts.principal')

@section('content')

<div class="max-w-4xl mx-auto px-4 py-12">
    
    <!-- Titre -->
    <div class="mb-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-nissa-choco" style="font-family: 'Playfair Display', serif;">
            Mon <span class="italic text-nissa-rose">Panier</span>
        </h1>
        <p class="text-gray-600 mt-2">Vérifiez vos articles avant de commander</p>
    </div>

    @if(count($panier) > 0)
        <!-- Liste des articles -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8">
            @foreach($panier as $cle => $article)
                @php
                    $produit = \App\Models\Produit::with('images')->find($article['produit_id']);
                    $variante = $article['variante_id'] ? \App\Models\VarianteProduit::with(['matiere', 'couleur', 'taille'])->find($article['variante_id']) : null;
                    $prix = $variante && $variante->prix ? $variante->prix : ($produit ? $produit->prix_base : 0);
                    $total = $prix * $article['quantite'];
                @endphp
                
                @if($produit)
                    <div class="flex items-center gap-4 p-6 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                        <!-- Image -->
                        <div class="w-24 h-24 bg-nissa-cream rounded-xl overflow-hidden flex-shrink-0">
                            @if($produit->images->where('est_principale', true)->first())
                                <img src="{{ asset('storage/' . $produit->images->where('est_principale', true)->first()->chemin) }}" 
                                     alt="{{ $produit->nom }}"
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-10 h-10 text-nissa-rose/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Infos -->
                        <div class="flex-1">
                            <h3 class="font-bold text-nissa-choco mb-1">{{ $produit->nom }}</h3>
                            @if($variante)
                                <p class="text-sm text-gray-500">
                                    @if($variante->couleur){{ $variante->couleur->nom }}@endif
                                    @if($variante->taille) / {{ $variante->taille->nom }}@endif
                                    @if($variante->matiere) / {{ $variante->matiere->nom }}@endif
                                </p>
                            @endif
                            <p class="text-sm text-gray-500 mt-1">
                                {{ number_format($prix, 0, ',', ' ') }} FCFA × {{ $article['quantite'] }}
                            </p>
                        </div>
                        
                        <!-- Prix total -->
                        <div class="text-right">
                            <p class="text-xl font-bold text-nissa-rose">
                                {{ number_format($total, 0, ',', ' ') }} FCFA
                            </p>
                            <form action="{{ route('panier.supprimer', $cle) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs text-gray-500 hover:text-red-500 transition">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Récapitulatif -->
        <div class="bg-nissa-cream rounded-2xl p-6 mb-8">
            @php
                $sousTotal = 0;
                foreach($panier as $article) {
                    $produit = \App\Models\Produit::find($article['produit_id']);
                    $variante = $article['variante_id'] ? \App\Models\VarianteProduit::find($article['variante_id']) : null;
                    $prix = $variante && $variante->prix ? $variante->prix : ($produit ? $produit->prix_base : 0);
                    $sousTotal += $prix * $article['quantite'];
                }
            @endphp
            
            <div class="flex justify-between mb-2 text-gray-600">
                <span>Sous-total</span>
                <span>{{ number_format($sousTotal, 0, ',', ' ') }} FCFA</span>
            </div>
            <div class="flex justify-between mb-4 text-gray-600">
                <span>Livraison</span>
                <span>À définir</span>
            </div>
            <div class="flex justify-between pt-4 border-t border-nissa-rose/20">
                <span class="text-xl font-bold text-nissa-choco">Total</span>
                <span class="text-xl font-bold text-nissa-rose">{{ number_format($sousTotal, 0, ',', ' ') }} FCFA</span>
            </div>
        </div>

        <!-- Les 2 boutons de commande -->
        <div class="space-y-3">
            <a href="{{ route('commande.index') }}" class="btn-nissa block text-center text-lg py-4">
                💳 Continuer vers le paiement
            </a>
            
            <a href="https://wa.me/22900000000?text={{ urlencode('Bonjour Nissa ! Je souhaite commander les articles de mon panier.') }}" 
               target="_blank"
               class="block w-full bg-green-500 hover:bg-green-600 text-white text-center px-6 py-4 rounded-full font-semibold transition shadow-lg">
                💬 Commander via WhatsApp
            </a>
        </div>

        <a href="{{ route('boutique') }}" class="block text-center mt-6 text-gray-500 hover:text-nissa-rose">
            ← Continuer mes achats
        </a>

    @else
        <!-- Panier vide -->
        <div class="text-center py-20 bg-white rounded-2xl border border-gray-100">
            <svg class="w-24 h-24 text-nissa-rose/30 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
            </svg>
            <h2 class="text-2xl font-bold text-nissa-choco mb-3" style="font-family: 'Playfair Display', serif;">
                Votre panier est vide
            </h2>
            <p class="text-gray-600 mb-8">Découvrez nos créations artisanales</p>
            <a href="{{ route('boutique') }}" class="btn-nissa inline-block px-8 py-3">
                Découvrir la boutique
            </a>
        </div>
    @endif
</div>

@endsection