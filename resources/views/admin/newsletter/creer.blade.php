@extends('admin.layouts.admin')

@section('title', 'Envoyer une newsletter')
@section('page-title', 'Envoyer une newsletter')

@section('content')

    @if($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl text-sm">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
        <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-xl text-sm text-blue-900">
            <strong>{{ $totalActifs }}</strong> abonné(s) actif(s) recevront cet email.
        </div>

        <form method="POST" action="{{ route('admin.newsletter.envoyer') }}" onsubmit="return confirmerEnvoi(event);">
            @csrf

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Sujet de l'email</label>
                <input type="text" name="sujet" value="{{ old('sujet') }}" required maxlength="255"
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-nissa-rose"
                    placeholder="Ex: Nouvelle collection printemps disponible">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Contenu de l'email</label>
                <textarea name="contenu" required rows="12"
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-nissa-rose"
                    placeholder="Écrivez votre message ici. Les retours à la ligne seront conservés.">{{ old('contenu') }}</textarea>
                <p class="mt-2 text-xs text-gray-500">
                    Les retours à la ligne seront automatiquement transformés en paragraphes dans l'email.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">
                <a href="{{ route('admin.newsletter.index') }}"
                    class="inline-flex items-center justify-center px-5 py-2.5 border border-gray-200 text-gray-700 rounded-xl text-sm font-medium hover:bg-gray-50 transition">
                    Annuler
                </a>
                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 bg-nissa-choco text-white px-6 py-2.5 rounded-xl text-sm font-semibold hover:bg-nissa-rose transition shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Envoyer à tous les abonnés
                </button>
            </div>
        </form>
    </div>

    {{-- Modale confirmation envoi --}}
    <div id="modale-envoi" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6">
            <div class="flex items-start gap-4 mb-6">
                <div class="w-12 h-12 bg-nissa-rose/20 rounded-full flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-nissa-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-nissa-choco">Confirmer l'envoi</h3>
                    <p class="text-sm text-gray-600 mt-1">
                        Cet email sera envoyé à <strong>{{ $totalActifs }}</strong> abonné(s). Cette action est immédiate.
                    </p>
                </div>
            </div>
            <div class="flex gap-3 justify-end">
                <button type="button" onclick="fermerModaleEnvoi()"
                    class="px-5 py-2.5 border border-gray-200 text-gray-700 rounded-xl text-sm font-medium hover:bg-gray-50 transition">
                    Annuler
                </button>
                <button type="button" id="confirmer-envoi"
                    class="px-5 py-2.5 bg-nissa-choco text-white rounded-xl text-sm font-semibold hover:bg-nissa-rose transition">
                    Confirmer l'envoi
                </button>
            </div>
        </div>
    </div>

    <script>
        let formEnvoi = null;

        function confirmerEnvoi(event) {
            event.preventDefault();
            formEnvoi = event.target;
            document.getElementById('modale-envoi').classList.remove('hidden');
            document.getElementById('modale-envoi').classList.add('flex');
            return false;
        }

        function fermerModaleEnvoi() {
            document.getElementById('modale-envoi').classList.add('hidden');
            document.getElementById('modale-envoi').classList.remove('flex');
        }

        document.getElementById('confirmer-envoi').addEventListener('click', function() {
            if (formEnvoi) formEnvoi.submit();
        });

        document.getElementById('modale-envoi').addEventListener('click', function(e) {
            if (e.target === this) fermerModaleEnvoi();
        });
    </script>

@endsection