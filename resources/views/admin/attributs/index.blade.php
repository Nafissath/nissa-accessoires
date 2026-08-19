@extends('admin.layouts.admin')

@section('title', 'Attributs')
@section('page-title', 'Attributs (Matières, Couleurs, Tailles)')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    @foreach ([
        ['cle' => 'matiere', 'titre' => 'Matières', 'liste' => $matieres, 'placeholder' => 'Ex: Satin, Soie...'],
        ['cle' => 'couleur', 'titre' => 'Couleurs', 'liste' => $couleurs, 'placeholder' => 'Ex: Rose poudré...'],
        ['cle' => 'taille', 'titre' => 'Tailles', 'liste' => $tailles, 'placeholder' => 'Ex: Unique, M, L...'],
    ] as $section)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-lg font-semibold text-nissa-choco mb-4">{{ $section['titre'] }}</h2>

            <form method="POST" action="{{ route('admin.attributs.enregistrer') }}" class="flex gap-2 mb-5">
                @csrf
                <input type="hidden" name="type" value="{{ $section['cle'] }}">
                <input type="text" name="nom" required placeholder="{{ $section['placeholder'] }}"
                    class="flex-1 px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-nissa-rose">
                <button type="submit" class="px-4 py-2.5 bg-nissa-choco text-white rounded-xl text-sm font-semibold hover:bg-nissa-rose transition">+</button>
            </form>

            <div class="space-y-2 max-h-96 overflow-y-auto">
                @forelse ($section['liste'] as $item)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                        <span class="text-sm font-medium text-nissa-choco">{{ $item->nom }}</span>
                        <div class="flex items-center gap-2">
                            <form method="POST" action="{{ route('admin.attributs.toggle', [$section['cle'], $item->id]) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-2.5 py-1 text-xs font-medium rounded-full {{ $item->actif ? 'bg-green-100 text-green-800' : 'bg-gray-200 text-gray-600' }}">
                                    {{ $item->actif ? 'Actif' : 'Inactif' }}
                                </button>
                            </form>
                            <form method="POST" action="{{ route('admin.attributs.supprimer', [$section['cle'], $item->id]) }}" onsubmit="return confirm('Supprimer ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-sm">✕</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-gray-400 text-center py-4">Aucun élément</p>
                @endforelse
            </div>
        </div>
    @endforeach
</div>

@endsection