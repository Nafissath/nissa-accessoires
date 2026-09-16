@extends('layouts.principal')

@section('content')
    {{-- ============================================================
     FIL D'ARIANE
============================================================= --}}
    <section class="bg-white border-b border-[#F9EBEA]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <nav class="flex items-center gap-2 text-sm text-[#4A3525]/60">
                <a href="{{ route('accueil') }}" class="hover:text-[#E8A598] transition">Accueil</a>
                <span>/</span>
                <a href="{{ route('packs.index') }}" class="hover:text-[#E8A598] transition">Packs</a>
                <span>/</span>
                <span class="text-[#4A3525] font-medium">{{ $pack->nom }}</span>
            </nav>
        </div>
    </section>

    {{-- ============================================================
     FICHE PACK
============================================================= --}}
    <section class="py-12 md:py-16 bg-[#FDFBF7]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-start">

                {{-- ============ IMAGE ============ --}}
                @php
                    // Priorité 1 : Image du pack (uploadée dans l'admin)
if ($pack->image) {
    $cheminImage = str_starts_with($pack->image, 'http')
        ? $pack->image
        : asset('storage/' . $pack->image);
} else {
    // Priorité 2 : Image du premier produit du pack
    $premierArticle = $pack->articles->first();
    $imagePrincipale =
        $premierArticle && $premierArticle->produit
            ? $premierArticle->produit->images->where('est_principale', true)->first() ??
                $premierArticle->produit->images->first()
            : null;
    $cheminImage = $imagePrincipale
        ? (str_starts_with($imagePrincipale->chemin, 'http')
            ? $imagePrincipale->chemin
            : asset('storage/' . $imagePrincipale->chemin))
                            : null;
                    }
                @endphp

                <div class="relative aspect-square bg-white rounded-3xl overflow-hidden shadow-xl">
                    @if ($cheminImage)
                        <img src="{{ $cheminImage }}" alt="{{ $pack->nom }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-[#E8A598]/40">
                            <svg class="w-24 h-24 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            <span class="text-sm">Coffret Nissa</span>
                        </div>
                    @endif

                    {{-- Badge économie --}}
                    @if ($pack->prix_promo)
                        @php $economie = $pack->prix_base - $pack->prix_promo; @endphp
                        <span
                            class="absolute top-5 right-5 bg-[#E8A598] text-white px-4 py-1.5 rounded-full text-xs font-bold shadow-lg">
                            Économisez {{ number_format($economie, 0, ',', ' ') }} FCFA
                        </span>
                    @endif
                </div>
            </div>

            {{-- ============ INFOS ============ --}}
            <div>
                <span class="inline-block text-xs font-semibold uppercase tracking-[0.25em] text-[#E8A598] mb-2">
                    {{ $pack->categorie ?? 'Édition Spéciale' }}
                </span>

                <h1 class="text-3xl md:text-5xl font-bold text-[#4A3525] mb-4 leading-tight"
                    style="font-family: 'Playfair Display', serif;">
                    {{ $pack->nom }}
                </h1>

                <p class="text-[#4A3525]/80 leading-relaxed mb-8">
                    {{ $pack->description ?? 'Un ensemble d\'accessoires assortis, créés sur-mesure pour vous.' }}
                </p>

                {{-- Prix --}}
                <div class="flex items-baseline gap-4 mb-8 pb-8 border-b border-[#F9EBEA]">
                    @if ($pack->prix_promo)
                        <span class="text-4xl font-bold text-[#4A3525]">
                            {{ number_format($pack->prix_promo, 0, ',', ' ') }}
                        </span>
                        <span class="text-xl text-gray-400 line-through">
                            {{ number_format($pack->prix_base, 0, ',', ' ') }}
                        </span>
                    @else
                        <span class="text-4xl font-bold text-[#4A3525]">
                            {{ number_format($pack->prix_base, 0, ',', ' ') }}
                        </span>
                    @endif
                    <span class="text-base font-semibold text-gray-500">FCFA</span>
                </div>

                {{-- Contenu du coffret --}}
                <div class="bg-white rounded-2xl border border-[#F9EBEA] p-6 mb-8">
                    <h3 class="text-sm font-bold uppercase tracking-widest text-[#4A3525] mb-4">
                        Ce coffret contient ({{ $pack->articles->sum('quantite') }} pièces)
                    </h3>
                    <ul class="space-y-3">
                        @foreach ($pack->articles as $article)
                            @php
                                $imgArt =
                                    $article->produit->images->where('est_principale', true)->first() ??
                                    $article->produit->images->first();
                                $cheminImgArt = $imgArt
                                    ? (str_starts_with($imgArt->chemin, 'http')
                                        ? $imgArt->chemin
                                        : asset('storage/' . $imgArt->chemin))
                                    : null;
                            @endphp
                            <li class="flex items-center gap-4">
                                <div class="w-14 h-14 rounded-xl bg-[#FDFBF7] overflow-hidden shrink-0">
                                    @if ($cheminImgArt)
                                        <img src="{{ $cheminImgArt }}" alt="{{ $article->produit->nom }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-[#E8A598]/40">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-[#4A3525]">{{ $article->produit->nom }}</p>
                                    <p class="text-xs text-gray-500">
                                        {{ $article->produit->categorie->nom ?? 'Accessoire' }}</p>
                                </div>
                                <span class="text-sm font-bold text-[#E8A598]">×{{ $article->quantite }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Boutons CTA --}}
                <div class="space-y-3">
                    <form method="POST" action="{{ route('panier.ajouter') }}">
                        @csrf
                        <input type="hidden" name="pack_id" value="{{ $pack->id }}">
                        <input type="hidden" name="quantite" value="1">
                        <button type="submit"
                            class="w-full bg-[#4A3525] text-white px-8 py-4 rounded-full font-bold hover:bg-[#E8A598] transition shadow-lg flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Ajouter le pack au panier
                        </button>
                    </form>

                    <a href="{{ route('packs.index') }}"
                        class="block text-center text-sm text-[#4A3525]/60 hover:text-[#E8A598] transition py-2">
                        ← Voir tous les packs
                    </a>
                </div>
            </div>
        </div>
        </div>
    </section>

    {{-- ============================================================
     ENGAGEMENTS
============================================================= --}}
    <section class="py-12 bg-white border-t border-[#F9EBEA]">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="flex items-center gap-3 p-3">
                    <div class="w-10 h-10 rounded-xl bg-[#F9EBEA] text-[#E8A598] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-[#4A3525]">100% Fait main</h4>
                        <p class="text-[10px] text-gray-500">Confection artisanale</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 p-3">
                    <div class="w-10 h-10 rounded-xl bg-[#F9EBEA] text-[#E8A598] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-[#4A3525]">Prix Avantageux</h4>
                        <p class="text-[10px] text-gray-500">Économie sur le lot</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 p-3">
                    <div
                        class="w-10 h-10 rounded-xl bg-[#F9EBEA] text-[#E8A598] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-[#4A3525]">Idéal Cadeau</h4>
                        <p class="text-[10px] text-gray-500">Présentation soignée</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 p-3">
                    <div
                        class="w-10 h-10 rounded-xl bg-[#F9EBEA] text-[#E8A598] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-[#4A3525]">Livraison Rapide</h4>
                        <p class="text-[10px] text-gray-500">Expédition Bénin</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
