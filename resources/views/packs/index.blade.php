@extends('layouts.principal')

@section('content')

    {{-- ============================================================
     SECTIONS PACKS (SANS EN-TÊTE RÉPÉTITIF)
============================================================= --}}
    <section class="py-12 md:py-16 bg-[#FDFBF7]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Lien retour boutique --}}
            <a href="{{ route('boutique') }}"
                class="inline-flex items-center gap-1 text-xs text-[#4A3525]/60 hover:text-[#E8A598] transition mb-6">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Retour à la boutique
            </a>

            {{-- Titre Épuré & Discret --}}
            <div
                class="flex flex-col md:flex-row md:items-end justify-between mb-10 pb-6 border-b border-[#E8A598]/20 gap-4">
                <div>
                    <span class="inline-block text-xs font-semibold uppercase tracking-[0.25em] text-[#E8A598] mb-1">
                        Offres Spéciales
                    </span>
                    <h1 class="text-3xl md:text-4xl font-bold text-[#4A3525]"
                        style="font-family: 'Playfair Display', serif;">
                        Nos Coffrets & <span class="italic text-[#E8A598]">Packs</span>
                    </h1>
                </div>
                <p class="text-sm text-[#4A3525]/70 max-w-md">
                    Des compositions avantageuses pensées pour la rentrée ou pour offrir un cadeau complet.
                </p>
            </div>

            @if ($packs->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($packs as $pack)
                        <a href="{{ route('packs.afficher', $pack->slug) }}" class="group block">
                            <article
                                class="bg-white rounded-3xl border border-[#F9EBEA] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between h-full">

                                {{-- Visuel du Pack --}}
                                <div class="relative aspect-[4/3] bg-[#FDFBF7] overflow-hidden">
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
            ? $premierArticle->produit->images
                    ->where('est_principale', true)
                    ->first() ?? $premierArticle->produit->images->first()
            : null;
    $cheminImage = $imagePrincipale
        ? (str_starts_with($imagePrincipale->chemin, 'http')
            ? $imagePrincipale->chemin
            : asset('storage/' . $imagePrincipale->chemin))
                                                : null;
                                        }
                                    @endphp

                                    @if ($cheminImage)
                                        <img src="{{ $cheminImage }}" alt="{{ $pack->nom }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div
                                            class="w-full h-full flex flex-col items-center justify-center text-[#E8A598]/40">
                                            <svg class="w-16 h-16 mb-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                            </svg>
                                            <span class="text-xs">Coffret Nissa</span>
                                        </div>
                                    @endif

                                    {{-- Badges --}}
                                    <div class="absolute top-4 left-4 flex flex-col gap-2">
                                        <span
                                            class="bg-[#4A3525]/90 backdrop-blur text-white px-3 py-1 rounded-full text-[11px] font-medium tracking-wide shadow-sm">
                                            {{ $pack->articles->count() }} pièces
                                        </span>
                                    </div>

                                    @if ($pack->prix_promo)
                                        @php
                                            $economie = $pack->prix_base - $pack->prix_promo;
                                        @endphp
                                        <span
                                            class="absolute top-4 right-4 bg-[#E8A598] text-white px-3 py-1 rounded-full text-[11px] font-bold shadow-sm">
                                            -{{ number_format($economie, 0, ',', ' ') }} FCFA
                                        </span>
                                    @endif
                                </div>

                                {{-- Détails du Pack --}}
                                <div class="p-6 flex flex-col justify-between flex-1">
                                    <div>
                                        <span class="text-[10px] font-bold uppercase tracking-widest text-[#E8A598]">
                                            {{ $pack->categorie ?? 'Édition Spéciale' }}
                                        </span>

                                        <h2 class="text-xl font-bold text-[#4A3525] mt-1 mb-2 group-hover:text-[#E8A598] transition"
                                            style="font-family: 'Playfair Display', serif;">
                                            {{ $pack->nom }}
                                        </h2>

                                        <p class="text-xs text-gray-600 leading-relaxed mb-6 line-clamp-2">
                                            {{ $pack->description ?? 'Ensemble d\'accessoires assortis créés sur-mesure.' }}
                                        </p>
                                    </div>

                                    {{-- Pied de carte & Tarif --}}
                                    <div class="pt-4 border-t border-[#F9EBEA] flex items-center justify-between">
                                        <div class="flex items-baseline gap-2">
                                            @if ($pack->prix_promo)
                                                <span class="text-2xl font-extrabold text-[#4A3525]">
                                                    {{ number_format($pack->prix_promo, 0, ',', ' ') }}
                                                </span>
                                                <span class="text-xs text-gray-400 line-through">
                                                    {{ number_format($pack->prix_base, 0, ',', ' ') }}
                                                </span>
                                            @else
                                                <span class="text-2xl font-extrabold text-[#4A3525]">
                                                    {{ number_format($pack->prix_base, 0, ',', ' ') }}
                                                </span>
                                            @endif
                                            <span class="text-xs font-bold text-[#4A3525]">FCFA</span>
                                        </div>

                                        <span
                                            class="w-9 h-9 rounded-full bg-[#F9EBEA] group-hover:bg-[#4A3525] group-hover:text-white text-[#4A3525] flex items-center justify-center transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>

                            </article>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 bg-white rounded-3xl border border-[#F9EBEA] space-y-4">
                    <div
                        class="w-16 h-16 mx-auto rounded-full bg-[#F9EBEA] flex items-center justify-center text-[#E8A598]">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#4A3525]" style="font-family: 'Playfair Display', serif;">
                        Aucun pack disponible pour le moment
                    </h3>
                    <p class="text-xs text-gray-500 max-w-sm mx-auto">
                        De nouvelles offres groupées arrivent très vite sur la boutique.
                    </p>
                    <a href="{{ route('boutique') }}"
                        class="inline-block bg-[#4A3525] text-white px-6 py-2.5 rounded-full text-xs font-bold hover:bg-[#E8A598] transition">
                        Découvrir les articles individuels
                    </a>
                </div>
            @endif

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
                    <div class="w-10 h-10 rounded-xl bg-[#F9EBEA] text-[#E8A598] flex items-center justify-center shrink-0">
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
