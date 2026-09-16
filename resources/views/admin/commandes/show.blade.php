@extends('admin.layouts.admin')

@section('title', 'Commande ' . $commande->numero_commande)

@section('content')

    {{-- En-tête --}}
    <div class="mb-6 flex items-center gap-4">
        <a href="{{ route('admin.commandes.index') }}" class="text-gray-500 hover:text-nissa-rose transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-nissa-choco" style="font-family: 'Playfair Display', serif;">
                Commande {{ $commande->numero_commande }}
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                Passée le {{ $commande->date_commande ? $commande->date_commande->format('d/m/Y à H:i') : '-' }}
            </p>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700 text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{--  ÉTAT DU STOCK DE LA COMMANDE --}}
@if ($commande->stock_decremente)
    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700 text-sm">
         <strong>Stock déjà décrémenté</strong> pour cette commande.
    </div>
@endif

@if ($commande->statut === 'annulee')
    <div class="mb-6 p-4 bg-gray-100 border border-gray-300 rounded-xl text-gray-700 text-sm">
         Commande annulée — le stock a été <strong>restauré</strong>.
    </div>
@endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Colonne gauche : Infos --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Articles --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100">
                    <h2 class="text-lg font-semibold text-nissa-choco">Articles commandés</h2>
                </div>
                <div class="divide-y divide-gray-100">
                    @foreach ($commande->articles as $article)
                        <div class="p-6 flex items-center gap-4">
                            @if ($article->pack)
                                <div
                                    class="w-16 h-16 bg-nissa-rose/10 rounded-xl flex items-center justify-center shrink-0">
                                    <svg class="w-8 h-8 text-nissa-rose" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-nissa-choco">🎁 {{ $article->pack->nom }}</p>
                                    <ul class="text-sm text-gray-500 mt-1 space-y-0.5">
                                        @foreach ($article->pack->articles as $pa)
                                            <li>• {{ $pa->quantite }}x {{ $pa->produit->nom ?? 'Article' }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                                @php
                                    $img =
                                        $article->produit->images->where('est_principale', true)->first() ??
                                        $article->produit->images->first();
                                    $cheminImg = $img
                                        ? (str_starts_with($img->chemin, 'http')
                                            ? $img->chemin
                                            : asset('storage/' . $img->chemin))
                                        : null;
                                @endphp
                                <div class="w-16 h-16 bg-gray-100 rounded-xl overflow-hidden shrink-0">
                                    @if ($cheminImg)
                                        <img src="{{ $cheminImg }}" alt="{{ $article->produit->nom }}"
                                            class="w-full h-full object-cover">
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-nissa-choco">{{ $article->produit->nom ?? 'Produit' }}</p>
                                    @if ($article->variante)
                                        <p class="text-sm text-gray-500">
                                            {{ $article->variante->couleur->nom ?? '' }}
                                            {{ $article->variante->taille ? ' / ' . $article->variante->taille->nom : '' }}
                                        </p>
                                        {{--  STOCK RESTANT --}}
                                        @php
                                            $stock = $article->variante->stock;
                                            $classe =
                                                $stock > 5
                                                    ? 'bg-green-100 text-green-800'
                                                    : ($stock > 0
                                                        ? 'bg-orange-100 text-orange-800'
                                                        : 'bg-red-100 text-red-800');
                                        @endphp
                                        <span
                                            class="inline-block mt-1 px-2 py-0.5 rounded-full text-xs font-semibold {{ $classe }}">
                                            Stock restant : {{ $stock }}
                                        </span>
                                    @endif
                                </div>
                            @endif
                            <div class="text-right">
                                <p class="text-sm text-gray-500">×{{ $article->quantite }}</p>
                                <p class="font-bold text-nissa-rose">{{ number_format($article->prix_total, 0, ',', ' ') }}
                                    FCFA</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="px-6 py-4 bg-gray-50 flex justify-between items-center">
                    <span class="font-semibold text-nissa-choco">Total</span>
                    <span class="text-2xl font-bold text-nissa-rose">{{ number_format($commande->total, 0, ',', ' ') }}
                        FCFA</span>
                </div>
            </div>

            {{-- Livraison --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h2 class="text-lg font-semibold text-nissa-choco mb-4">Adresse de livraison</h2>
                <p class="text-gray-700">{{ $commande->adresse }}</p>
                @if ($commande->instructions)
                    <p class="text-gray-600 mt-3 text-sm italic">💬 {{ $commande->instructions }}</p>
                @endif
            </div>
        </div>

        {{-- Colonne droite : Statuts & Actions --}}
        <div class="space-y-6">

            {{-- Statuts actuels --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h2 class="text-lg font-semibold text-nissa-choco mb-4">Statuts</h2>

                @php
                    $couleursStatut = [
                        'en_attente' => 'bg-yellow-100 text-yellow-800',
                        'payee' => 'bg-green-100 text-green-800',
                        'expediee' => 'bg-blue-100 text-blue-800',
                        'livree' => 'bg-purple-100 text-purple-800',
                        'annulee' => 'bg-red-100 text-red-800',
                    ];
                    $labelsStatut = [
                        'en_attente' => 'En attente',
                        'payee' => 'Payée',
                        'expediee' => 'Expédiée',
                        'livree' => 'Livrée',
                        'annulee' => 'Annulée',
                    ];
                    $couleursPaiement = [
                        'non_paye' => 'bg-red-100 text-red-800',
                        'paye' => 'bg-green-100 text-green-800',
                        'rembourse' => 'bg-gray-100 text-gray-800',
                    ];
                    $labelsPaiement = [
                        'non_paye' => 'Non payé',
                        'paye' => 'Payé',
                        'rembourse' => 'Remboursé',
                    ];
                @endphp

                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">Commande</span>
                        <span
                            class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full {{ $couleursStatut[$commande->statut] ?? 'bg-gray-100' }}">
                            {{ $labelsStatut[$commande->statut] ?? $commande->statut }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">Paiement</span>
                        <span
                            class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full {{ $couleursPaiement[$commande->statut_paiement] ?? 'bg-gray-100' }}">
                            {{ $labelsPaiement[$commande->statut_paiement] ?? $commande->statut_paiement }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- Modifier les statuts --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h2 class="text-lg font-semibold text-nissa-choco mb-4">Modifier les statuts</h2>

                <form method="POST" action="{{ route('admin.commandes.updateStatut', $commande->id) }}" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1">Statut commande</label>
                        <select name="statut"
                            class="w-full px-3 py-2 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-nissa-rose">
                            <option value="en_attente" {{ $commande->statut == 'en_attente' ? 'selected' : '' }}>En attente
                            </option>
                            <option value="payee" {{ $commande->statut == 'payee' ? 'selected' : '' }}>Payée</option>
                            <option value="expediee" {{ $commande->statut == 'expediee' ? 'selected' : '' }}>Expédiée
                            </option>
                            <option value="livree" {{ $commande->statut == 'livree' ? 'selected' : '' }}>Livrée</option>
                            <option value="annulee" {{ $commande->statut == 'annulee' ? 'selected' : '' }}>Annulée</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1">Statut paiement</label>
                        <select name="statut_paiement"
                            class="w-full px-3 py-2 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-nissa-rose">
                            <option value="non_paye" {{ $commande->statut_paiement == 'non_paye' ? 'selected' : '' }}>Non
                                payé</option>
                            <option value="paye" {{ $commande->statut_paiement == 'paye' ? 'selected' : '' }}>Payé
                            </option>
                            <option value="rembourse" {{ $commande->statut_paiement == 'rembourse' ? 'selected' : '' }}>
                                Remboursé</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="w-full bg-nissa-choco text-white py-2.5 rounded-xl font-semibold hover:bg-nissa-rose transition">
                        Mettre à jour
                    </button>
                </form>
            </div>

            {{-- Cliente --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h2 class="text-lg font-semibold text-nissa-choco mb-4">Cliente</h2>
                <div class="space-y-2 text-sm">
                    <p class="text-gray-700"><strong>{{ $commande->cliente->prenom ?? '' }}
                            {{ $commande->cliente->nom ?? '' }}</strong></p>
                    <p class="text-gray-600">📱 {{ $commande->telephone }}</p>
                    <p class="text-gray-600">💬 {{ $commande->whatsapp }}</p>
                    @if ($commande->cliente && $commande->cliente->email)
                        <p class="text-gray-600">📧 {{ $commande->cliente->email }}</p>
                    @endif
                </div>

                @php
                    $whatsappClient = preg_replace('/[^0-9]/', '', $commande->whatsapp);
                    if (!str_starts_with($whatsappClient, '229')) {
                        $whatsappClient = '229' . $whatsappClient;
                    }
                    $messageClient = 'Bonjour ' . ($commande->cliente->prenom ?? '') . " ! 🌸\n\n";
                    $messageClient .= 'Concernant votre commande *' . $commande->numero_commande . "* :\n\n";
                    $messageClient .= '💰 *Total : ' . number_format($commande->total, 0, ',', ' ') . " FCFA*\n\n";
                    $messageClient .=
                        "Nous préparons votre commande avec soin. Nous vous tiendrons informée de l'avancement.\n\n";
                    $messageClient .= 'Nissa Accessoires 🌸';
                @endphp

                <a href="https://wa.me/{{ $whatsappClient }}?text={{ urlencode($messageClient) }}" target="_blank"
                    class="mt-4 flex items-center justify-center gap-2 w-full bg-[#25D366] text-white px-4 py-2.5 rounded-xl font-semibold hover:opacity-90 transition text-sm">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347" />
                    </svg>
                    Contacter sur WhatsApp
                </a>
            </div>
        </div>
    </div>

@endsection
