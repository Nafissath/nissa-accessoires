@extends('admin.layouts.admin')

@section('title', $cliente->prenom . ' ' . $cliente->nom)
@section('page-title', $cliente->prenom . ' ' . $cliente->nom)

@section('content')

<a href="{{ route('admin.clientes.index') }}" class="text-sm text-gray-500 hover:text-nissa-rose">← Retour aux clientes</a>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-4">

    {{-- Coordonnées (colonne fixe) --}}
    <div class="lg:col-span-1">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-20">
            <h2 class="text-lg font-semibold text-nissa-choco mb-4">Coordonnées</h2>
            <div class="space-y-2 text-sm text-gray-600">
                <p>📱 {{ $cliente->telephone }}</p>
                <p>💬 {{ $cliente->whatsapp ?? '-' }}</p>
                <p>📧 {{ $cliente->email ?? '-' }}</p>
                <p>📍 {{ $cliente->adresse ?? '-' }}</p>
            </div>
            @php
                $wa = preg_replace('/[^0-9]/', '', $cliente->whatsapp ?? $cliente->telephone);
                if (!str_starts_with($wa, '229')) $wa = '229' . $wa;
            @endphp
            <a href="https://wa.me/{{ $wa }}" target="_blank"
               class="mt-4 flex items-center justify-center gap-2 w-full bg-[#25D366] text-white px-4 py-2.5 rounded-xl font-semibold text-sm hover:opacity-90 transition">
                Contacter sur WhatsApp
            </a>
        </div>
    </div>

    {{-- Historique (colonne principale) --}}
    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-nissa-choco">Historique des commandes ({{ $cliente->commandes->count() }})</h2>
            </div>
            <div class="divide-y divide-gray-100">
                @forelse ($cliente->commandes as $commande)
                    <div class="p-5 flex items-center justify-between hover:bg-gray-50">
                        <div>
                            <p class="font-semibold text-nissa-choco">{{ $commande->numero_commande }}</p>
                            <p class="text-xs text-gray-500">{{ $commande->date_commande?->format('d/m/Y H:i') }} • {{ $commande->articles->count() }} article(s)</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-nissa-rose">{{ number_format($commande->total, 0, ',', ' ') }} FCFA</p>
                            <a href="{{ route('admin.commandes.show', $commande->id) }}" class="text-xs text-nissa-rose hover:underline">Voir →</a>
                        </div>
                    </div>
                @empty
                    <p class="p-8 text-center text-gray-500">Aucune commande</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection