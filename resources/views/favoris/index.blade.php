@extends('layouts.principal')

@section('content')

<!-- Hero Favoris -->
<section class="bg-gradient-to-br from-[#FBF8F3] to-[#F8F4EF] py-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block text-xs font-semibold uppercase tracking-[0.3em] text-nissa-rose mb-4">
            ❤️ Mes coups de cœur
        </span>
        <h1 class="text-4xl md:text-5xl font-bold text-nissa-choco" style="font-family: 'Playfair Display', serif;">
            Mes Favoris
        </h1>
        <p class="text-gray-600 mt-4">
            {{ $total }} {{ Str::plural('article', $total) }} sauvegardé{{ $total > 1 ? 's' : '' }}
        </p>
    </div>
</section>

<div class="max-w-7xl mx-auto px-4 py-12">
    @if($produits->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($produits as $produit)
                @php
                    $imagePrincipale = $produit->images->where('est_principale', true)->first() ?? $produit->images->first();
                    $cheminImage = $imagePrincipale 
                        ? (str_starts_with($imagePrincipale->chemin, 'http') ? $imagePrincipale->chemin : asset('storage/' . $imagePrincipale->chemin))
                        : null;
                @endphp
                
                <article class="group">
                    <div class="relative aspect-[4/5] bg-nissa-cream rounded-2xl overflow-hidden mb-4">
                        <a href="{{ route('produit.afficher', $produit->slug) }}" class="block w-full h-full">
                            @if($cheminImage)
                                <img src="{{ $cheminImage }}" alt="{{ $produit->nom }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-16 h-16 text-nissa-rose/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                        </a>
                        
                        <!-- Bouton Retirer -->
                        <form method="POST" action="{{ route('favoris.retirer', $produit->id) }}" 
                              class="absolute top-4 right-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-10 h-10 rounded-full bg-white/95 backdrop-blur flex items-center justify-center text-nissa-rose hover:bg-nissa-rose hover:text-white transition shadow-sm"
                                    title="Retirer des favoris">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                    
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">
                            {{ $produit->categorie->nom ?? 'Nissa' }}
                        </p>
                        <a href="{{ route('produit.afficher', $produit->slug) }}">
                            <h3 class="font-semibold text-nissa-choco mb-2 group-hover:text-nissa-rose transition line-clamp-1">
                                {{ $produit->nom }}
                            </h3>
                        </a>
                        <div class="flex items-baseline gap-2 mb-3">
                            <span class="text-lg font-bold text-nissa-choco">
                                {{ number_format($produit->prix_base, 0, ',', ' ') }}
                            </span>
                            <span class="text-xs text-gray-500">FCFA</span>
                        </div>
                        
                        <form method="POST" action="{{ route('panier.ajouter') }}">
                            @csrf
                            <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                            <input type="hidden" name="quantite" value="1">
                            <button type="submit"
                                    class="w-full py-2.5 rounded-xl bg-nissa-choco text-white text-sm font-medium hover:bg-nissa-rose transition">
                                Ajouter au panier
                            </button>
                        </form>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <div class="text-center py-24">
            <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-nissa-cream flex items-center justify-center">
                <svg class="w-12 h-12 text-nissa-rose/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" 
                          d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-nissa-choco mb-3" style="font-family: 'Playfair Display', serif;">
                Aucun favori pour le moment
            </h3>
            <p class="text-gray-500 mb-8 max-w-md mx-auto">
                Cliquez sur le ❤️ pour sauvegarder vos coups de cœur et les retrouver ici.
            </p>
            <a href="{{ route('boutique') }}" class="btn-nissa inline-flex items-center gap-2">
                Découvrir la boutique
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    @endif
</div>

@endsection