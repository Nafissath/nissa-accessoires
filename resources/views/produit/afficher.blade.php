@extends('layouts.principal')

@section('content')
    <div class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Fil d'ariane -->
            <nav class="flex items-center gap-2 text-sm text-gray-500 mb-8">
                <a href="{{ route('accueil') }}" class="hover:text-nissa-rose">Accueil</a>
                <span>/</span>
                <a href="{{ route('boutique') }}" class="hover:text-nissa-rose">Boutique</a>
                @if ($produit->categorie)
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
                    <div
                        class="aspect-[4/5] bg-gradient-to-br from-nissa-cream to-white rounded-3xl overflow-hidden shadow-xl">
                        @php
                            $imagePrincipale =
                                $produit->images->where('est_principale', true)->first() ?? $produit->images->first();
                        @endphp

                        @if ($imagePrincipale)
                            @php
                                $cheminImage = str_starts_with($imagePrincipale->chemin, 'http')
                                    ? $imagePrincipale->chemin
                                    : asset('storage/' . $imagePrincipale->chemin);
                            @endphp
                            <img id="image-principale" src="{{ $cheminImage }}" alt="{{ $produit->nom }}"
                                class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-32 h-32 text-nissa-rose/40" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                    </div>

                    @if ($produit->images->count() > 1)
                        <div class="grid grid-cols-4 gap-3">
                            @foreach ($produit->images as $img)
                                @php
                                    $cheminMini = str_starts_with($img->chemin, 'http')
                                        ? $img->chemin
                                        : asset('storage/' . $img->chemin);
                                @endphp
                                <button onclick="document.getElementById('image-principale').src='{{ $cheminMini }}'"
                                    class="aspect-square rounded-xl overflow-hidden border-2 border-transparent hover:border-nissa-rose transition bg-nissa-cream">
                                    <img src="{{ $cheminMini }}" alt="{{ $produit->nom }} - vue {{ $loop->iteration }}"
                                        class="w-full h-full object-cover" loading="lazy">
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Informations Produit -->
                <div>
                    @if ($produit->categorie)
                        <span
                            class="inline-block px-3 py-1 bg-nissa-rose/10 text-nissa-rose text-xs uppercase tracking-widest font-semibold rounded-full mb-3">
                            {{ $produit->categorie->nom }}
                        </span>
                    @endif

                    <h1 class="text-4xl md:text-5xl font-bold mb-4 text-nissa-choco"
                        style="font-family: 'Playfair Display', serif;">
                        {{ $produit->nom }}
                    </h1>

                    @if ($produit->nuances_couleurs)
                        <div class="flex items-center gap-2 mb-4">
                            <span class="text-sm text-gray-500">Couleurs :</span>
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1 bg-nissa-cream border border-nissa-rose/30 rounded-full text-sm font-medium text-nissa-choco">
                                {{ $produit->nuances_couleurs }}
                            </span>
                        </div>
                    @endif

                    <!-- Prix -->
                    <div class="flex items-baseline gap-3 mb-6">
                        <span class="text-4xl font-bold text-nissa-rose" id="prix-affichage">
                            {{ number_format($produit->prix_promo ?? $produit->prix_base, 0, ',', ' ') }}
                        </span>
                        <span class="text-lg text-gray-500">FCFA</span>

                        @if ($produit->prix_promo)
                            <span class="text-xl text-gray-400 line-through">
                                {{ number_format($produit->prix_base, 0, ',', ' ') }} FCFA
                            </span>
                        @endif
                    </div>

                    <!-- Description courte -->
                    <p class="text-gray-600 text-lg leading-relaxed mb-8">
                        {{ $produit->description_courte }}
                    </p>

                    <!-- Composant Livewire ajout panier -->
                    @livewire('ajout-panier', ['produit' => $produit])

                    <!-- Informations complémentaires -->
                    <div class="mt-8 pt-8 border-t border-gray-200 space-y-4">
                        <div class="flex items-center gap-3 text-gray-600">
                            <svg class="w-5 h-5 text-nissa-sauge" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Livraison rapide partout au Bénin</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-600">
                            <svg class="w-5 h-5 text-nissa-sauge" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Paiement Mobile Money sécurisé (MTN, Moov) ou carte bancaire</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-600">
                            <svg class="w-5 h-5 text-nissa-sauge" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>100% fait main avec amour</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description longue -->
            @if ($produit->description_longue)
                <div class="mt-16 max-w-4xl">
                    <h2 class="text-3xl font-bold mb-6 text-nissa-choco" style="font-family: 'Playfair Display', serif;">
                        Description
                    </h2>
                    <div class="prose prose-lg text-gray-700 leading-relaxed">
                        {!! nl2br(e($produit->description_longue)) !!}
                    </div>
                </div>
            @endif

            {{-- ============================================================
                 AVIS CLIENTS
            ============================================================= --}}
            <div class="mt-16 max-w-4xl" x-data="{ note: 0 }">
                <h2 class="text-3xl font-bold mb-6 text-nissa-choco" style="font-family: 'Playfair Display', serif;">
                    Avis clientes
                    @if ($avis->count() > 0)
                        <span class="text-lg font-normal text-gray-500">({{ $avis->count() }})</span>
                    @endif
                </h2>

                @if ($avis->count() > 0)
                    {{-- Note moyenne --}}
                    <div class="flex items-center gap-4 mb-8 bg-[#FBF8F3] rounded-2xl p-5">
                        <div class="text-4xl font-bold text-nissa-choco">
                            {{ number_format($avis->avg('note'), 1) }}
                        </div>
                        <div>
                            <div class="flex gap-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= round($avis->avg('note')) ? 'text-nissa-gold' : 'text-gray-300' }}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            <p class="text-sm text-gray-500 mt-1">
                                Basé sur {{ $avis->count() }} avis vérifié{{ $avis->count() > 1 ? 's' : '' }}
                            </p>
                        </div>
                    </div>

                    {{-- Liste des avis --}}
                    <div class="space-y-5 mb-10">
                        @foreach ($avis as $unAvis)
                            <div class="bg-white border border-gray-100 rounded-2xl p-5">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full bg-nissa-rose/10 flex items-center justify-center text-nissa-rose font-semibold">
                                            {{ strtoupper(substr($unAvis->nom, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-semibold text-nissa-choco text-sm">{{ $unAvis->nom }}</p>
                                            <p class="text-xs text-gray-400">{{ $unAvis->created_at->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-0.5">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= $unAvis->note ? 'text-nissa-gold' : 'text-gray-300' }}"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @endfor
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm leading-relaxed">{{ $unAvis->commentaire }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 mb-10">
                        Aucun avis pour le moment. Soyez la première à partager votre expérience !
                    </p>
                @endif

                {{-- Formulaire --}}
                <div class="bg-white border border-gray-100 rounded-2xl p-6">
                    <h3 class="text-xl font-semibold text-nissa-choco mb-5"
                        style="font-family: 'Playfair Display', serif;">
                        Laisser un avis
                    </h3>

                    <form method="POST" action="{{ route('avis.store', $produit->slug) }}">
                        @csrf

                        {{-- Note avec étoiles interactives --}}
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Votre note</label>
                            <div class="flex gap-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <button type="button" @click="note = {{ $i }}" class="p-1">
                                        <svg class="w-8 h-8 transition-colors"
                                            :class="note >= {{ $i }} ? 'text-nissa-gold' : 'text-gray-300'"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </button>
                                @endfor
                            </div>
                            <input type="hidden" name="note" x-model="note" required>
                            <p class="text-xs text-gray-400 mt-1"
                                x-text="note === 0 ? 'Cliquez sur les étoiles pour noter' : note + ' / 5'"></p>
                        </div>

                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Votre nom</label>
                                <input type="text" name="nom" required maxlength="100"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-nissa-rose"
                                    placeholder="Ex : Aïcha K.">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Votre email</label>
                                <input type="email" name="email" required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-nissa-rose"
                                    placeholder="votre@email.com">
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Votre commentaire</label>
                            <textarea name="commentaire" required rows="4" minlength="10" maxlength="1000"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-nissa-rose"
                                placeholder="Partagez votre expérience avec ce produit..."></textarea>
                        </div>

                        <button type="submit"
                            class="bg-nissa-choco text-white px-6 py-3 rounded-xl text-sm font-semibold hover:bg-nissa-rose transition">
                            Envoyer mon avis
                        </button>
                        <p class="text-xs text-gray-400 mt-3">Votre avis sera publié après validation par notre équipe.</p>
                    </form>
                </div>
            </div>

            {{-- ============================================================
                 PRODUITS SIMILAIRES
            ============================================================= --}}
            @if ($produitsSimilaires->count() > 0)
                <div class="mt-20">
                    <h2 class="text-3xl md:text-4xl font-bold mb-8 text-center"
                        style="font-family: 'Playfair Display', serif;">
                        Vous aimerez <span class="italic text-nissa-rose">aussi</span>
                    </h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        @foreach ($produitsSimilaires as $prod)
                            <a href="{{ route('produit.afficher', $prod->slug) }}" class="group">
                                <div class="aspect-square bg-nissa-cream rounded-2xl overflow-hidden mb-3">
                                    @if ($prod->images->first())
                                        @php
                                            $cheminSim = str_starts_with($prod->images->first()->chemin, 'http')
                                                ? $prod->images->first()->chemin
                                                : asset('storage/' . $prod->images->first()->chemin);
                                        @endphp
                                        <img src="{{ $cheminSim }}" alt="{{ $prod->nom }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition"
                                            loading="lazy">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <svg class="w-16 h-16 text-nissa-rose/40" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <h3
                                    class="font-semibold text-nissa-choco group-hover:text-nissa-rose transition line-clamp-1">
                                    {{ $prod->nom }}
                                </h3>
                                <p class="text-nissa-rose font-bold">{{ number_format($prod->prix_base, 0, ',', ' ') }}
                                    FCFA</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
