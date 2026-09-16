@extends('layouts.principal')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">

        <div class="mb-10">
            <h1 class="text-4xl md:text-5xl font-bold text-nissa-choco mb-2"
                style="font-family: 'Playfair Display', serif;">
                Résultats pour "<span class="italic text-nissa-rose">{{ request('q') }}</span>"
            </h1>
            <p class="text-gray-500">{{ $produits->total() }} produit(s) trouvé(s)</p>
        </div>

        @if ($produits->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-12">
                @foreach ($produits as $produit)
                    @php
                        $imagePrincipale = $produit->images->where('est_principale', true)->first() ?? $produit->images->first();
                        $cheminImage = $imagePrincipale
                            ? (str_starts_with($imagePrincipale->chemin, 'http')
                                ? $imagePrincipale->chemin
                                : asset('storage/' . $imagePrincipale->chemin))
                            : null;
                    @endphp

                    <article class="group">
                        <div class="relative aspect-[4/5] bg-[#FAF6F0] rounded-2xl overflow-hidden mb-4">
                            <a href="{{ route('produit.afficher', $produit->slug) }}" class="block w-full h-full">
                                @if ($cheminImage)
                                    <img src="{{ $cheminImage }}" alt="{{ $produit->nom }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                        loading="lazy">
                                @endif
                            </a>
                        </div>
                        <div>
                            <p class="text-[11px] uppercase tracking-[0.2em] text-gray-400 mb-2">
                                {{ $produit->categorie->nom ?? 'Nissa' }}
                            </p>
                            <a href="{{ route('produit.afficher', $produit->slug) }}">
                                <h3 class="text-base font-semibold text-nissa-choco mb-2 group-hover:text-nissa-rose transition line-clamp-1">
                                    {{ $produit->nom }}
                                </h3>
                            </a>
                            <div class="flex items-baseline gap-2">
                                <span class="text-lg font-bold text-nissa-choco">
                                    {{ number_format($produit->prix_promo ?? $produit->prix_base, 0, ',', ' ') }} FCFA
                                </span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            @if ($produits->hasPages())
                <div class="mt-16 flex justify-center">
                    {{ $produits->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-24">
                <svg class="w-24 h-24 text-gray-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <h3 class="text-2xl font-bold text-nissa-choco mb-3" style="font-family: 'Playfair Display', serif;">
                    Aucun produit trouvé
                </h3>
                <p class="text-gray-500 mb-8">Essayez avec d'autres mots-clés</p>
                <a href="{{ route('boutique') }}" class="inline-block bg-nissa-choco text-white px-8 py-3 rounded-2xl font-semibold hover:bg-nissa-rose transition">
                    Voir toute la boutique
                </a>
            </div>
        @endif
    </div>
</section>
@endsection