@extends('layouts.principal')

@section('content')

<div class="bg-white py-8">
    <div class="max-w-7xl mx-auto px-4">
        
        <!-- Fil d'ariane -->
        <nav class="flex items-center gap-2 text-sm text-gray-500 mb-8">
            <a href="{{ route('accueil') }}" class="hover:text-nissa-rose">Accueil</a>
            <span>/</span>
            <a href="{{ route('boutique') }}" class="hover:text-nissa-rose">Boutique</a>
            @if($produit->categorie)
                <span>/</span>
                <a href="{{ route('categorie', $produit->categorie->slug) }}" class="hover:text-nissa-rose">
                    {{ $produit->categorie->nom }}
                </a>
            @endif
            <span>/</span>
            <span class="text-nissa-choco font-medium">{{ $produit->nom }}</span>
        </nav>

        <!-- Contenu Principal -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Galerie Images -->
            <div class="space-y-4">
                <!-- Image principale -->
                <div class="aspect-[4/5] bg-gradient-to-br from-nissa-cream to-white rounded-3xl overflow-hidden shadow-xl">
                    @php
                        $imagePrincipale = $produit->images->where('est_principale', true)->first() ?? $produit->images->first();
                    @endphp
                    
                    @if($imagePrincipale)
                        @php
                            $cheminImage = str_starts_with($imagePrincipale->chemin, 'http') 
                                ? $imagePrincipale->chemin 
                                : asset('storage/' . $imagePrincipale->chemin);
                        @endphp
                        <img id="image-principale" 
                             src="{{ $cheminImage }}" 
                             alt="{{ $produit->nom }}"
                             class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-32 h-32 text-nissa-rose/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                
                <!-- Miniatures -->
                @if($produit->images->count() > 1)
                    <div class="grid grid-cols-4 gap-3">
                        @foreach($produit->images as $img)
                            @php
                                $cheminMini = str_starts_with($img->chemin, 'http') 
                                    ? $img->chemin 
                                    : asset('storage/' . $img->chemin);
                            @endphp
                            <button onclick="document.getElementById('image-principale').src='{{ $cheminMini }}'"
                                    class="aspect-square rounded-xl overflow-hidden border-2 border-transparent hover:border-nissa-rose transition bg-nissa-cream">
                                <img src="{{ $cheminMini }}" alt="" class="w-full h-full object-cover">
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Informations Produit -->
            <div>
                @if($produit->categorie)
                    <span class="inline-block px-3 py-1 bg-nissa-rose/10 text-nissa-rose text-xs uppercase tracking-widest font-semibold rounded-full mb-3">
                        {{ $produit->categorie->nom }}
                    </span>
                @endif
                
                <h1 class="text-4xl md:text-5xl font-bold mb-4 text-nissa-choco" style="font-family: 'Playfair Display', serif;">
                    {{ $produit->nom }}
                </h1>
                
                <!-- Prix -->
                <div class="flex items-baseline gap-3 mb-6">
                    <span class="text-4xl font-bold text-nissa-rose">
                        {{ number_format($produit->prix_base, 0, ',', ' ') }}
                    </span>
                    <span class="text-lg text-gray-500">FCFA</span>
                    @if($produit->prix_promo)
                        <span class="text-xl text-gray-400 line-through">
                            {{ number_format($produit->prix_promo, 0, ',', ' ') }} FCFA
                        </span>
                    @endif
                </div>

                <!-- Description courte -->
                <p class="text-gray-600 text-lg leading-relaxed mb-8">
                    {{ $produit->description_courte }}
                </p>

                <!-- ===================================== -->
                <!-- COMPOSANT LIVEWIRE AJOUT PANIER -->
                <!-- ===================================== -->
                <livewire:ajout-panier :produit="$produit" />

                <!-- Informations complémentaires -->
                <div class="mt-8 pt-8 border-t border-gray-200 space-y-4">
                    <div class="flex items-center gap-3 text-gray-600">
                        <svg class="w-5 h-5 text-nissa-sauge" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Livraison rapide partout au Bénin</span>
                    </div>
                    <div class="flex items-center gap-3 text-gray-600">
                        <svg class="w-5 h-5 text-nissa-sauge" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Paiement Mobile Money sécurisé (MTN, Moov, Celtiis)</span>
                    </div>
                    <div class="flex items-center gap-3 text-gray-600">
                        <svg class="w-5 h-5 text-nissa-sauge" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>100% fait main avec amour</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Description longue -->
        @if($produit->description_longue)
            <div class="mt-16 max-w-4xl">
                <h2 class="text-3xl font-bold mb-6 text-nissa-choco" style="font-family: 'Playfair Display', serif;">
                    Description
                </h2>
                <div class="prose prose-lg text-gray-700 leading-relaxed">
                    {!! nl2br(e($produit->description_longue)) !!}
                </div>
            </div>
        @endif

        <!-- Produits Similaires -->
        @if($produitsSimilaires->count() > 0)
            <div class="mt-20">
                <h2 class="text-3xl md:text-4xl font-bold mb-8 text-center" style="font-family: 'Playfair Display', serif;">
                    Vous aimerez <span class="italic text-nissa-rose">aussi</span>
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    @foreach($produitsSimilaires as $prod)
                        <a href="{{ route('produit.afficher', $prod->slug) }}" class="group">
                            <div class="aspect-square bg-nissa-cream rounded-2xl overflow-hidden mb-3">
                                @if($prod->images->first())
                                    @php
                                        $cheminSim = str_starts_with($prod->images->first()->chemin, 'http') 
                                            ? $prod->images->first()->chemin 
                                            : asset('storage/' . $prod->images->first()->chemin);
                                    @endphp
                                    <img src="{{ $cheminSim }}" 
                                         alt="{{ $prod->nom }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-16 h-16 text-nissa-rose/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <h3 class="font-semibold text-nissa-choco group-hover:text-nissa-rose transition line-clamp-1">
                                {{ $prod->nom }}
                            </h3>
                            <p class="text-nissa-rose font-bold">{{ number_format($prod->prix_base, 0, ',', ' ') }} FCFA</p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>

@endsection