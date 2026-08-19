@extends('admin.layouts.admin')

@section('title', 'Tableau de bord')

@section('content')

{{-- En-tête --}}
<div class="mb-8">
    <h1 class="text-3xl font-bold text-nissa-choco" style="font-family: 'Playfair Display', serif;">
        Tableau de bord
    </h1>
    <p class="text-gray-500 mt-1">Bienvenue {{ auth('admin')->user()->nom }} ! Voici un aperçu de votre boutique.</p>
</div>

{{-- Cartes statistiques --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    {{-- Commandes du jour --}}
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-nissa-rose/10 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-nissa-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
            </div>
        </div>
        <p class="text-xs uppercase tracking-wider text-gray-500 mb-1">Commandes aujourd'hui</p>
        <p class="text-3xl font-bold text-nissa-choco">{{ $stats['commandes_aujourdhui'] }}</p>
    </div>

    {{-- CA du jour --}}
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
        <p class="text-xs uppercase tracking-wider text-gray-500 mb-1">CA aujourd'hui</p>
        <p class="text-3xl font-bold text-nissa-choco">{{ number_format($stats['ca_aujourdhui'], 0, ',', ' ') }}</p>
        <p class="text-xs text-gray-500">FCFA</p>
    </div>

    {{-- Commandes en attente --}}
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-yellow-50 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
        <p class="text-xs uppercase tracking-wider text-gray-500 mb-1">En attente</p>
        <p class="text-3xl font-bold text-nissa-choco">{{ $stats['commandes_en_attente'] }}</p>
    </div>

    {{-- Total clientes --}}
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-purple-50 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
        </div>
        <p class="text-xs uppercase tracking-wider text-gray-500 mb-1">Clientes</p>
        <p class="text-3xl font-bold text-nissa-choco">{{ $stats['clientes_total'] }}</p>
    </div>

</div>

{{-- Dernières commandes --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
        <h2 class="text-lg font-semibold text-nissa-choco">Dernières commandes</h2>
        <a href="{{ route('admin.commandes.index') ?? '#' }}" class="text-sm text-nissa-rose hover:underline">
            Voir tout →
        </a>
    </div>

    @if ($dernieresCommandes->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">N° Commande</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($dernieresCommandes as $commande)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <span class="font-semibold text-nissa-choco">{{ $commande->numero_commande }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div>
                                    <p class="text-sm font-medium text-nissa-choco">{{ $commande->cliente->prenom }} {{ $commande->cliente->nom }}</p>
                                    <p class="text-xs text-gray-500">{{ $commande->telephone }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-nissa-rose">{{ number_format($commande->total, 0, ',', ' ') }} FCFA</span>
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $couleurs = [
                                        'en_attente' => 'bg-yellow-100 text-yellow-800',
                                        'payee' => 'bg-green-100 text-green-800',
                                        'expediee' => 'bg-blue-100 text-blue-800',
                                        'livree' => 'bg-purple-100 text-purple-800',
                                        'annulee' => 'bg-red-100 text-red-800',
                                    ];
                                    $labels = [
                                        'en_attente' => 'En attente',
                                        'payee' => 'Payée',
                                        'expediee' => 'Expédiée',
                                        'livree' => 'Livrée',
                                        'annulee' => 'Annulée',
                                    ];
                                @endphp
                                <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full {{ $couleurs[$commande->statut] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ $labels[$commande->statut] ?? ucfirst($commande->statut) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $commande->date_commande ? $commande->date_commande->format('d/m/Y H:i') : '-' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-12">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
            </svg>
            <p class="text-gray-500">Aucune commande pour le moment</p>
            <p class="text-sm text-gray-400 mt-1">Les nouvelles commandes apparaîtront ici</p>
        </div>
    @endif
</div>

@endsection