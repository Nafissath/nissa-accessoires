@extends('admin.layouts.admin')

@section('title', 'Tableau de bord')

@section('content')

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

{{-- En-tête --}}
<div class="mb-8">
    <h1 class="text-3xl font-bold text-nissa-choco" style="font-family: 'Playfair Display', serif;">
        Tableau de bord
    </h1>
    <p class="text-gray-500 mt-1">Bienvenue {{ auth('admin')->user()->nom }} ! Voici un aperçu de votre boutique.</p>
</div>

{{-- ========================================== --}}
{{-- CHIFFRE D'AFFAIRES --}}
{{-- ========================================== --}}
<div class="mb-6">
    <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Chiffre d'affaires</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-gradient-to-br from-nissa-choco to-nissa-rose text-white rounded-2xl p-6 shadow-lg">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
                <span class="text-xs uppercase tracking-wider bg-white/20 px-2 py-1 rounded-full">Total</span>
            </div>
            <p class="text-xs uppercase tracking-wider text-white/80 mb-1">CA total</p>
            <p class="text-4xl font-bold">{{ number_format($stats['ca_total'], 0, ',', ' ') }}</p>
            <p class="text-xs text-white/70 mt-1">FCFA depuis le début</p>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                @if ($stats['evolution_ca'] > 0)
                    <span class="text-xs font-semibold text-green-600 bg-green-50 px-2 py-1 rounded-full flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                        </svg>
                        +{{ $stats['evolution_ca'] }}%
                    </span>
                @elseif ($stats['evolution_ca'] < 0)
                    <span class="text-xs font-semibold text-red-600 bg-red-50 px-2 py-1 rounded-full flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                        </svg>
                        {{ $stats['evolution_ca'] }}%
                    </span>
                @else
                    <span class="text-xs font-semibold text-gray-500 bg-gray-100 px-2 py-1 rounded-full">0%</span>
                @endif
            </div>
            <p class="text-xs uppercase tracking-wider text-gray-500 mb-1">CA {{ $stats['mois_actuel'] }}</p>
            <p class="text-4xl font-bold text-nissa-choco">{{ number_format($stats['ca_mois'], 0, ',', ' ') }}</p>
            <p class="text-xs text-gray-500 mt-1">FCFA • {{ $stats['commandes_mois'] }} commande(s)</p>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 bg-nissa-rose/10 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-nissa-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-nissa-rose bg-nissa-rose/10 px-2 py-1 rounded-full">Aujourd'hui</span>
            </div>
            <p class="text-xs uppercase tracking-wider text-gray-500 mb-1">CA du jour</p>
            <p class="text-4xl font-bold text-nissa-choco">{{ number_format($stats['ca_aujourdhui'], 0, ',', ' ') }}</p>
            <p class="text-xs text-gray-500 mt-1">FCFA • {{ $stats['commandes_aujourdhui'] }} commande(s)</p>
        </div>

    </div>
</div>

{{-- ========================================== --}}
{{-- GRAPHIQUE CA 6 MOIS --}}
{{-- ========================================== --}}
<div class="mb-6">
    <div class="flex items-center justify-between mb-4 flex-wrap gap-2">
        <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Évolution du CA (6 derniers mois)</h2>
        <button onclick="telechargerGraphique()"
            class="inline-flex items-center gap-2 bg-nissa-choco text-white px-4 py-2 rounded-xl text-sm font-semibold hover:bg-nissa-rose transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>
            Télécharger PNG
        </button>
    </div>
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div style="height: 320px;">
            <canvas id="chartCA"></canvas>
        </div>
    </div>
</div>

<script>
    let chartCA;
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('chartCA');
        if (!ctx) return;

        const data = @json($caParMois);
        const labels = data.map(d => d.label);
        const valeurs = data.map(d => d.valeur);

        chartCA = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Chiffre d\'affaires (FCFA)',
                    data: valeurs,
                    borderColor: '#D98B92',
                    backgroundColor: 'rgba(217, 139, 146, 0.15)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#D98B92',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 6,
                    pointHoverRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#3B2A2A',
                        padding: 12,
                        titleFont: { size: 13 },
                        bodyFont: { size: 14, weight: 'bold' },
                        callbacks: {
                            label: function (ctx) {
                                return ctx.parsed.y.toLocaleString('fr-FR') + ' FCFA';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0,0,0,0.05)' },
                        ticks: {
                            callback: function (val) {
                                return val.toLocaleString('fr-FR') + ' F';
                            }
                        }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            }
        });
    });

    function telechargerGraphique() {
        if (!chartCA) return;
        const url = chartCA.toBase64Image();
        const a = document.createElement('a');
        a.href = url;
        a.download = 'ca-nissa-' + new Date().toISOString().slice(0, 10) + '.png';
        a.click();
    }
</script>

{{-- ========================================== --}}
{{-- COMMANDES & CLIENTES --}}
{{-- ========================================== --}}
<div class="mb-6">
    <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Commandes & clientes</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

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
            <p class="text-xs text-gray-500 mt-1">À traiter</p>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <p class="text-xs uppercase tracking-wider text-gray-500 mb-1">Payées</p>
            <p class="text-3xl font-bold text-nissa-choco">{{ $stats['commandes_payees'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Total</p>
        </div>

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
            <p class="text-xs text-gray-500 mt-1">Inscrites</p>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-nissa-rose/10 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-nissa-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>
            <p class="text-xs uppercase tracking-wider text-gray-500 mb-1">Produits</p>
            <p class="text-3xl font-bold text-nissa-choco">{{ $stats['produits_total'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Actifs en boutique</p>
            @if ($stats['ruptures_stock'] > 0)
                <p class="text-xs text-red-600 mt-1">{{ $stats['ruptures_stock'] }} en rupture</p>
            @endif
        </div>

    </div>
</div>

{{-- ========================================== --}}
{{-- DERNIÈRES COMMANDES --}}
{{-- ========================================== --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
        <h2 class="text-lg font-semibold text-nissa-choco">Dernières commandes</h2>
        <a href="{{ route('admin.commandes.index') }}" class="text-sm text-nissa-rose hover:underline">
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
                                <a href="{{ route('admin.commandes.show', $commande->id) }}" class="font-semibold text-nissa-choco hover:text-nissa-rose">
                                    {{ $commande->numero_commande }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm font-medium text-nissa-choco">{{ $commande->cliente->prenom ?? '' }} {{ $commande->cliente->nom ?? '' }}</p>
                                <p class="text-xs text-gray-500">{{ $commande->telephone }}</p>
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