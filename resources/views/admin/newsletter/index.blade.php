@extends('admin.layouts.admin')

@section('title', 'Newsletter')
@section('page-title', 'Newsletter')

@section('content')

    {{-- STATS RAPIDES --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
            <p class="text-xs uppercase tracking-wider text-gray-500 mb-1">Total abonnés</p>
            <p class="text-3xl font-bold text-nissa-choco">{{ $total }}</p>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
            <p class="text-xs uppercase tracking-wider text-green-600 mb-1">Actifs</p>
            <p class="text-3xl font-bold text-green-700">{{ $totalActifs }}</p>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
            <p class="text-xs uppercase tracking-wider text-gray-500 mb-1">Désinscrits</p>
            <p class="text-3xl font-bold text-gray-400">{{ $totalDesinscrits }}</p>
        </div>
    </div>

    {{-- ACTIONS --}}
    <div class="mb-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div class="flex flex-wrap items-center gap-3">
            <a href="{{ route('admin.newsletter.creer') }}"
                class="inline-flex items-center gap-2 bg-nissa-choco text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-nissa-rose transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Envoyer une newsletter
            </a>

            <a href="{{ route('admin.newsletter.export') }}"
                class="inline-flex items-center gap-2 bg-white border border-gray-200 text-nissa-choco px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-gray-50 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
                Exporter CSV
            </a>
        </div>
    </div>

    {{-- RECHERCHE + FILTRES --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
        <form method="GET" class="p-4 flex flex-col sm:flex-row gap-3">
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Rechercher par email..."
                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-nissa-rose">
            </div>
            <select name="statut" class="px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-nissa-rose">
                <option value="">Tous les statuts</option>
                <option value="actif" {{ request('statut') === 'actif' ? 'selected' : '' }}>Actifs uniquement</option>
                <option value="desinscrit" {{ request('statut') === 'desinscrit' ? 'selected' : '' }}>Désinscrits uniquement</option>
            </select>
            <button type="submit"
                class="px-5 py-2.5 bg-nissa-choco text-white rounded-xl text-sm font-semibold hover:bg-nissa-rose transition">
                Filtrer
            </button>
            @if(request()->hasAny(['search', 'statut']))
                <a href="{{ route('admin.newsletter.index') }}"
                    class="px-5 py-2.5 border border-gray-200 text-gray-700 rounded-xl text-sm font-semibold hover:bg-gray-50 transition text-center">
                    Réinitialiser
                </a>
            @endif
        </form>
    </div>

    {{-- TABLE ABONNÉS --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-semibold text-nissa-choco">
                Abonnés
                @if(request('search') || request('statut'))
                    <span class="text-sm font-normal text-gray-500 ml-2">
                        ({{ $abonnes->total() }} résultat{{ $abonnes->total() > 1 ? 's' : '' }})
                    </span>
                @endif
            </h3>
        </div>
        @if ($abonnes->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Source</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Inscrit le</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($abonnes as $abonne)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-nissa-choco font-medium">{{ $abonne->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $abonne->source ?? '-' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $abonne->created_at->format('d/m/Y') }}</td>
                                <td class="px-6 py-4">
                                    @if ($abonne->actif)
                                        <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Actif</span>
                                    @else
                                        <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-600">Désinscrit</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <form method="POST" action="{{ route('admin.newsletter.toggle', $abonne->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-nissa-rose hover:underline text-sm font-medium">
                                                {{ $abonne->actif ? 'Désinscrire' : 'Réinscrire' }}
                                            </button>
                                        </form>

                                        <form method="POST" action="{{ route('admin.newsletter.supprimer', $abonne->id) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                @click="
                                                    modalMessage = 'Voulez-vous vraiment supprimer l\'abonné {{ $abonne->email }} ?';
                                                    modalAction = $el.closest('form');
                                                    showModal = true;
                                                "
                                                class="text-red-500 hover:underline text-sm font-medium">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $abonnes->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-500 mb-2">
                    @if(request('search') || request('statut'))
                        Aucun résultat pour ces filtres
                    @else
                        Aucun abonné pour le moment
                    @endif
                </p>
                <p class="text-sm text-gray-400">Les inscriptions via le footer apparaîtront ici</p>
            </div>
        @endif
    </div>

    {{-- HISTORIQUE DES ENVOIS (PAGINÉ) --}}
    @if ($historique->count() > 0)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="font-semibold text-nissa-choco">Historique des envois</h3>
                <span class="text-xs text-gray-500">{{ $historique->total() }} envoi{{ $historique->total() > 1 ? 's' : '' }} au total</span>
            </div>
            <div class="divide-y divide-gray-100">
                @foreach ($historique as $env)
                    <div class="p-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="flex-1">
                            <p class="font-semibold text-nissa-choco">{{ $env->sujet }}</p>
                            <p class="text-sm text-gray-500 mt-1">
                                {{ $env->envoye_at?->format('d/m/Y H:i') ?? 'En cours' }}
                                · {{ $env->envoyes_reussis }}/{{ $env->nombre_destinataires }} envoyé(s)
                                @if($env->envoyes_echoues > 0)
                                    · <span class="text-red-500">{{ $env->envoyes_echoues }} échec(s)</span>
                                @endif
                            </p>
                            <p class="text-sm text-gray-600 mt-2 line-clamp-2">{{ Str::limit($env->contenu, 150) }}</p>
                        </div>

                        <form method="POST" action="{{ route('admin.newsletter.supprimerEnvoi', $env->id) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                @click="
                                    modalMessage = 'Supprimer cet envoi de l\'historique ?';
                                    modalAction = $el.closest('form');
                                    showModal = true;
                                "
                                class="text-red-500 hover:underline text-sm font-medium">
                                Supprimer
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $historique->links() }}
            </div>
        </div>
    @endif

@endsection