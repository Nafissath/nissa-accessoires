@extends('layouts.principal')

@section('content')

<section class="py-12 md:py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4">

        {{-- Fil d'Ariane --}}
        <nav class="flex items-center gap-2 text-sm text-gray-500 mb-8">
            <a href="{{ route('accueil') }}" class="hover:text-nissa-rose transition">Accueil</a>
            <span>›</span>
            <a href="{{ route('boutique') }}" class="hover:text-nissa-rose transition">Boutique</a>
            <span>›</span>
            <a href="{{ route('panier.index') }}" class="hover:text-nissa-rose transition">Panier</a>
            <span>›</span>
            <span class="text-nissa-choco font-medium">Paiement</span>
        </nav>

        <div class="mb-10">
            {{-- <span class="inline-block text-xs uppercase tracking-[0.25em] text-nissa-rose font-semibold mb-2">
                Étape 2 sur 2
            </span> --}}
            <h1 class="text-3xl md:text-4xl font-bold text-nissa-choco" style="font-family: 'Playfair Display', serif;">
                Finaliser votre <span class="italic">commande</span>
            </h1>
        </div>

        <form method="POST" action="{{ route('commande.enregistrer') }}" class="space-y-8">
            @csrf

            {{-- Récapitulatif --}}
            <div class="bg-gray-50 rounded-3xl p-6 md:p-8">
                <h2 class="text-xl font-semibold text-nissa-choco mb-6" style="font-family: 'Playfair Display', serif;">
                    Votre commande
                </h2>

                <div class="space-y-4">
                    @php
                        $panier = session('panier', []);
                        $total = 0;
                    @endphp

                    @foreach ($panier as $cle => $item)
                        @if (($item['type'] ?? null) === 'pack')
                            @php
                                $pack = App\Models\Pack::with('articles.produit')->find($item['pack_id']);
                                $prixPack = $item['prix_unitaire'] ?? ($pack->prix_promo ?? $pack->prix_base);
                                $totalLigne = $prixPack * $item['quantite'];
                                $total += $totalLigne;
                            @endphp
                            <div class="flex items-start gap-4 pb-4 border-b border-gray-200">
                                <div class="w-12 h-12 bg-nissa-rose/10 rounded-xl flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6 text-nissa-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-nissa-choco">{{ $pack->nom }}</p>
                                    <p class="text-sm text-gray-500">Pack {{ $pack->articles->count() }} pièces × {{ $item['quantite'] }}</p>
                                </div>
                                <p class="font-bold text-nissa-choco">
                                    {{ number_format($totalLigne, 0, ',', ' ') }} FCFA
                                </p>
                            </div>
                        @else
                            @php
                                $produit = App\Models\Produit::find($item['produit_id']);
                                $variante = $item['variante_id'] ? App\Models\VarianteProduit::find($item['variante_id']) : null;
                                $prix = $variante && $variante->prix ? $variante->prix : $produit->prix_base;
                                $totalLigne = $prix * $item['quantite'];
                                $total += $totalLigne;
                            @endphp
                            <div class="flex items-start gap-4 pb-4 border-b border-gray-200">
                                @php
                                    $img = $produit->images->where('est_principale', true)->first() ?? $produit->images->first();
                                    $cheminImg = $img ? (str_starts_with($img->chemin, 'http') ? $img->chemin : asset('storage/' . $img->chemin)) : null;
                                @endphp
                                <div class="w-16 h-16 bg-gray-100 rounded-xl overflow-hidden shrink-0">
                                    @if ($cheminImg)
                                        <img src="{{ $cheminImg }}" alt="{{ $produit->nom }}" class="w-full h-full object-cover">
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-nissa-choco">{{ $produit->nom }}</p>
                                    @if ($variante)
                                        <p class="text-sm text-gray-500">
                                            {{ $variante->couleur->nom ?? '' }}
                                            {{ $variante->taille ? ' / ' . $variante->taille->nom : '' }}
                                        </p>
                                    @endif
                                    <p class="text-sm text-gray-500">Quantité : {{ $item['quantite'] }}</p>
                                </div>
                                <p class="font-bold text-nissa-choco">
                                    {{ number_format($totalLigne, 0, ',', ' ') }} FCFA
                                </p>
                            </div>
                        @endif
                    @endforeach

                    <div class="pt-4 flex justify-between items-center">
                        <span class="text-lg font-semibold text-nissa-choco">Total</span>
                        <span class="text-2xl font-bold text-nissa-rose">
                            {{ number_format($total, 0, ',', ' ') }} FCFA
                        </span>
                    </div>
                </div>
            </div>

            {{-- Coordonnées --}}
            <div class="bg-white border border-gray-200 rounded-3xl p-6 md:p-8">
                <h2 class="text-xl font-semibold text-nissa-choco mb-6" style="font-family: 'Playfair Display', serif;">
                    Vos coordonnées
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-nissa-choco mb-2">
                            Prénom <span class="text-nissa-rose">*</span>
                        </label>
                        <input type="text" name="prenom" required
                            value="{{ old('prenom') }}"
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-nissa-choco mb-2">
                            Nom <span class="text-nissa-rose">*</span>
                        </label>
                        <input type="text" name="nom" required
                            value="{{ old('nom') }}"
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-nissa-choco mb-2">
                            Téléphone <span class="text-nissa-rose">*</span>
                        </label>
                        <input type="tel" name="telephone" required
                            value="{{ old('telephone') }}"
                            placeholder="Ex: 01 00 00 00 00"
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-nissa-choco mb-2">
                            WhatsApp <span class="text-nissa-rose">*</span>
                        </label>
                        <input type="tel" name="whatsapp" required
                            value="{{ old('whatsapp') }}"
                            placeholder="Ex: 01 00 00 00 00"
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-nissa-choco mb-2">
                            Email <span class="text-xs text-gray-400 font-normal">(optionnel - pour recevoir la facture)</span>
                        </label>
                        <input type="email" name="email"
                            value="{{ old('email') }}"
                            placeholder="exemple@email.com"
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
                    </div>
                </div>
            </div>

            {{-- Adresse de livraison --}}
            <div class="bg-white border border-gray-200 rounded-3xl p-6 md:p-8">
                <h2 class="text-xl font-semibold text-nissa-choco mb-6" style="font-family: 'Playfair Display', serif;">
                    Adresse de livraison
                </h2>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-nissa-choco mb-2">
                            Adresse complète <span class="text-nissa-rose">*</span>
                        </label>
                        <textarea name="adresse" rows="3" required
                            placeholder="Ex: Haie Vive, Cotonou, Bénin"
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">{{ old('adresse') }}</textarea>
                        <p class="text-xs text-gray-400 mt-2">
                            Incluez la ville, le quartier et tout détail utile pour la livraison
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-nissa-choco mb-2">
                            Instructions supplémentaires <span class="text-xs text-gray-400 font-normal">(optionnel)</span>
                        </label>
                        <textarea name="instructions" rows="2"
                            placeholder="Ex: Sonner à l'interphone, laisser chez le gardien..."
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">{{ old('instructions') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Mode de paiement --}}
            {{-- ============================================================
     MODE DE PAIEMENT (Mobile Money uniquement)
============================================================= --}}
<div class="bg-white border border-gray-200 rounded-3xl p-6 md:p-8">
    <h2 class="text-xl font-semibold text-nissa-choco mb-6" style="font-family: 'Playfair Display', serif;">
        Mode de paiement
    </h2>

    <div class="bg-nissa-rose/5 border border-nissa-rose/20 rounded-2xl p-5">
        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-nissa-rose/10 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-6 h-6 text-nissa-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                </svg>
            </div>
            <div class="flex-1">
                <p class="font-semibold text-nissa-choco mb-1">Mobile Money</p>
                <p class="text-sm text-gray-600">
                    Après confirmation de votre commande, vous recevrez une demande de paiement sur votre téléphone via :
                </p>
                <div class="flex flex-wrap gap-2 mt-3">
                    <span class="px-3 py-1 bg-white border border-gray-200 rounded-full text-xs font-medium text-gray-700">MTN MoMo</span>
                    <span class="px-3 py-1 bg-white border border-gray-200 rounded-full text-xs font-medium text-gray-700">Moov Money</span>
                    <span class="px-3 py-1 bg-white border border-gray-200 rounded-full text-xs font-medium text-gray-700">Celtis Cash</span>
                </div>
                <p class="text-xs text-gray-500 mt-3">
                     Vous n'aurez qu'à valider le paiement sur votre téléphone pour confirmer la commande.
                </p>
            </div>
        </div>
    </div>
</div>

            {{-- Boutons --}}
            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <a href="{{ route('panier.index') }}"
                    class="flex-1 px-8 py-4 border-2 border-gray-200 text-gray-700 rounded-2xl font-semibold hover:bg-gray-50 transition text-center">
                    ← Retour au panier
                </a>
                <button type="submit"
                    class="flex-1 px-8 py-4 bg-nissa-choco text-white rounded-2xl font-semibold hover:bg-nissa-rose transition shadow-lg">
                    Confirmer et payer
                </button>
            </div>

            {{-- Engagements --}}
            <div class="flex flex-wrap items-center justify-center gap-6 pt-4 text-xs text-gray-500">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-nissa-sauge" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    Paiement sécurisé
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-nissa-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    Livraison rapide
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-nissa-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    100% fait main
                </div>
            </div>
        </form>
    </div>
</section>

@endsection