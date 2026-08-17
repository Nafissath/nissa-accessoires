@extends('layouts.principal')

@section('content')



    <!-- ======================== HERO BOUTIQUE ======================== -->
    <section class="relative overflow-hidden"
        style="background: linear-gradient(135deg, #FBF3F3 0%, #F5E1E1 50%, #FBF3F3 100%);">
        <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full
                bg-[#E8BFC1]/20 blur-3xl"></div>

        <div class="absolute -bottom-24 -left-20 w-72 h-72 rounded-full
                bg-[#DCCBC1]/20 blur-3xl"></div>


        <div class="relative max-w-7xl mx-auto px-5 sm:px-8">

            <div
                class="py-20 md:py-24 lg:py-28
                    grid grid-cols-1 lg:grid-cols-[1fr_auto]
                    gap-12 items-center">


                {{-- =====================================================
                 TEXTE
            ====================================================== --}}

                <div class="max-w-3xl">

                    {{-- Petite signature --}}
                    <div class="flex items-center gap-4 mb-7">

                        <span class="w-10 h-px bg-nissa-rose"></span>

                        <span
                            class="text-[10px] sm:text-xs
                               uppercase tracking-[0.35em]
                               text-nissa-rose font-medium">
                            Nissa · Créations artisanales
                        </span>

                    </div>


                    {{-- TITRE --}}
                    <h1 class="text-5xl sm:text-6xl md:text-7xl
                           lg:text-[76px]
                           leading-[0.95]
                           font-medium
                           text-nissa-choco"
                        style="font-family: 'Playfair Display', serif;">

                        @if ($categorieActive)
                            {{ $categorieActive->nom }}
                        @else
                            La
                            <span class="italic font-normal">
                                Boutique
                            </span>
                        @endif

                    </h1>


                    {{-- Ligne décorative --}}
                    <div class="mt-7 flex items-center gap-3">

                        <span class="w-16 h-px bg-[#D8C5BB]"></span>

                        <span class="text-nissa-rose text-xs">
                            ✦
                        </span>

                        <span class="w-8 h-px bg-[#D8C5BB]"></span>

                    </div>


                    {{-- DESCRIPTION --}}
                    <p
                        class="mt-7
                           text-base md:text-lg
                           text-[#756963]
                           leading-relaxed
                           max-w-xl">

                        @if ($categorieActive)
                            {{ $categorieActive->description ?? 'Découvrez nos créations artisanales faites main avec passion.' }}
                        @else
                            Des accessoires délicats, des matières choisies
                            avec soin et des créations faites main pour
                            accompagner chaque style.
                        @endif

                    </p>

                </div>


                {{-- =====================================================
                 BLOC NOMBRE DE PRODUITS
            ====================================================== --}}

                <div class="lg:pr-8">

                    <div
                        class="relative w-40 h-40 md:w-48 md:h-48
                           rounded-full
                           border border-[#DCCBC1]
                           flex items-center justify-center
                           bg-[#FFFDFC]">

                        {{-- Cercle intérieur --}}
                        <div
                            class="absolute inset-3
                               rounded-full
                               border border-[#E8DCD5]">
                        </div>


                        <div class="relative text-center">

                            <p class="text-4xl md:text-5xl
                                   font-medium
                                   text-nissa-choco"
                                style="font-family: 'Playfair Display', serif;">
                                {{ $produits->total() }}
                            </p>

                            <p
                                class="mt-1
                                   text-[9px]
                                   uppercase
                                   tracking-[0.25em]
                                   text-gray-500">
                                {{ Str::plural('création', $produits->total()) }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    
    <!-- ======================== FILTRES ======================== -->
    <section class="bg-white border-b border-[#eee8e3]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <form method="GET" action="{{ route('boutique') }}">

                @if (request('categorie'))
                    <input type="hidden" name="categorie" value="{{ request('categorie') }}">
                @endif

                <!-- Ligne 1 : onglets catégories + tri à droite -->
                <div class="flex flex-wrap items-end justify-between gap-4 border-b border-[#eee8e3]">

                    <!-- Onglets catégories (style souligné) -->
                    <nav class="flex items-center gap-7 overflow-x-auto scrollbar-hide">
                        <a href="{{ route('boutique') }}"
                            class="py-4 text-base font-medium whitespace-nowrap border-b-2 transition
                            {{ !request('categorie') ? 'border-nissa-rose text-nissa-choco' : 'border-transparent text-gray-500 hover:text-nissa-choco' }}">
                            Toutes
                        </a>

                        @foreach ($categories as $cat)
                            <a href="{{ route('boutique', ['categorie' => $cat->slug]) }}"
                                class="py-4 text-base font-medium whitespace-nowrap border-b-2 transition
                                {{ request('categorie') == $cat->slug ? 'border-nissa-rose text-nissa-choco' : 'border-transparent text-gray-500 hover:text-nissa-choco' }}">
                                {{ $cat->nom }}
                            </a>
                        @endforeach
                    </nav>

                    <!-- Tri à droite -->
                    <div class="flex items-center gap-2 pb-3">
                        <label for="tri" class="text-sm text-gray-500">Trier :</label>
                        <select id="tri" name="tri" onchange="this.form.submit()"
                            class="px-4 py-2 bg-[#FBF8F3] border border-[#e5ddd5] rounded-full text-sm font-medium text-nissa-choco focus:outline-none focus:border-nissa-rose cursor-pointer">
                            <option value="recent" {{ request('tri') == 'recent' ? 'selected' : '' }}>Nouveautés</option>
                            <option value="prix_asc" {{ request('tri') == 'prix_asc' ? 'selected' : '' }}>Prix croissant
                            </option>
                            <option value="prix_desc" {{ request('tri') == 'prix_desc' ? 'selected' : '' }}>Prix
                                décroissant</option>
                            <option value="nom" {{ request('tri') == 'nom' ? 'selected' : '' }}>Nom A-Z</option>
                        </select>
                    </div>
                </div>

                <!-- Ligne 2 : matières -->
                <div class="flex items-center gap-2 flex-wrap py-4">
                    <span class="text-sm text-gray-500 mr-1">Matière :</span>

                    @foreach ($matieres as $mat)
                        <label class="cursor-pointer">
                            <input type="checkbox" name="matiere" value="{{ $mat->slug }}" class="hidden"
                                {{ request('matiere') == $mat->slug ? 'checked' : '' }} onchange="this.form.submit()">
                            <span
                                class="inline-block px-4 py-2 rounded-full text-sm font-medium transition-all
                                {{ request('matiere') == $mat->slug ? 'bg-nissa-choco text-white shadow' : 'bg-[#FBF8F3] text-gray-700 border border-[#e5ddd5] hover:border-nissa-rose hover:text-nissa-rose' }}">
                                {{ $mat->nom }}
                            </span>
                        </label>
                    @endforeach

                    @if (request()->anyFilled(['categorie', 'matiere', 'tri']))
                        <a href="{{ route('boutique') }}" class="ml-2 text-sm text-gray-500 hover:text-nissa-rose">
                            ✕ Tout effacer
                        </a>
                    @endif
                </div>

            </form>
        </div>
    </section>


    <!-- ======================== GRILLE PRODUITS ======================== -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">

            @if ($produits->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-12">
                    @foreach ($produits as $produit)
                        @php
                            $imagePrincipale =
                                $produit->images->where('est_principale', true)->first() ?? $produit->images->first();
                            if ($imagePrincipale) {
                                $cheminImage = str_starts_with($imagePrincipale->chemin, 'http')
                                    ? $imagePrincipale->chemin
                                    : asset('storage/' . $imagePrincipale->chemin);
                            }
                        @endphp

                        <article class="group">
                            <!-- Image Container -->
                            <div class="relative aspect-[4/5] bg-[#FAF6F0] rounded-2xl overflow-hidden mb-4">
                                <a href="{{ route('produit.afficher', $produit->slug) }}" class="block w-full h-full">
                                    @if ($imagePrincipale)
                                        <img src="{{ $cheminImage }}" alt="{{ $produit->nom }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                            loading="lazy">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-300">
                                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                </a>

                                <!-- Badges -->
                                <div class="absolute top-4 left-4 flex flex-col gap-2">
                                    @if ($produit->prix_promo)
                                        <span
                                            class="bg-nissa-rose text-white px-3 py-1 rounded-full text-[11px] font-semibold shadow-sm">
                                            -{{ round((($produit->prix_base - $produit->prix_promo) / $produit->prix_base) * 100) }}%
                                        </span>
                                    @else
                                        <span
                                            class="bg-white/95 backdrop-blur text-nissa-choco px-3 py-1 rounded-full text-[11px] font-semibold shadow-sm">
                                            Nissa
                                        </span>
                                    @endif
                                </div>

                                <!-- Bouton Favori -->
                                <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition">
                                    <livewire:bouton-favori :produitId="$produit->id" :key="'favori-' . $produit->id" />
                                </div>

                                <!-- Bouton Ajout Rapide (Desktop) -->
                                <form method="POST" action="{{ route('panier.ajouter') }}"
                                    class="absolute left-4 right-4 bottom-4 opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 hidden sm:block">
                                    @csrf
                                    <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                    <input type="hidden" name="quantite" value="1">
                                    <button type="submit"
                                        class="w-full py-3 rounded-xl bg-nissa-choco text-white text-sm font-semibold hover:bg-nissa-rose transition shadow-lg flex items-center justify-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                            </path>
                                        </svg>
                                        Ajouter au panier
                                    </button>
                                </form>
                            </div>

                            <!-- Informations Produit -->
                            <div>
                                <p class="text-[11px] uppercase tracking-[0.2em] text-gray-400 mb-2">
                                    {{ $produit->categorie->nom ?? 'Nissa' }}
                                </p>

                                <a href="{{ route('produit.afficher', $produit->slug) }}">
                                    <h3
                                        class="text-base font-semibold text-nissa-choco mb-2 group-hover:text-nissa-rose transition line-clamp-1">
                                        {{ $produit->nom }}
                                    </h3>
                                </a>

                                <div class="flex items-baseline gap-2 mb-3">
                                    @if ($produit->prix_promo)
                                        <span class="text-lg font-bold text-nissa-rose">
                                            {{ number_format($produit->prix_promo, 0, ',', ' ') }}
                                        </span>
                                        <span class="text-sm text-gray-400 line-through">
                                            {{ number_format($produit->prix_base, 0, ',', ' ') }}
                                        </span>
                                    @else
                                        <span class="text-lg font-bold text-nissa-choco">
                                            {{ number_format($produit->prix_base, 0, ',', ' ') }}
                                        </span>
                                        <span class="text-xs text-gray-500">FCFA</span>
                                    @endif
                                </div>

                                <!-- Bouton Ajout (Mobile) -->
                                <form method="POST" action="{{ route('panier.ajouter') }}" class="sm:hidden">
                                    @csrf
                                    <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                    <input type="hidden" name="quantite" value="1">
                                    <button type="submit"
                                        class="w-full py-2.5 rounded-xl border border-nissa-choco text-nissa-choco text-sm font-medium hover:bg-nissa-choco hover:text-white transition flex items-center justify-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                            </path>
                                        </svg>
                                        Ajouter
                                    </button>
                                </form>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if ($produits->hasPages())
                    <div class="mt-16 flex justify-center">
                        <div class="inline-flex items-center gap-2 bg-nissa-cream rounded-full p-2">
                            @if ($produits->onFirstPage())
                                <span class="px-4 py-2 text-gray-400 cursor-not-allowed text-sm">← Précédent</span>
                            @else
                                <a href="{{ $produits->previousPageUrl() }}"
                                    class="px-4 py-2 bg-white rounded-full hover:bg-nissa-rose hover:text-white transition shadow-sm text-sm">
                                    ← Précédent
                                </a>
                            @endif

                            @foreach ($produits->getUrlRange(1, $produits->lastPage()) as $page => $url)
                                @if ($page == $produits->currentPage())
                                    <span
                                        class="w-10 h-10 flex items-center justify-center bg-nissa-choco text-white rounded-full font-bold text-sm">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="w-10 h-10 flex items-center justify-center bg-white rounded-full hover:bg-nissa-rose hover:text-white transition shadow-sm text-sm font-medium">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach

                            @if ($produits->hasMorePages())
                                <a href="{{ $produits->nextPageUrl() }}"
                                    class="px-4 py-2 bg-white rounded-full hover:bg-nissa-rose hover:text-white transition shadow-sm text-sm">
                                    Suivant →
                                </a>
                            @else
                                <span class="px-4 py-2 text-gray-400 cursor-not-allowed text-sm">Suivant →</span>
                            @endif
                        </div>
                    </div>
                @endif
            @else
                <!-- État vide -->
                <div class="text-center py-24">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-nissa-cream flex items-center justify-center">
                        <svg class="w-12 h-12 text-nissa-rose/40" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-nissa-choco mb-3" style="font-family: 'Playfair Display', serif;">
                        Aucune création trouvée
                    </h3>
                    <p class="text-gray-500 mb-8 max-w-md mx-auto">
                        Essayez de modifier vos filtres ou découvrez l'ensemble de notre collection.
                    </p>
                    <a href="{{ route('boutique') }}" class="btn-nissa inline-flex items-center gap-2">
                        Voir toute la collection
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            @endif

        </div>
    </section>

    <!-- ======================== BANNIÈRE ENGAGEMENT ======================== -->
    <section class="py-16 bg-[#FBF8F3]">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-nissa-rose/10 flex items-center justify-center">
                        <svg class="w-7 h-7 text-nissa-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-nissa-choco mb-1">Fait main</h4>
                    <p class="text-xs text-gray-500">Artisanat local</p>
                </div>

                <div class="text-center">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-nissa-sauge/20 flex items-center justify-center">
                        <svg class="w-7 h-7 text-nissa-sauge" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 000-7.78z">
                            </path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-nissa-choco mb-1">Qualité premium</h4>
                    <p class="text-xs text-gray-500">Matières nobles</p>
                </div>

                <div class="text-center">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-nissa-gold/20 flex items-center justify-center">
                        <svg class="w-7 h-7 text-nissa-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-nissa-choco mb-1">Livraison rapide</h4>
                    <p class="text-xs text-gray-500">Tout le Bénin</p>
                </div>

                <div class="text-center">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-nissa-choco/10 flex items-center justify-center">
                        <svg class="w-7 h-7 text-nissa-choco" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-nissa-choco mb-1">Paiement sécurisé</h4>
                    <p class="text-xs text-gray-500">Mobile Money</p>
                </div>
            </div>
        </div>
    </section>


@endsection
