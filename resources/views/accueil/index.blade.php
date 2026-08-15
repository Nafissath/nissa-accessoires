@extends('layouts.principal')

@section('content')

<!-- ======================== HERO SECTION ======================== -->
<section class="relative min-h-[85vh] overflow-hidden flex items-center">
    <!-- Image de fond beaucoup plus visible -->
    <img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?w=1600&q=90" 
         alt="Accessoires élégants" 
         class="absolute inset-0 w-full h-full object-cover">
    
    <!-- Dégradé plus subtil pour garder la lisibilité -->
    <div class="absolute inset-0 bg-gradient-to-r from-nissa-choco/85 via-nissa-choco/60 to-transparent"></div>
    
    <!-- Contenu -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 py-20 w-full">
        <div class="max-w-2xl text-white">
            <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/15 backdrop-blur-sm border border-white/20 text-white text-sm font-medium rounded-full mb-8">
                <span class="w-2 h-2 bg-nissa-rose rounded-full animate-pulse"></span>
                Créations artisanales faites main au Bénin
            </span>
            
            <h1 class="text-5xl md:text-7xl font-bold leading-tight mb-6" style="font-family: 'Playfair Display', serif;">
                L'élégance qui 
                <span class="italic text-gradient block md:inline" style="background: linear-gradient(135deg, #E8B4B8 0%, #C9A961 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    prend soin
                </span> 
                de vous
            </h1>
            
            <p class="text-xl md:text-2xl text-white/90 mb-10 leading-relaxed font-light">
                Chouchous en satin et soie, accessoires au crochet uniques. 
                Chaque pièce raconte une histoire.
            </p>
            
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('boutique') }}" class="group inline-flex items-center gap-3 bg-white text-nissa-choco px-8 py-4 rounded-full font-semibold hover:bg-nissa-rose hover:text-white transition-all shadow-2xl hover:shadow-nissa-rose/50">
                    Découvrir la collection
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
                
                <a href="https://wa.me/22900000000" target="_blank" 
                   class="inline-flex items-center gap-3 bg-nissa-rose text-white px-8 py-4 rounded-full font-semibold hover:bg-nissa-rose-dark transition shadow-2xl">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    Commander
                </a>
            </div>
            
            <!-- Stats en bas -->
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
    
    <!-- Élément décoratif -->
    <div class="absolute bottom-0 right-0 w-1/3 h-1/3 bg-gradient-to-tl from-nissa-rose/20 to-transparent blur-3xl"></div>
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
            <div class="group bg-gradient-to-br from-white to-nissa-cream p-8 rounded-3xl border border-nissa-rose/20 hover:border-nissa-rose hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <div class="w-20 h-20 bg-gradient-to-br from-nissa-rose to-nissa-rose-dark rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg shadow-nissa-rose/30">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-3 text-nissa-choco" style="font-family: 'Playfair Display', serif;">Cheveux protégés</h3>
                <p class="text-gray-600 leading-relaxed">Satin et soie de qualité pour réduire la casse, les fourches et préserver votre beauté naturelle.</p>
            </div>
            
            <!-- Fait main -->
            <div class="group bg-gradient-to-br from-white to-nissa-cream p-8 rounded-3xl border border-nissa-sauge/20 hover:border-nissa-sauge hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <div class="w-20 h-20 bg-gradient-to-br from-nissa-sauge to-emerald-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg shadow-nissa-sauge/30">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-3 text-nissa-choco" style="font-family: 'Playfair Display', serif;">100% Fait main</h3>
                <p class="text-gray-600 leading-relaxed">Chaque pièce est unique, créée avec passion et un savoir-faire artisanal authentique.</p>
            </div>
            
            <!-- Livraison -->
            <div class="group bg-gradient-to-br from-white to-nissa-cream p-8 rounded-3xl border border-nissa-gold/20 hover:border-nissa-gold hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <div class="w-20 h-20 bg-gradient-to-br from-nissa-gold to-amber-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg shadow-nissa-gold/30">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-3 text-nissa-choco" style="font-family: 'Playfair Display', serif;">Livraison rapide</h3>
                <p class="text-gray-600 leading-relaxed">Partout au Bénin avec suivi, et expédition en 24h pour Cotonou et environs.</p>
            </div>
        </div>
    </div>
</section>

<!-- ======================== CATÉGORIES ======================== -->
<section class="py-24 bg-nissa-cream relative">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <span class="text-nissa-rose font-medium uppercase tracking-wider text-sm">Nos univers</span>
            <h2 class="text-4xl md:text-6xl font-bold mt-3 mb-4" style="font-family: 'Playfair Display', serif;">
                Explorez nos <span class="italic text-nissa-rose">collections</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">Chaque collection raconte une histoire, créée avec des matières nobles et un soin particulier</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Chouchous -->
            <a href="{{ route('categorie', 'chouchous') }}" class="group relative overflow-hidden rounded-3xl aspect-[3/4] shadow-xl hover:shadow-2xl transition-all duration-500">
                <img src="https://images.unsplash.com/photo-1599643477877-530eb83abc8e?w=800&q=90" 
                     alt="Chouchous en satin" 
                     class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-1000">
                <div class="absolute inset-0 bg-gradient-to-t from-nissa-choco via-nissa-choco/40 to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-tr from-nissa-rose/0 via-transparent to-nissa-rose/30 opacity-0 group-hover:opacity-100 transition duration-500"></div>
                <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                    <span class="inline-block px-3 py-1 bg-nissa-rose text-white text-xs uppercase tracking-wider rounded-full mb-3">Collection</span>
                    <h3 class="text-4xl font-bold mb-2" style="font-family: 'Playfair Display', serif;">Chouchous</h3>
                    <p class="text-white/90 mb-4">Satin, soie, velours & laine</p>
                    <span class="inline-flex items-center gap-2 text-sm font-medium group-hover:gap-3 transition-all">
                        Découvrir 
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </span>
                </div>
            </a>

            <!-- Crochet -->
            <a href="{{ route('categorie', 'sacs') }}" class="group relative overflow-hidden rounded-3xl aspect-[3/4] shadow-xl hover:shadow-2xl transition-all duration-500 md:mt-12">
                <img src="https://images.unsplash.com/photo-1590874103328-eac38a683ce7?w=800&q=90" 
                     alt="Sacs au crochet" 
                     class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-1000">
                <div class="absolute inset-0 bg-gradient-to-t from-nissa-choco via-nissa-choco/40 to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-tr from-nissa-sauge/0 via-transparent to-nissa-sauge/30 opacity-0 group-hover:opacity-100 transition duration-500"></div>
                <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                    <span class="inline-block px-3 py-1 bg-nissa-sauge text-white text-xs uppercase tracking-wider rounded-full mb-3">Collection</span>
                    <h3 class="text-4xl font-bold mb-2" style="font-family: 'Playfair Display', serif;">Crochet</h3>
                    <p class="text-white/90 mb-4">Sacs, trousses & accessoires</p>
                    <span class="inline-flex items-center gap-2 text-sm font-medium group-hover:gap-3 transition-all">
                        Découvrir 
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </span>
                </div>
            </a>

            <!-- Packs -->
            <a href="{{ route('packs.index') }}" class="group relative overflow-hidden rounded-3xl aspect-[3/4] shadow-xl hover:shadow-2xl transition-all duration-500">
                <img src="https://images.unsplash.com/photo-1512428813834-c702c7702b78?w=800&q=90" 
                     alt="Packs cadeaux" 
                     class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-1000">
                <div class="absolute inset-0 bg-gradient-to-t from-nissa-choco via-nissa-choco/40 to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-tr from-nissa-gold/0 via-transparent to-nissa-gold/30 opacity-0 group-hover:opacity-100 transition duration-500"></div>
                <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                    <span class="inline-block px-3 py-1 bg-nissa-gold text-white text-xs uppercase tracking-wider rounded-full mb-3">Collection</span>
                    <h3 class="text-4xl font-bold mb-2" style="font-family: 'Playfair Display', serif;">Packs</h3>
                    <p class="text-white/90 mb-4">Offres spéciales & cadeaux</p>
                    <span class="inline-flex items-center gap-2 text-sm font-medium group-hover:gap-3 transition-all">
                        Découvrir 
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </span>
                </div>
            </a>
        </div>
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
                    Coups de <span class="italic text-gradient" style="background: linear-gradient(135deg, #D98B92 0%, #C9A961 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">cœur</span>
                </h2>
            </div>
            <a href="{{ route('boutique') }}" class="mt-6 md:mt-0 btn-nissa-dark inline-flex items-center gap-2">
                Voir toute la boutique 
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse ($produitsEnAvant as $produit)
                <div class="group relative">
                    <a href="{{ route('produit.afficher', $produit->slug) }}" class="block relative aspect-[4/5] bg-gradient-to-br from-nissa-cream to-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 group-hover:-translate-y-2">
                        @if($produit->images->where('est_principale', true)->first())
                            <img src="{{ asset('storage/' . $produit->images->where('est_principale', true)->first()->chemin) }}" 
                                 alt="{{ $produit->nom }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-nissa-cream to-nissa-rose/10">
                                <svg class="w-24 h-24 text-nissa-rose/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                        
                        <!-- Badge -->
                        <span class="absolute top-4 left-4 bg-nissa-choco text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
                             Nouveau
                        </span>
                        
                        <!-- Bouton rapide au hover -->
                        <div class="absolute inset-x-4 bottom-4 opacity-0 group-hover:opacity-100 translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                            <span class="block w-full text-center bg-white/95 backdrop-blur py-3 rounded-2xl text-nissa-choco font-semibold shadow-xl">
                                Voir le produit
                            </span>
                        </div>
                    </a>
                    
                    <div class="pt-6 px-2">
                        <p class="text-xs text-nissa-sauge uppercase tracking-widest font-semibold mb-2">
                            {{ $produit->categorie->nom ?? 'Accessoire' }}
                        </p>
                        <h3 class="font-bold text-xl mb-2 text-nissa-choco line-clamp-1" style="font-family: 'Playfair Display', serif;">
                            {{ $produit->nom }}
                        </h3>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-nissa-rose">
                                {{ number_format($produit->prix_base, 0, ',', ' ') }} <span class="text-xs font-normal text-gray-500">FCFA</span>
                            </span>
                            <button class="w-11 h-11 rounded-full bg-nissa-cream hover:bg-nissa-rose hover:text-white text-nissa-choco flex items-center justify-center transition-all duration-300 hover:scale-110 hover:rotate-90 shadow-md">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center py-16 bg-nissa-cream rounded-3xl">
                    <p class="text-gray-600 text-lg">Nos nouveaux produits arrivent bientôt... 🌸</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ======================== SECTION HISTOIRE ======================== -->
<section class="py-24 bg-gradient-to-br from-nissa-cream via-white to-nissa-cream relative overflow-hidden">
    <div class="absolute top-20 left-10 text-[200px] font-bold text-nissa-rose/5 select-none" style="font-family: 'Playfair Display', serif;">N</div>
    
    <div class="relative max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
        <div class="relative">
            <div class="absolute -inset-4 bg-gradient-to-br from-nissa-rose to-nissa-gold rounded-3xl opacity-20 blur-2xl"></div>
            <img src="https://images.unsplash.com/photo-1513519245088-0e12902e5a38?w=800&q=90" 
                 alt="Artisanat fait main" 
                 class="relative rounded-3xl shadow-2xl">
            
            <!-- Badge flottant -->
            <div class="absolute -bottom-8 -right-8 bg-gradient-to-br from-nissa-rose to-nissa-rose-dark text-white p-6 rounded-3xl shadow-2xl hidden md:block animate-bounce-slow">
                <p class="text-4xl font-bold" style="font-family: 'Playfair Display', serif;">100%</p>
                <p class="text-sm font-medium">Fait main</p>
            </div>
            
            <!-- Petit badge -->
            <div class="absolute -top-4 -left-4 bg-nissa-choco text-white px-4 py-2 rounded-2xl shadow-xl hidden md:block">
                <p class="text-xs uppercase tracking-widest">Depuis 2024</p>
            </div>
        </div>
        
        <div>
            <span class="inline-block px-4 py-1 bg-nissa-rose/10 text-nissa-rose text-sm font-semibold uppercase tracking-wider rounded-full mb-4">Notre histoire</span>
            <h2 class="text-4xl md:text-6xl font-bold mb-8 leading-tight" style="font-family: 'Playfair Display', serif;">
                Nissa, c'est <span class="italic text-gradient" style="background: linear-gradient(135deg, #D98B92 0%, #C9A961 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">vous</span>
            </h2>
            <p class="text-lg text-gray-700 leading-relaxed mb-5">
                <strong class="text-nissa-choco">Nissa</strong> vient de l'arabe et signifie <em class="text-nissa-rose font-semibold">"femme"</em>. 
                Ce nom a été choisi pour célébrer chaque femme dans toute sa singularité.
            </p>
            <p class="text-lg text-gray-700 leading-relaxed mb-8">
                Nos créations allient <strong class="text-nissa-choco">beauté, soin et originalité</strong>. 
                Des chouchous qui prennent soin de vos cheveux, aux accessoires au crochet qui révèlent votre style unique.
            </p>
            
            <div class="flex flex-wrap gap-4 mb-8">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-nissa-rose" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-nissa-choco font-medium">Qualité premium</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-nissa-rose" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-nissa-choco font-medium">Artisanat local</span>
                </div>
            </div>
            
            <a href="{{ route('pages.a-propos') }}" class="btn-nissa-dark inline-flex items-center gap-2">
                En savoir plus
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- ======================== NEWSLETTER / CTA ======================== -->
<section class="py-24 relative overflow-hidden" style="background: linear-gradient(135deg, #3D2817 0%, #6B4423 50%, #3D2817 100%);">
    <!-- Décorations -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-nissa-rose/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-nissa-gold/20 rounded-full blur-3xl"></div>
    
    <div class="relative max-w-4xl mx-auto px-4 text-center text-white">
        <span class="inline-block px-4 py-1 bg-white/10 backdrop-blur text-nissa-rose text-sm font-semibold uppercase tracking-wider rounded-full mb-6 border border-white/20">
            Newsletter
        </span>
        <h2 class="text-4xl md:text-6xl font-bold mb-6 leading-tight" style="font-family: 'Playfair Display', serif;">
            Rejoignez l'univers <br>
            <span class="italic text-gradient" style="background: linear-gradient(135deg, #E8B4B8 0%, #C9A961 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Nissa</span>
        </h2>
        <p class="text-xl text-white/80 mb-10 max-w-2xl mx-auto leading-relaxed">
            Soyez les premières informées des nouvelles collections, des offres exclusives et des astuces beauté.
        </p>
        <form class="max-w-md mx-auto flex flex-col sm:flex-row gap-3 p-2 bg-white/10 backdrop-blur rounded-full border border-white/20">
            <input type="email" placeholder="Votre adresse email" 
                   class="flex-1 px-6 py-3 bg-transparent text-white placeholder-white/60 focus:outline-none">
            <button type="submit" class="bg-nissa-rose hover:bg-nissa-rose-dark text-white px-8 py-3 rounded-full font-semibold transition shadow-xl hover:shadow-nissa-rose/50 whitespace-nowrap">
                S'abonner 
            </button>
        </form>
        
        <p class="mt-6 text-sm text-white/50">Pas de spam. Désabonnement en 1 clic.</p>
    </div>
</section>

@endsection