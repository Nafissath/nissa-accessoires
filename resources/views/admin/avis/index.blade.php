@extends('admin.layouts.admin')

@section('title', 'Avis clients')
@section('page-title', 'Avis clients')

@section('content')

    @if($enAttente > 0)
        <div class="mb-6 bg-yellow-50 border border-yellow-200 text-yellow-800 px-4 py-3 rounded-xl text-sm flex items-center gap-3">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <span><strong>{{ $enAttente }}</strong> avis en attente de validation</span>
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 mb-6">
        <form method="GET" class="flex flex-col sm:flex-row gap-3">
            <select name="statut" class="px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-nissa-rose">
                <option value="">Tous les avis</option>
                <option value="attente" {{ request('statut') === 'attente' ? 'selected' : '' }}>En attente</option>
                <option value="approuve" {{ request('statut') === 'approuve' ? 'selected' : '' }}>Approuvés</option>
            </select>
            <button type="submit" class="px-5 py-2.5 bg-nissa-choco text-white rounded-xl text-sm font-semibold hover:bg-nissa-rose transition">
                Filtrer
            </button>
            @if(request('statut'))
                <a href="{{ route('admin.avis.index') }}" class="px-5 py-2.5 border border-gray-200 text-gray-700 rounded-xl text-sm font-semibold hover:bg-gray-50 transition text-center">
                    Réinitialiser
                </a>
            @endif
        </form>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        @if($avis->count() > 0)
            <div class="divide-y divide-gray-100">
                @foreach($avis as $unAvis)
                    <div class="p-6">
                        <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">

                            <div class="flex-1 min-w-0">
                                <div class="flex flex-wrap items-center gap-3 mb-3">
                                    <div class="w-10 h-10 rounded-full bg-nissa-rose/10 flex items-center justify-center text-nissa-rose font-semibold shrink-0">
                                        {{ strtoupper(substr($unAvis->nom, 0, 1)) }}
                                    </div>
                                    <div class="min-w-0">
                                        <p class="font-semibold text-nissa-choco text-sm">{{ $unAvis->nom }}</p>
                                        <p class="text-xs text-gray-400 break-all">{{ $unAvis->email }} · {{ $unAvis->created_at->format('d/m/Y H:i') }}</p>
                                    </div>
                                    <div class="flex gap-0.5">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= $unAvis->note ? 'text-nissa-gold' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        @endfor
                                    </div>
                                    @if($unAvis->est_approuve)
                                        <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Publié</span>
                                    @else
                                        <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">En attente</span>
                                    @endif
                                </div>

                                <p class="text-sm text-gray-500 mb-2">
                                    Produit :
                                    <a href="{{ route('produit.afficher', $unAvis->produit->slug) }}" target="_blank"
                                        class="font-medium text-nissa-choco hover:text-nissa-rose transition">
                                        {{ $unAvis->produit->nom ?? 'Produit supprimé' }}
                                    </a>
                                </p>

                                <p class="text-sm text-gray-600 leading-relaxed">{{ $unAvis->commentaire }}</p>
                            </div>

                            {{-- Actions : toujours 2 boutons visibles --}}
                            <div class="flex flex-col gap-2 shrink-0 min-w-[160px]">
                                @if($unAvis->est_approuve)
                                    {{-- Avis DÉJÀ approuvé : on propose de le remettre en attente --}}
                                    <form method="POST" action="{{ route('admin.avis.refuser', $unAvis->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="w-full px-4 py-2 bg-yellow-500 text-white rounded-xl text-xs font-semibold hover:bg-yellow-600 transition">
                                            Remettre en attente
                                        </button>
                                    </form>
                                @else
                                    {{-- Avis EN ATTENTE : on propose de l'approuver --}}
                                    <form method="POST" action="{{ route('admin.avis.approuver', $unAvis->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="w-full px-4 py-2 bg-green-600 text-white rounded-xl text-xs font-semibold hover:bg-green-700 transition">
                                            Approuver
                                        </button>
                                    </form>
                                @endif

                                <form method="POST" action="{{ route('admin.avis.supprimer', $unAvis->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        @click="modalMessage = 'Supprimer définitivement cet avis de {{ $unAvis->nom }} ?'; modalAction = $el.closest('form'); showModal = true;"
                                        class="w-full px-4 py-2 bg-red-500 text-white rounded-xl text-xs font-semibold hover:bg-red-600 transition">
                                        Supprimer
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            <div class="px-6 py-4 border-t border-gray-100">
                {{ $avis->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <div class="w-16 h-16 mx-auto mb-4 bg-nissa-cream rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-nissa-rose/50" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <p class="text-gray-500 mb-2">Aucun avis pour le moment</p>
                <p class="text-sm text-gray-400">Les avis laissés sur les fiches produits apparaîtront ici</p>
            </div>
        @endif
    </div>

@endsection