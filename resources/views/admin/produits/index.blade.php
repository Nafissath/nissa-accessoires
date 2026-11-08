@extends('admin.layouts.admin')

@section('title', 'Produits')
@section('page-title', 'Produits')

@section('content')

    {{-- ========================================== --}}
    {{-- ⚠️ PRODUITS EN RUPTURE / STOCK FAIBLE --}}
    {{-- ========================================== --}}
    @if ($produitsRupture->count() > 0)
        <div class="mb-6 bg-gradient-to-r from-red-50 to-orange-50 border-2 border-red-200 rounded-2xl p-6">
            <div class="flex items-center justify-between mb-4 flex-wrap gap-2">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-red-500 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-red-900">⚠️ Produits à réapprovisionner</h2>
                        <p class="text-xs text-red-700">{{ $produitsRupture->count() }} produit(s) concerné(s)</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl overflow-hidden border border-red-100">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-red-50/50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Produit</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Catégorie</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Variante critique</th>
                                <th class="px-4 py-2 text-right text-xs font-medium text-gray-600 uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($produitsRupture as $prod)
                                @php
                                    $varianteCritique = $prod->variantes->sortBy('stock')->first();
                                    $estRupture = $varianteCritique->stock === 0;
                                    $couleurBadge = $estRupture ? 'bg-red-600 text-white' : 'bg-orange-500 text-white';
                                    $nomVariante = [];
                                    if ($varianteCritique->couleur) $nomVariante[] = $varianteCritique->couleur->nom;
                                    if ($varianteCritique->taille) $nomVariante[] = $varianteCritique->taille->nom;
                                    $nomVarianteStr = implode(' / ', $nomVariante) ?: '-';
                                @endphp
                                <tr class="hover:bg-red-50">
                                    <td class="px-4 py-2 font-semibold text-nissa-choco text-sm">{{ $prod->nom }}</td>
                                    <td class="px-4 py-2 text-xs text-gray-600">{{ $prod->categorie->nom ?? '-' }}</td>
                                    <td class="px-4 py-2">
                                        <span class="inline-flex px-2 py-0.5 text-xs font-bold rounded-full {{ $couleurBadge }}">
                                            {{ $nomVarianteStr }} • {{ $varianteCritique->stock }} restant(s)
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 text-right">
                                        <a href="{{ route('admin.produits.modifier', $prod->id) }}"
                                            class="text-xs font-semibold text-nissa-rose hover:text-nissa-choco">
                                            Réapprovisionner →
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    {{-- ========================================== --}}
    {{-- 🏆 TOP 5 PRODUITS --}}
    {{-- ========================================== --}}
    @if ($topProduits->count() > 0)
        <div class="mb-6 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <h2 class="text-base font-semibold text-nissa-choco">Top 5 des produits les plus vendus</h2>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-3 p-4">
                @foreach ($topProduits as $index => $prod)
                    <a href="{{ route('admin.produits.modifier', $prod->id) }}"
                        class="group bg-gradient-to-br from-nissa-cream to-white rounded-xl p-3 hover:shadow-md transition border border-gray-100">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold
                                @if ($index === 0) bg-yellow-400 text-white
                                @elseif ($index === 1) bg-gray-300 text-white
                                @elseif ($index === 2) bg-orange-400 text-white
                                @else bg-gray-100 text-gray-600 @endif">
                                {{ $index + 1 }}
                            </span>
                            <span class="text-xs text-gray-500">#{{ $index + 1 }}</span>
                        </div>
                        <div class="aspect-square bg-gray-100 rounded-lg overflow-hidden mb-2">
                            @if ($prod->image_url)
                                <img src="{{ $prod->image_url }}" alt="{{ $prod->nom }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <p class="text-xs font-semibold text-nissa-choco line-clamp-1 mb-1">{{ $prod->nom }}</p>
                        <p class="text-xs text-gray-500">{{ $prod->total_vendu }} vendu{{ $prod->total_vendu > 1 ? 's' : '' }}</p>
                        <p class="text-xs font-bold text-nissa-rose">{{ number_format($prod->ca_total, 0, ',', ' ') }} F</p>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    {{-- ========================================== --}}
    {{-- EN-TÊTE --}}
    {{-- ========================================== --}}
    <div class="mb-6 flex items-center justify-between flex-wrap gap-4">
        <p class="text-gray-500">{{ $produits->total() }} produit(s)</p>
        <a href="{{ route('admin.produits.creer') }}"
            class="bg-nissa-choco text-white px-5 py-2.5 rounded-2xl font-semibold hover:bg-nissa-rose transition shadow-lg flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Nouveau produit
        </a>
    </div>

    {{-- Filtres --}}
    <form method="GET" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <input type="text" name="recherche" value="{{ request('recherche') }}" placeholder="Rechercher..."
                class="px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-nissa-rose">

            <select name="categorie" class="px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-nissa-rose">
                <option value="">Toutes catégories</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('categorie') == $cat->id ? 'selected' : '' }}>{{ $cat->nom }}</option>
                @endforeach
            </select>

            <select name="statut" class="px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-nissa-rose">
                <option value="">Tous statuts</option>
                <option value="actif" {{ request('statut') == 'actif' ? 'selected' : '' }}>Actif</option>
                <option value="inactif" {{ request('statut') == 'inactif' ? 'selected' : '' }}>Inactif</option>
            </select>

            <select name="badge" class="px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-nissa-rose">
                <option value="">Tous badges</option>
                <option value="nouveau" {{ request('badge') == 'nouveau' ? 'selected' : '' }}>Nouveau</option>
                <option value="promo" {{ request('badge') == 'promo' ? 'selected' : '' }}>Promo</option>
                <option value="bestseller" {{ request('badge') == 'bestseller' ? 'selected' : '' }}>Bestseller</option>
                <option value="pack" {{ request('badge') == 'pack' ? 'selected' : '' }}>Pack</option>
                <option value="exclusif" {{ request('badge') == 'exclusif' ? 'selected' : '' }}>Exclusif</option>
            </select>

            <div class="flex gap-2">
                <button type="submit" class="flex-1 bg-nissa-choco text-white px-4 py-2.5 rounded-xl text-sm font-semibold hover:bg-nissa-rose transition">Filtrer</button>
                <a href="{{ route('admin.produits.index') }}" class="px-4 py-2.5 border border-gray-200 rounded-xl text-sm text-gray-600 hover:bg-gray-50 transition">Effacer</a>
            </div>
        </div>
    </form>

    {{-- Tableau --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        @if ($produits->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Catégorie</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prix</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stock</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Badge</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($produits as $produit)
                            @php
                                $img = $produit->images->where('est_principale', true)->first() ?? $produit->images->first();
                                $cheminImg = $img ? (str_starts_with($img->chemin, 'http') ? $img->chemin : asset('storage/' . $img->chemin)) : null;
                                $badgeStyles = ['nouveau'=>'bg-blue-100 text-blue-800','promo'=>'bg-red-100 text-red-800','bestseller'=>'bg-yellow-100 text-yellow-800','pack'=>'bg-purple-100 text-purple-800','exclusif'=>'bg-amber-100 text-amber-800'];
                                $badgeLabels = ['nouveau'=>'Nouveau','promo'=>'Promo','bestseller'=>'Bestseller','pack'=>'Pack','exclusif'=>'Exclusif'];
                                $stockTotal = $produit->variantes->sum('stock');
                                $classeStock = $stockTotal > 10 ? 'bg-green-100 text-green-800' : ($stockTotal > 0 ? 'bg-orange-100 text-orange-800' : 'bg-red-100 text-red-800');
                            @endphp
                            <tr class="hover:bg-gray-50 transition align-top">
                                <td class="px-6 py-4">
                                    <div class="w-14 h-14 bg-gray-100 rounded-xl overflow-hidden shrink-0">
                                        @if ($cheminImg)
                                            <img src="{{ $cheminImg }}" alt="{{ $produit->nom }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="font-semibold text-nissa-choco">{{ $produit->nom }}</p>
                                    @if ($produit->est_en_avant)
                                        <span class="inline-flex items-center gap-1 mt-1 text-xs text-nissa-rose">En avant</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-600">{{ $produit->categorie->nom ?? '-' }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="font-bold text-nissa-rose">{{ number_format($produit->prix_base, 0, ',', ' ') }} FCFA</span>
                                    @if ($produit->prix_promo)
                                        <br><span class="text-xs text-gray-500 line-through">{{ number_format($produit->prix_promo, 0, ',', ' ') }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if ($produit->variantes->count() > 0)
                                        <span class="inline-flex px-2.5 py-1 text-xs font-bold rounded-full {{ $classeStock }}">{{ $stockTotal }}</span>
                                        <button type="button" onclick="document.getElementById('var-{{ $produit->id }}').classList.toggle('hidden')"
                                            class="block text-xs text-nissa-rose hover:underline mt-1">Voir variantes</button>
                                        <div id="var-{{ $produit->id }}" class="hidden mt-2 text-xs text-gray-600 space-y-1 border-t border-gray-100 pt-2 min-w-[160px]">
                                            @foreach ($produit->variantes as $v)
                                                @php
                                                    $stockV = $v->stock;
                                                    $cl = $stockV > 5 ? 'text-green-700' : ($stockV > 0 ? 'text-orange-700' : 'text-red-700');
                                                @endphp
                                                <div class="flex justify-between gap-2">
                                                    <span class="truncate">{{ $v->nom_complet }}</span>
                                                    <span class="font-semibold {{ $cl }}">{{ $stockV }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="text-xs text-gray-400">Sans variantes</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if ($produit->badge)
                                        <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full {{ $badgeStyles[$produit->badge] ?? 'bg-gray-100 text-gray-800' }}">
                                            {{ $badgeLabels[$produit->badge] ?? $produit->badge }}
                                        </span>
                                    @else
                                        <span class="text-xs text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if ($produit->est_actif)
                                        <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Actif</span>
                                    @else
                                        <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800">Inactif</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.produits.modifier', $produit->id) }}" class="text-nissa-rose hover:underline text-sm font-medium">Modifier</a>
                                        <form method="POST" action="{{ route('admin.produits.supprimer', $produit->id) }}"
                                            @submit.prevent="modalMessage = 'Supprimer ce produit ?'; modalAction = $event.target; showModal = true">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline text-sm font-medium">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-100">{{ $produits->links() }}</div>
        @else
            <div class="text-center py-16">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <p class="text-gray-500 mb-2">Aucun produit trouvé</p>
                <a href="{{ route('admin.produits.creer') }}" class="text-nissa-rose hover:underline font-semibold">Ajouter votre premier produit</a>
            </div>
        @endif
    </div>

@endsection