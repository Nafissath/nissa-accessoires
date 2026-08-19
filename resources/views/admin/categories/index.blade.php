@extends('admin.layouts.admin')

@section('title', 'Catégories')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-nissa-choco" style="font-family: 'Playfair Display', serif;">
        Catégories
    </h1>
    <p class="text-gray-500 mt-1">Gérez les catégories de votre boutique</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    {{-- Formulaire création --}}
    <div class="lg:col-span-1">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-6">
            <h2 class="text-lg font-semibold text-nissa-choco mb-4">Nouvelle catégorie</h2>
            
            <form method="POST" action="{{ route('admin.categories.enregistrer') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-nissa-choco mb-2">Nom</label>
                    <input type="text" name="nom" required
                        placeholder="Ex: Chouchous, Sacs..."
                        class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:outline-none focus:border-nissa-rose transition">
                </div>
                <button type="submit" class="w-full bg-nissa-choco text-white py-3 rounded-2xl font-semibold hover:bg-nissa-rose transition">
                    Ajouter
                </button>
            </form>
        </div>
    </div>

    {{-- Liste --}}
    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="divide-y divide-gray-100">
                @forelse ($categories as $categorie)
                    <div class="p-5 flex items-center justify-between hover:bg-gray-50 transition">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-nissa-rose/10 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-nissa-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-nissa-choco">{{ $categorie->nom }}</p>
                                <p class="text-sm text-gray-500">{{ $categorie->produits_count }} produit(s)</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <form method="POST" action="{{ route('admin.categories.toggleActif', $categorie->id) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-3 py-1.5 text-xs font-medium rounded-full {{ $categorie->actif ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $categorie->actif ? 'Actif' : 'Inactif' }}
                                </button>
                            </form>
                            <form method="POST" action="{{ route('admin.categories.supprimer', $categorie->id) }}"
                                  onsubmit="return confirm('Supprimer cette catégorie ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="p-12 text-center text-gray-500">
                        Aucune catégorie pour le moment
                    </div>
                @endforelse
            </div>
            
            @if ($categories->hasPages())
                <div class="p-4 border-t border-gray-100">
                    {{ $categories->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

@endsection