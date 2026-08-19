@extends('admin.layouts.admin')

@section('title', 'Packs')

@section('content')

<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-nissa-choco">Packs</h1>
        <p class="text-gray-500 mt-1">{{ $packs->total() }} pack(s) au total</p>
    </div>
    <a href="{{ route('admin.packs.creer') }}" class="bg-nissa-choco text-white px-5 py-2.5 rounded-2xl font-semibold hover:bg-nissa-rose transition">
        + Nouveau pack
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($packs as $pack)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            @if ($pack->image)
                <div class="aspect-video bg-gray-100">
                    <img src="{{ asset('storage/' . $pack->image) }}" alt="{{ $pack->nom }}" class="w-full h-full object-cover">
                </div>
            @else
                <div class="aspect-video bg-nissa-rose/10 flex items-center justify-center">
                    <svg class="w-12 h-12 text-nissa-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            @endif
            
            <div class="p-5">
                <h3 class="font-semibold text-nissa-choco text-lg mb-2">{{ $pack->nom }}</h3>
                <p class="text-sm text-gray-500 mb-3">{{ $pack->articles_count }} produit(s)</p>
                
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-2xl font-bold text-nissa-rose">{{ number_format($pack->prix_promo ?? $pack->prix_base, 0, ',', ' ') }} FCFA</p>
                        @if ($pack->prix_promo)
                            <p class="text-sm text-gray-400 line-through">{{ number_format($pack->prix_base, 0, ',', ' ') }} FCFA</p>
                        @endif
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $pack->est_actif ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ $pack->est_actif ? 'Actif' : 'Inactif' }}
                    </span>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('admin.packs.modifier', $pack->id) }}" class="flex-1 text-center px-4 py-2 border border-gray-200 rounded-xl text-sm hover:bg-gray-50 transition">
                        Modifier
                    </a>
                    <form method="POST" action="{{ route('admin.packs.supprimer', $pack->id) }}" onsubmit="return confirm('Supprimer ce pack ?')" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full px-4 py-2 border border-red-200 text-red-600 rounded-xl text-sm hover:bg-red-50 transition">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-12 bg-white rounded-2xl">
            <p class="text-gray-500">Aucun pack pour le moment</p>
        </div>
    @endforelse
</div>

@if ($packs->hasPages())
    <div class="mt-6">
        {{ $packs->links() }}
    </div>
@endif

@endsection