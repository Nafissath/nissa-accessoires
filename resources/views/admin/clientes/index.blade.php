@extends('admin.layouts.admin')

@section('title', 'Clientes')
@section('page-title', 'Clientes')

@section('content')

    {{-- ========================================== --}}
    {{-- 👑 TOP 5 MEILLEURES CLIENTES --}}
    {{-- ========================================== --}}
    @if ($meilleuresClientes->count() > 0)
        <div class="mb-6 bg-gradient-to-br from-yellow-50 to-orange-50 border-2 border-yellow-200 rounded-2xl p-6">
            <div class="flex items-center gap-2 mb-4">
                <h2 class="text-base font-bold text-yellow-900">Meilleures clientes (VIP)</h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
                @foreach ($meilleuresClientes as $index => $cliente)
                    <a href="{{ route('admin.clientes.show', $cliente->id) }}"
                        class="group bg-white rounded-xl p-4 hover:shadow-md transition border border-yellow-100">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm
                                @if ($index === 0) bg-yellow-400 text-white
                                @elseif ($index === 1) bg-gray-300 text-white
                                @elseif ($index === 2) bg-orange-400 text-white
                                @else bg-gray-100 text-gray-600 @endif">
                                {{ $index + 1 }}
                            </span>
                            <div class="w-10 h-10 rounded-full bg-nissa-rose/10 flex items-center justify-center text-nissa-rose font-bold text-sm">
                                {{ strtoupper(substr($cliente->prenom ?? '', 0, 1)) }}{{ strtoupper(substr($cliente->nom ?? '', 0, 1)) }}
                            </div>
                        </div>
                        <p class="text-sm font-semibold text-nissa-choco truncate">{{ $cliente->prenom }} {{ $cliente->nom }}</p>
                        <p class="text-xs text-gray-500 mb-2">{{ $cliente->commandes_count }} commande{{ $cliente->commandes_count > 1 ? 's' : '' }}</p>
                        <p class="text-sm font-bold text-nissa-rose">{{ number_format($cliente->total_depense ?? 0, 0, ',', ' ') }} F</p>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    <div class="mb-6 flex items-center justify-between flex-wrap gap-4">
        <p class="text-gray-500">{{ $clientes->total() }} cliente(s)</p>
        <form method="GET" class="relative">
            <input type="text" name="recherche" value="{{ request('recherche') }}" placeholder="Rechercher une cliente..."
                class="w-64 pl-10 pr-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-nissa-rose">
            <svg class="w-4 h-4 text-gray-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </form>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cliente</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Contact</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Commandes</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total dépensé</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($clientes as $cliente)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-nissa-rose/10 text-nissa-rose flex items-center justify-center font-semibold">
                                        {{ strtoupper(substr($cliente->prenom, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="font-semibold text-nissa-choco">{{ $cliente->prenom }} {{ $cliente->nom }}</p>
                                        <p class="text-xs text-gray-500">{{ $cliente->adresse ?? '-' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <p>{{ $cliente->telephone }}</p>
                                @if ($cliente->email)<p class="text-xs text-gray-400">📧 {{ $cliente->email }}</p>@endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full bg-nissa-rose/10 text-nissa-rose">
                                    {{ $cliente->commandes_count }} commande(s)
                                </span>
                            </td>
                            <td class="px-6 py-4 font-bold text-nissa-rose">
                                {{ number_format($cliente->total_depense ?? 0, 0, ',', ' ') }} FCFA
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.clientes.show', $cliente->id) }}" class="text-nissa-rose hover:underline text-sm font-medium">Voir →</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-6 py-12 text-center text-gray-500">Aucune cliente trouvée</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($clientes->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">{{ $clientes->links() }}</div>
        @endif
    </div>

@endsection