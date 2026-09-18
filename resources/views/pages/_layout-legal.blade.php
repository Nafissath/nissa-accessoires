@extends('layouts.principal')

@section('content')
<section class="py-16 md:py-24 bg-[#FCFAF8]">
    <div class="max-w-4xl mx-auto px-5 sm:px-8">

        @hasSection('page-header')

            {{-- =====================================================
                 PAGE DESIGNÉE : en-tête + contenu personnalisés
                 (pas de titre par défaut)
            ====================================================== --}}
            @yield('page-header')

            <div class="text-gray-700 leading-relaxed">
                @yield('legal-content')
            </div>

        @else

            {{-- =====================================================
                 PAGE CLASSIQUE : en-tête par défaut + prose
                 (mentions légales, confidentialité, retours...)
            ====================================================== --}}
            <nav class="flex items-center gap-2 text-sm text-gray-500 mb-8">
                <a href="{{ route('accueil') }}" class="hover:text-nissa-rose">Accueil</a>
                <span>/</span>
                <span class="text-nissa-choco font-medium">{{ $title ?? 'Page' }}</span>
            </nav>

            <h1 class="text-4xl md:text-5xl font-bold mb-8 text-nissa-choco"
                style="font-family: 'Playfair Display', serif;">
                {{ $title ?? 'Page' }}
            </h1>

            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-6">
                @yield('legal-content')
            </div>

        @endif


        {{-- =====================================================
             RETOUR ACCUEIL
        ====================================================== --}}
        <div class="mt-12 pt-8 border-t border-[#E9DED4]">
            <a href="{{ route('accueil') }}"
                class="inline-flex items-center gap-2 text-nissa-rose hover:text-nissa-choco transition font-semibold">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Retour à l'accueil
            </a>
        </div>

    </div>
</section>
@endsection