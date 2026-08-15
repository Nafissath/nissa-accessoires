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
                        <img id="image-principale" 
                             src="{{ asset('storage/' . $imagePrincipale->chemin) }}" 
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
                            <button onclick="document.getElementById('image-principale').src='{{ asset('storage/' . $img->chemin) }}'"
                                    class="aspect-square rounded-xl overflow-hidden border-2 border-transparent hover:border-nissa-rose transition bg-nissa-cream">
                                <img src="{{ asset('storage/' . $img->chemin) }}" alt="" class="w-full h-full object-cover">
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

                <!-- Formulaire de sélection -->
                <form action="{{ route('panier.ajouter') }}" method="POST" id="form-ajout-panier">
                    @csrf
                    <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                    
                    <!-- Sélecteur Couleur -->
                    @if($couleursDisponibles->count() > 0)
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-nissa-choco mb-3">
                                Couleur : <span id="couleur-selectionnee" class="text-nissa-rose">{{ $couleursDisponibles->first()->nom ?? '-' }}</span>
                            </label>
                            <div class="flex flex-wrap gap-3">
                                @foreach($couleursDisponibles as $couleur)
                                    <label class="cursor-pointer">
                                        <input type="radio" name="couleur_id" value="{{ $couleur->id }}" 
                                               class="hidden peer" 
                                               {{ $loop->first ? 'checked' : '' }}
                                               onchange="document.getElementById('couleur-selectionnee').textContent='{{ $couleur->nom }}'">
                                        <div class="w-12 h-12 rounded-full border-2 border-gray-200 peer-checked:border-nissa-choco peer-checked:ring-2 peer-checked:ring-nissa-rose transition"
                                             style="background-color: {{ $couleur->code_hexadecimal ?? '#E8B4B8' }};"
                                             title="{{ $couleur->nom }}">
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Sélecteur Taille -->
                    @if($taillesDisponibles->count() > 0)
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-nissa-choco mb-3">Taille</label>
                            <div class="flex flex-wrap gap-3">
                                @foreach($taillesDisponibles as $taille)
                                    <label class="cursor-pointer">
                                        <input type="radio" name="taille_id" value="{{ $taille->id }}" 
                                               class="hidden peer"
                                               {{ $loop->first ? 'checked' : '' }}>
                                        <span class="px-5 py-3 border-2 border-gray-200 rounded-full peer-checked:border-nissa-choco peer-checked:bg-nissa-choco peer-checked:text-white transition font-medium">
                                            {{ $taille->nom }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Quantité -->
                    <div class="mb-8">
                        <label class="block text-sm font-semibold text-nissa-choco mb-3">Quantité</label>
                        <div class="inline-flex items-center border-2 border-gray-200 rounded-full">
                            <button type="button" onclick="modifierQuantite(-1)" 
                                    class="w-12 h-12 flex items-center justify-center hover:bg-nissa-cream rounded-l-full transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                </svg>
                            </button>
                            <input type="number" name="quantite" id="quantite" value="1" min="1" 
                                   class="w-16 text-center border-0 focus:outline-none font-bold text-lg">
                            <button type="button" onclick="modifierQuantite(1)" 
                                    class="w-12 h-12 flex items-center justify-center hover:bg-nissa-cream rounded-r-full transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- ===================================== -->
                    <!-- LES 2 BOUTONS D'ACTION ! 🎯 -->
                    <!-- ===================================== -->
                    <div class="space-y-3">
                        <!-- Bouton 1 : Ajouter au panier (Paiement sur site) -->
                        <button type="submit" class="w-full btn-nissa flex items-center justify-center gap-3 text-lg py-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Ajouter au panier
                        </button>
                        
                        <!-- Bouton 2 : Commander sur WhatsApp (Direct) -->
                        <button type="button" onclick="commanderWhatsApp()" 
                                class="w-full bg-green-500 hover:bg-green-600 text-white px-6 py-4 rounded-full font-semibold transition shadow-lg flex items-center justify-center gap-3 text-lg">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            Commander sur WhatsApp
                        </button>
                    </div>
                </form>

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
                                    <img src="{{ asset('storage/' . $prod->images->first()->chemin) }}" 
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

<!-- Script pour WhatsApp et quantité -->
<script>
function modifierQuantite(delta) {
    const input = document.getElementById('quantite');
    let val = parseInt(input.value) + delta;
    if (val < 1) val = 1;
    input.value = val;
}

function commanderWhatsApp() {
    const quantite = document.getElementById('quantite').value;
    const nomProduit = @json($produit->nom);
    const prix = @json(number_format($produit->prix_base, 0, ',', ' '));
    const categorie = @json($produit->categorie->nom ?? 'Accessoire');
    
    // Récupérer les options sélectionnées
    let options = [];
    const couleur = document.querySelector('input[name="couleur_id"]:checked');
    const taille = document.querySelector('input[name="taille_id"]:checked');
    const couleurNom = document.getElementById('couleur-selectionnee')?.textContent;
    if (couleurNom && couleurNom !== '-') options.push('Couleur: ' + couleurNom);
    if (taille) {
        const tailleNom = taille.nextElementSibling.textContent.trim();
        options.push('Taille: ' + tailleNom);
    }
    
    const total = @json($produit->prix_base) * parseInt(quantite);
    
    let message = ` *Bonjour Nissa Accessoires !*\n\n`;
    message += `Je souhaite commander :\n\n`;
    message += ` *${nomProduit}*\n`;
    message += ` Catégorie : ${categorie}\n`;
    if (options.length > 0) message += ` Options : ${options.join(' | ')}\n`;
    message += `*Quantité : ${quantite}\n`;
    message += ` Prix unitaire : ${prix} FCFA\n`;
    message += ` *Total : ${total.toLocaleString('fr-FR')} FCFA*\n\n`;
    message += `Merci de me confirmer la disponibilité ! `;
    
    const numeroWhatsApp = '2290191309710'; // ⚠️ REMPLACE par ton vrai numéro
    const url = `https://wa.me/${numeroWhatsApp}?text=${encodeURIComponent(message)}`;
    window.open(url, '_blank');
}
</script>

@endsection