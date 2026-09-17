@extends('layouts.principal')

@section('content')
   


    <!-- ======================== HERO SECTION ======================== -->
    <section class="relative min-h-[85vh] overflow-hidden flex items-center">
        <!-- TON image en fond - mieux positionnée -->
        <img src="{{ asset('images/accueil3.jpeg') }}" alt="Chouchou satin Nissa sur cheveux naturels"
            class="absolute inset-0 w-full h-full object-cover">

        <!-- Dégradé pour la lisibilité du texte (gauche) -->
        <div class="absolute inset-0 bg-gradient-to-r from-nissa-choco/90 via-nissa-choco/50 to-transparent"></div>

        <!-- Contenu -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 py-20 w-full">
            <div class="max-w-2xl text-white">
                <span
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white/15 backdrop-blur-sm border border-white/20 text-white text-sm font-medium rounded-full mb-8">
                    <span class="w-2 h-2 bg-nissa-rose rounded-full animate-pulse"></span>
                    Créations artisanales faites main au Bénin
                </span>

                <h1 class="text-5xl md:text-7xl font-bold leading-tight mb-6"
                    style="font-family: 'Playfair Display', serif;">
                    L'élégance qui
                    <span class="italic text-gradient block md:inline"
                        style="background: linear-gradient(135deg, #E8B4B8 0%, #C9A961 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        prend soin
                    </span>
                    de vous
                </h1>

                <p class="text-xl md:text-2xl text-white/90 mb-10 leading-relaxed font-light">
                    Chouchous en satin et soie, accessoires au crochet uniques.
                    Chaque pièce raconte une histoire.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('boutique') }}"
                        class="group inline-flex items-center gap-3 bg-white text-nissa-choco px-8 py-4 rounded-full font-semibold hover:bg-nissa-rose hover:text-white transition-all shadow-2xl hover:shadow-nissa-rose/50">
                        Découvrir la collection
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>

                    <a href="https://wa.me/2290191309710" target="_blank"
                        class="inline-flex items-center gap-3 bg-nissa-rose text-white px-8 py-4 rounded-full font-semibold hover:bg-nissa-rose-dark transition shadow-2xl">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                        Commander
                    </a>
                </div>

                <!-- Stats -->
                <div class="mt-16 grid grid-cols-3 gap-8 max-w-md">
                    <div class="border-l-2 border-nissa-rose pl-4">
                        <p class="text-3xl font-bold" style="font-family: 'Playfair Display', serif;">100%</p>
                        <p class="text-sm text-white/70">Fait main</p>
                    </div>
                    <div class="border-l-2 border-nissa-gold pl-4">
                        <p class="text-3xl font-bold" style="font-family: 'Playfair Display', serif;">200+</p>
                        <p class="text-sm text-white/70">Clientes</p>
                    </div>
                    <div class="border-l-2 border-white pl-4">
                        <p class="text-3xl font-bold" style="font-family: 'Playfair Display', serif;">4.9★</p>
                        <p class="text-sm text-white/70">Satisfaction</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 right-0 w-1/3 h-1/3 bg-gradient-to-tl from-nissa-rose/20 to-transparent blur-3xl">
        </div>
    </section>






    <!-- ======================== VALEURS / AVANTAGES ======================== -->
    <section class="py-20 bg-white relative overflow-hidden">
        <!-- Décorations en arrière-plan -->
        <div class="absolute top-0 left-0 w-64 h-64 bg-nissa-rose/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-nissa-gold/10 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-nissa-rose font-medium uppercase tracking-wider text-sm">Pourquoi Nissa ?</span>
                <h2 class="text-4xl md:text-5xl font-bold mt-3" style="font-family: 'Playfair Display', serif;">
                    Plus que des <span class="italic text-nissa-rose">accessoires</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Cheveux protégés -->
                <div
                    class="group bg-gradient-to-br from-white to-nissa-cream p-8 rounded-3xl border border-nissa-rose/20 hover:border-nissa-rose hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-nissa-rose to-nissa-rose-dark rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg shadow-nissa-rose/30">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 text-nissa-choco" style="font-family: 'Playfair Display', serif;">
                        Cheveux protégés</h3>
                    <p class="text-gray-600 leading-relaxed">Satin et soie de qualité pour réduire la casse, les fourches et
                        préserver votre beauté naturelle.</p>
                </div>

                <!-- Fait main -->
                <div
                    class="group bg-gradient-to-br from-white to-nissa-cream p-8 rounded-3xl border border-nissa-sauge/20 hover:border-nissa-sauge hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-nissa-sauge to-emerald-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg shadow-nissa-sauge/30">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 text-nissa-choco" style="font-family: 'Playfair Display', serif;">
                        100% Fait main</h3>
                    <p class="text-gray-600 leading-relaxed">Chaque pièce est unique, créée avec passion et un savoir-faire
                        artisanal authentique.</p>
                </div>

                <!-- Livraison -->
                <div
                    class="group bg-gradient-to-br from-white to-nissa-cream p-8 rounded-3xl border border-nissa-gold/20 hover:border-nissa-gold hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-nissa-gold to-amber-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg shadow-nissa-gold/30">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 text-nissa-choco" style="font-family: 'Playfair Display', serif;">
                        Livraison rapide</h3>
                    <p class="text-gray-600 leading-relaxed">Partout au Bénin avec suivi, et expédition en 24h pour Cotonou
                        et environs.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================== COLLECTIONS DYNAMIQUES ======================== -->
    <section class="py-24 bg-nissa-cream relative">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-nissa-rose font-medium uppercase tracking-wider text-sm">Nos univers</span>
                <h2 class="text-4xl md:text-6xl font-bold mt-3 mb-4" style="font-family: 'Playfair Display', serif;">
                    Explorez nos <span class="italic text-nissa-rose">collections</span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Chaque collection raconte une histoire, créée avec des matières nobles et un soin particulier
                </p>
            </div>

            @if ($collections->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($collections as $index => $collection)
                        @php
                            // Récupérer l'image du premier produit de la collection
$premierProduit = $collection->produits->first();
$imageCollection = null;
if ($premierProduit && $premierProduit->images->count() > 0) {
    $img =
        $premierProduit->images->where('est_principale', true)->first() ??
        $premierProduit->images->first();
    $imageCollection = str_starts_with($img->chemin, 'http')
        ? $img->chemin
        : asset('storage/' . $img->chemin);
}

// Couleur alternée
$colors = ['nissa-rose', 'nissa-sauge', 'nissa-gold'];
                            $color = $colors[$index % 3];
                        @endphp

                        <a href="{{ route('cible', $collection->slug) }}"
                            class="group relative overflow-hidden rounded-3xl aspect-[3/4] shadow-xl hover:shadow-2xl transition-all duration-500 {{ $index === 1 ? 'md:mt-12' : '' }}">

                            @if ($imageCollection)
                                <img src="{{ $imageCollection }}" alt="Collection {{ $collection->nom }}"
                                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-1000">
                            @else
                                <div
                                    class="absolute inset-0 w-full h-full bg-gradient-to-br from-nissa-choco to-nissa-rose flex items-center justify-center">
                                    <span class="text-white/30 text-8xl" style="font-family: 'Playfair Display', serif;">
                                        {{ strtoupper(substr($collection->nom, 0, 1)) }}
                                    </span>
                                </div>
                            @endif

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-nissa-choco via-nissa-choco/40 to-transparent">
                            </div>
                            <div
                                class="absolute inset-0 bg-gradient-to-tr from-{{ $color }}/0 via-transparent to-{{ $color }}/30 opacity-0 group-hover:opacity-100 transition duration-500">
                            </div>

                            <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                                <span
                                    class="inline-block px-3 py-1 bg-{{ $color }} text-white text-xs uppercase tracking-wider rounded-full mb-3">
                                    Collection
                                </span>
                                <h3 class="text-4xl font-bold mb-2" style="font-family: 'Playfair Display', serif;">
                                    {{ $collection->nom }}
                                </h3>
                                @if ($collection->description)
                                    <p class="text-white/90 mb-4">{{ Str::limit($collection->description, 50) }}</p>
                                @else
                                    <p class="text-white/90 mb-4">{{ $collection->produits->count() }} produit(s)</p>
                                @endif
                                <span
                                    class="inline-flex items-center gap-2 text-sm font-medium group-hover:gap-3 transition-all">
                                    Découvrir
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="text-center mt-12">
                    <a href="{{ route('boutique') }}"
                        class="inline-flex items-center gap-2 text-nissa-choco hover:text-nissa-rose transition">
                        Voir toutes les collections
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            @else
                <div class="text-center py-16">
                    <p class="text-gray-500">Les collections arrivent bientôt...</p>
                </div>
            @endif
        </div>
    </section>

    <!-- ======================== PRODUITS PHARES ======================== -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute top-1/4 -right-32 w-96 h-96 bg-nissa-rose/5 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-16">
                <div>
                    <span class="text-nissa-rose font-medium uppercase tracking-wider text-sm">Notre sélection</span>
                    <h2 class="text-4xl md:text-6xl font-bold mt-3" style="font-family: 'Playfair Display', serif;">
                        Coups de <span class="italic text-gradient"
                            style="background: linear-gradient(135deg, #D98B92 0%, #C9A961 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">cœur</span>
                    </h2>
                </div>
                <a href="{{ route('boutique') }}" class="mt-6 md:mt-0 btn-nissa-dark inline-flex items-center gap-2">
                    Voir toute la boutique
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse ($produitsEnAvant as $produit)
                    @php
                        $imagePrincipale =
                            $produit->images->where('est_principale', true)->first() ?? $produit->images->first();
                        $cheminImage = null;
                        if ($imagePrincipale) {
                            $cheminImage = str_starts_with($imagePrincipale->chemin, 'http')
                                ? $imagePrincipale->chemin
                                : asset('storage/' . $imagePrincipale->chemin);
                        }
                        // Première variante pour l'ajout rapide au panier
                        $premiereVariante = $produit->variantes->first();
                    @endphp

                    <div class="group relative">
                        <a href="{{ route('produit.afficher', $produit->slug) }}"
                            class="block relative aspect-[4/5] bg-gradient-to-br from-nissa-cream to-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 group-hover:-translate-y-2">
                            @if ($cheminImage)
                                <img src="{{ $cheminImage }}" alt="{{ $produit->nom }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            @else
                                <div
                                    class="w-full h-full flex items-center justify-center bg-gradient-to-br from-nissa-cream to-nissa-rose/10">
                                    <svg class="w-24 h-24 text-nissa-rose/40" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif

                            <!-- Badge Nouveau -->
                            <span
                                class="absolute top-4 left-4 bg-nissa-choco text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
                                Nouveau
                            </span>
                        </a>

                        <div class="pt-6 px-2">
                            <p class="text-xs text-nissa-sauge uppercase tracking-widest font-semibold mb-2">
                                {{ $produit->categorie->nom ?? 'Accessoire' }}
                            </p>
                            <h3 class="font-bold text-xl mb-2 text-nissa-choco line-clamp-1"
                                style="font-family: 'Playfair Display', serif;">
                                {{ $produit->nom }}
                            </h3>
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-bold text-nissa-rose">
                                    {{ number_format($produit->prix_base, 0, ',', ' ') }}
                                    <span class="text-xs font-normal text-gray-500">FCFA</span>
                                </span>

                                <!-- Bouton + qui ajoute au panier -->
                                <form method="POST" action="{{ route('panier.ajouter') }}" class="inline">
                                    @csrf
                                    <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                    @if ($premiereVariante)
                                        <input type="hidden" name="variante_id" value="{{ $premiereVariante->id }}">
                                    @endif
                                    <input type="hidden" name="quantite" value="1">
                                    <button type="submit"
                                        class="w-11 h-11 rounded-full bg-nissa-cream hover:bg-nissa-rose hover:text-white text-nissa-choco flex items-center justify-center transition-all duration-300 hover:scale-110 hover:rotate-90 shadow-md"
                                        title="Ajouter au panier">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-4 text-center py-16 bg-nissa-cream rounded-3xl">
                        <p class="text-gray-600 text-lg mb-4">Nos nouveaux produits arrivent bientôt... 🌸</p>
                        <a href="{{ route('boutique') }}" class="btn-nissa inline-block">
                            Voir la boutique
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ======================== SECTION HISTOIRE ======================== --}}
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-5 sm:px-8">
            <div class="grid lg:grid-cols-[0.9fr_1.1fr] gap-14 lg:gap-24 items-start">

                {{-- Titre sticky --}}
                <div class="lg:sticky lg:top-32">
                    <span class="text-[11px] uppercase tracking-[0.3em] text-nissa-rose font-medium">
                        Notre histoire
                    </span>

                    <h2 class="mt-4 text-4xl sm:text-5xl leading-tight text-nissa-choco"
                        style="font-family:'Playfair Display', serif;">
                        Tout commence<br>
                        par une idée.
                    </h2>

                    <div class="mt-7 w-16 h-px bg-nissa-gold"></div>

                    <p class="mt-6 text-gray-500 leading-relaxed max-w-md">
                        Créer de belles choses, leur donner du sens et construire
                        progressivement un univers qui nous ressemble.
                    </p>
                </div>

                {{-- Texte --}}
                <div class="space-y-6 text-gray-600 leading-8">
                    <p>
                        <strong class="text-nissa-choco">NISSA</strong>
                        est née d'une envie simple : créer de belles choses,
                        avec soin, et leur donner une place dans le quotidien.
                    </p>

                    <p>
                        Au fil des créations, l'univers de la marque s'est construit
                        autour de matières, de couleurs et de savoir-faire qui permettent
                        à chaque pièce d'avoir sa propre personnalité.
                    </p>

                    <p>
                        Des chouchous aux créations au crochet, chaque article est pensé
                        avec attention, dans une démarche qui associe esthétique,
                        créativité et travail artisanal.
                    </p>

                    <p>
                        NISSA évolue avec les envies, les idées et les personnes qui
                        découvrent la marque. L'objectif n'est pas simplement de proposer
                        des accessoires, mais de créer un univers dans lequel chacun peut
                        trouver une pièce qui lui ressemble.
                    </p>

                    <div class="pt-5">
                        <p class="text-xl text-nissa-choco italic leading-8"
                            style="font-family:'Playfair Display', serif;">
                            « Les petits détails peuvent parfois raconter
                            les plus belles histoires. »
                        </p>
                    </div>

                    <div class="pt-4">
                        <a href="{{ route('pages.a-propos') }}"
                            class="inline-flex items-center gap-3 bg-nissa-choco text-white px-7 py-3.5 rounded-full font-medium hover:bg-nissa-rose transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                            Découvrir toute notre histoire
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ======================== CTA FINAL (simple) ======================== --}}
    <section class="py-20 bg-[#FBF8F3]">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-nissa-choco"
                style="font-family: 'Playfair Display', serif;">
                Prête à découvrir <span class="italic text-nissa-rose">Nissa</span> ?
            </h2>
            <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                Explorez nos collections de chouchous, sacs au crochet et packs cadeaux.
                Chaque pièce est unique, faite main avec passion.
            </p>
            <a href="{{ route('boutique') }}"
                class="inline-flex items-center gap-3 bg-nissa-choco text-white px-8 py-4 rounded-full font-semibold hover:bg-nissa-rose transition-all shadow-xl hover:shadow-2xl hover:-translate-y-0.5">
                Explorer la boutique
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                    </path>
                </svg>
            </a>
        </div>
    </section>
@endsection
