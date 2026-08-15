@extends('layouts.principal')

@section('content')

<!-- En-tête simple -->
<div class="bg-nissa-cream py-12">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-nissa-choco" style="font-family: 'Playfair Display', serif;">
            @if($categorieActive)
                {{ $categorieActive->nom }}
            @else
                La Boutique
            @endif
        </h1>
        <p class="text-gray-600 mt-3">
            {{ $produits->total() }} {{ Str::plural('produit', $produits->total()) }}
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-10">
    
    <!-- Barre de filtres simple -->
    <form method="GET" action="{{ route('boutique') }}" class="mb-10 space-y-6">
        
        <!-- Catégories -->
        <div>
            <h3 class="text-sm font-semibold text-nissa-choco mb-3 uppercase tracking-wide">Catégories</h3>
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('boutique') }}" 
                   class="px-5 py-2 rounded-full text-sm font-medium transition
                          {{ !request('categorie') ? 'bg-nissa-choco text-white' : 'bg-white text-gray-700 border border-gray-200 hover:border-nissa-rose hover:text-nissa-rose' }}">
                    Tous les produits
                </a>
                @foreach($categories as $cat)
                    <a href="{{ route('boutique', ['categorie' => $cat->slug]) }}" 
                       class="px-5 py-2 rounded-full text-sm font-medium transition
                              {{ request('categorie') == $cat->slug ? 'bg-nissa-choco text-white' : 'bg-white text-gray-700 border border-gray-200 hover:border-nissa-rose hover:text-nissa-rose' }}">
                        {{ $cat->nom }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Matières + Tri sur UNE SEULE ligne (SANS PRIX) -->
        <div class="flex flex-wrap items-center gap-4 bg-white p-4 rounded-2xl border border-gray-100">
            
            <!-- Matières -->
            <div class="flex flex-wrap gap-2 flex-1 min-w-0">
                <span class="text-sm font-semibold text-nissa-choco mr-2 self-center">Matière :</span>
                @foreach($matieres as $mat)
                    <label class="cursor-pointer">
                        <input type="checkbox" name="matiere" value="{{ $mat->slug }}" 
                               class="hidden peer"
                               {{ request('matiere') == $mat->slug ? 'checked' : '' }}
                               onchange="this.form.submit()">
                        <span class="inline-block px-4 py-1.5 rounded-full text-sm transition
                                     {{ request('matiere') == $mat->slug ? 'bg-nissa-rose text-white' : 'bg-gray-50 text-gray-700 hover:bg-gray-100' }}">
                            {{ $mat->nom }}
                        </span>
                    </label>
                @endforeach
            </div>

            <div class="w-px h-8 bg-gray-200"></div>

            <!-- Tri -->
            <select name="tri" onchange="this.form.submit()"
                    class="px-4 py-2 bg-gray-50 border border-gray-200 rounded-full text-sm focus:outline-none focus:border-nissa-rose">
                <option value="recent" {{ request('tri') == 'recent' ? 'selected' : '' }}>Plus récents</option>
                <option value="prix_asc" {{ request('tri') == 'prix_asc' ? 'selected' : '' }}>Prix croissant</option>
                <option value="prix_desc" {{ request('tri') == 'prix_desc' ? 'selected' : '' }}>Prix décroissant</option>
                <option value="nom" {{ request('tri') == 'nom' ? 'selected' : '' }}>Nom A-Z</option>
            </select>

            <button type="submit" class="px-5 py-2 bg-nissa-choco text-white rounded-full text-sm font-medium hover:opacity-90 transition">
                Filtrer
            </button>

            @if(request()->anyFilled(['categorie', 'matiere', 'tri']) && request('tri') != 'recent')
                <a href="{{ route('boutique') }}" class="text-sm text-gray-500 hover:text-nissa-rose">
                    ✕ Réinitialiser
                </a>
            @endif
        </div>
    </form>

    <!-- Grille de produits simple -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($produits as $produit)
            <a href="{{ route('produit.afficher', $produit->slug) }}" class="group block">
                <!-- Image -->
                <div class="aspect-square bg-nissa-cream rounded-2xl overflow-hidden mb-4">
                    @if($produit->images->where('est_principale', true)->first())
                        <img src="{{ asset('storage/' . $produit->images->where('est_principale', true)->first()->chemin) }}" 
                             alt="{{ $produit->nom }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-16 h-16 text-nissa-rose/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                
                <!-- Infos -->
                <div>
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">
                        {{ $produit->categorie->nom ?? 'Nissa' }}
                    </p>
                    <h3 class="font-semibold text-nissa-choco mb-2 group-hover:text-nissa-rose transition line-clamp-1">
                        {{ $produit->nom }}
                    </h3>
                    <div class="flex items-baseline gap-2">
                        <span class="text-lg font-bold text-nissa-choco">
                            {{ number_format($produit->prix_base, 0, ',', ' ') }}
                        </span>
                        <span class="text-xs text-gray-500">FCFA</span>
                        @if($produit->prix_promo)
                            <span class="text-sm text-gray-400 line-through">
                                {{ number_format($produit->prix_promo, 0, ',', ' ') }}
                            </span>
                        @endif
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-full text-center py-20 bg-nissa-cream rounded-2xl">
                <svg class="w-16 h-16 text-nissa-rose/30 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <h3 class="text-xl font-semibold text-nissa-choco mb-2">Aucun produit trouvé</h3>
                <p class="text-gray-600 mb-6">Essayez d'autres filtres</p>
                <a href="{{ route('boutique') }}" class="btn-nissa inline-block">
                    Voir tous les produits
                </a>
            </div>
        @endforelse
    </div>

    <!-- Pagination simple -->
    @if($produits->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $produits->links() }}
        </div>
    @endif
</div>

@endsection