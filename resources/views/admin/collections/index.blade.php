@extends('admin.layouts.admin')

@section('title', 'Collections')
@section('page-title', 'Collections')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-nissa-choco" style="font-family: 'Playfair Display', serif;">Collections</h1>
    <p class="text-gray-500 mt-1">Gérez les collections de votre boutique</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    <div class="lg:col-span-1">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-24">
            <h2 class="text-lg font-semibold text-nissa-choco mb-4">Nouvelle collection</h2>
            <form method="POST" action="{{ route('admin.collections.enregistrer') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-nissa-choco mb-2">Nom</label>
                    <input type="text" name="nom" required placeholder="Ex: Été 2026, Bohème..."
                        class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-nissa-choco mb-2">Description</label>
                    <textarea name="description" rows="3" placeholder="Description..."
                        class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition"></textarea>
                </div>
                <button type="submit" class="w-full bg-nissa-choco text-white py-3 rounded-2xl font-semibold hover:bg-nissa-rose transition">
                    + Ajouter
                </button>
            </form>
        </div>
    </div>

    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="divide-y divide-gray-100">
                @forelse ($collections as $collection)
                    <div class="p-5 flex items-center justify-between hover:bg-gray-50 transition">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-nissa-rose/10 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-nissa-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                            </div>
                            <div>
                                <p class="font-semibold text-nissa-choco">{{ $collection->nom }}</p>
                                <p class="text-sm text-gray-500">{{ $collection->produits_count }} produit(s)</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <form method="POST" action="{{ route('admin.collections.toggleActif', $collection->id) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-3 py-1.5 text-xs font-medium rounded-full {{ $collection->actif ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $collection->actif ? 'Actif' : 'Inactif' }}
                                </button>
                            </form>
                            <form method="POST" action="{{ route('admin.collections.supprimer', $collection->id) }}"
                                  @submit.prevent="modalMessage = 'Supprimer la collection {{ $collection->nom }} ?'; modalAction = $event.target; showModal = true">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="p-12 text-center text-gray-500">Aucune collection</div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection