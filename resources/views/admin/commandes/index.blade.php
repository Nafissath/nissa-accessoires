@extends('admin.layouts.admin')

@section('title', 'Commandes')

@section('content')

{{-- En-tête --}}
<div class="mb-8 flex items-center justify-between flex-wrap gap-4">
    <div>
        <h1 class="text-3xl font-bold text-nissa-choco" style="font-family: 'Playfair Display', serif;">
            Commandes
        </h1>
        <p class="text-gray-500 mt-1">{{ $commandes->total() }} commande(s) au total</p>
    </div>
</div>

{{-- Filtres --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 mb-6">
    <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label class="block text-xs font-medium text-gray-500 mb-1">Recherche</label>
            <input type="text" name="recherche" value="{{ request('recherche') }}"
                placeholder="N° commande, nom, téléphone..."
                class="w-full px-3 py-2 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-nissa-rose">
        </div>

        <div>
            <label class="block text-xs font-medium text-gray-500 mb-1">Statut</label>
            <select name="statut" class="w-full px-3 py-2 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-nissa-rose">
                <option value="">Tous</option>
                <option value="en_attente" {{ request('statut') == 'en_attente' ? 'selected' : '' }}>En attente</option>
                <option value="payee" {{ request('statut') == 'payee' ? 'selected' : '' }}>Payée</option>
                <option value="expediee" {{ request('statut') == 'expediee' ? 'selected' : '' }}>Expédiée</option>
                <option value="livree" {{ request('statut') == 'livree' ? 'selected' : '' }}>Livrée</option>
                <option value="annulee" {{ request('statut') == 'annulee' ? 'selected' : '' }}>Annulée</option>
            </select>
        </div>

        <div>
            <label class="block text-xs font-medium text-gray-500 mb-1">Paiement</label>
            <select name="paiement" class="w-full px-3 py-2 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-nissa-rose">
                <option value="">Tous</option>
                <option value="non_paye" {{ request('paiement') == 'non_paye' ? 'selected' : '' }}>Non payé</option>
                <option value="paye" {{ request('paiement') == 'paye' ? 'selected' : '' }}>Payé</option>
                <option value="rembourse" {{ request('paiement') == 'rembourse' ? 'selected' : '' }}>Remboursé</option>
            </select>
        </div>

        <div class="flex items-end gap-2">
            <button type="submit" class="flex-1 bg-nissa-choco text-white px-4 py-2 rounded-xl text-sm font-semibold hover:bg-nissa-rose transition">
                Filtrer
            </button>
            <a href="{{ route('admin.commandes.index') }}" class="px-4 py-2 border border-gray-200 rounded-xl text-sm text-gray-600 hover:bg-gray-50 transition">
                Effacer
            </a>
        </div>
    </form>
</div>

{{-- Tableau des commandes --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    @if ($commandes->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">N° Commande</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Articles</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paiement</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($commandes as $commande)
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
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.commandes.show', $commande->id) }}" class="font-semibold text-nissa-choco hover:text-nissa-rose">
                                    {{ $commande->numero_commande }}
                                </a>
                                @if ($commande->stock_decremente)
                                    <p class="text-[11px] text-green-600 mt-1">Stock décrémenté</p>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div>
                                    <p class="text-sm font-medium text-nissa-choco">
                                        {{ $commande->cliente->prenom ?? '' }} {{ $commande->cliente->nom ?? '' }}
                                    </p>
                                    <p class="text-xs text-gray-500">{{ $commande->telephone }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-gray-600">
                                    {{ $commande->articles->count() }} article(s)
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-nissa-rose">
                                    {{ number_format($commande->total, 0, ',', ' ') }} FCFA
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full {{ $couleursStatut[$commande->statut] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ $labelsStatut[$commande->statut] ?? ucfirst($commande->statut) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full {{ $couleursPaiement[$commande->statut_paiement] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ $labelsPaiement[$commande->statut_paiement] ?? $commande->statut_paiement }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $commande->date_commande ? $commande->date_commande->format('d/m/Y H:i') : '-' }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.commandes.show', $commande->id) }}"
                                   class="text-nissa-rose hover:underline text-sm font-medium">
                                    Voir
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $commandes->links() }}
        </div>
    @else
        <div class="text-center py-16">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
            <p class="text-gray-500 mb-2">Aucune commande trouvée</p>
            <p class="text-sm text-gray-400">Les nouvelles commandes apparaîtront ici</p>
        </div>
    @endif
</div>

@endsection