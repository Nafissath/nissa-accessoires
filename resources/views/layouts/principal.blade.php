<!DOCTYPE html>
<html lang="fr" class="h-full bg-nissa-cream">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Nissa Accessoires - Créations artisanales béninoises' }}</title>
    <meta name="description" content="{{ $description ?? 'Découvrez nos accessoires faits main au Bénin : chouchous, sacs, trousses. Livraison partout au Bénin. Paiement Mobile Money sécurisé.' }}">
    <meta name="keywords" content="{{ $keywords ?? 'accessoires Bénin, chouchous fait main, sacs artisanaux, mode africaine, Nissa Accessoires' }}">

    {{-- Open Graph (Facebook, WhatsApp) --}}
    <meta property="og:title" content="{{ $title ?? 'Nissa Accessoires' }}">
    <meta property="og:description" content="{{ $description ?? 'Créations artisanales faites main au Bénin' }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('images/og-default.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="fr_BJ">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'Nissa Accessoires' }}">
    <meta name="twitter:description" content="{{ $description ?? 'Créations artisanales faites main au Bénin' }}">
    <meta name="twitter:image" content="{{ $ogImage ?? asset('images/og-default.jpg') }}">

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,500,600,700|poppins:300,400,500,600"
        rel="stylesheet" />

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles

    @stack('head')
</head>

<body class="h-full font-sans text-nissa-choco antialiased">

    {{-- TOAST DE SUCCÈS PANIER --}}
    @if (session('succes'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-x-8"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0 transform translate-x-8"
            class="fixed top-6 right-6 z-[9999] bg-white border-2 border-green-500 rounded-2xl shadow-2xl p-4 max-w-sm"
            style="display: none;">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-nissa-choco text-sm">Ajouté au panier !</p>
                    <p class="text-sm text-gray-600 mt-0.5">{{ session('succes') }}</p>
                </div>
                <button @click="show = false" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <a href="{{ route('panier.index') }}"
                class="mt-3 block w-full text-center py-2 bg-nissa-choco text-white rounded-xl text-sm font-semibold hover:bg-nissa-rose transition">
                Voir mon panier
            </a>
        </div>
    @endif

    {{-- TOAST ERREUR --}}
    @if (session('erreur'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-x-8"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0 transform translate-x-8"
            class="fixed top-6 right-6 z-[9999] bg-white border-2 border-red-500 rounded-2xl shadow-2xl p-4 max-w-sm"
            style="display: none;">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-red-700 text-sm">Attention</p>
                    <p class="text-sm text-gray-600 mt-0.5">{{ session('erreur') }}</p>
                </div>
                <button @click="show = false" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    {{-- HEADER / NAVBAR --}}
    <header class="bg-[#FCFAF8] border-b border-[#eee8e3]">
        <div class="max-w-7xl mx-auto px-5 sm:px-8">
            <div class="h-24 flex items-center justify-between relative">

                {{-- MENU GAUCHE (Desktop) --}}
                <nav class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('accueil') }}"
                        class="text-sm text-nissa-choco hover:text-nissa-rose transition {{ request()->routeIs('accueil') ? 'text-nissa-rose' : '' }}">
                        Accueil
                    </a>
                    <a href="{{ route('boutique') }}"
                        class="text-sm text-nissa-choco hover:text-nissa-rose transition {{ request()->routeIs('boutique') ? 'text-nissa-rose' : '' }}">
                        Boutique
                    </a>
                    <a href="{{ route('packs.index') }}"
                        class="text-sm text-nissa-choco hover:text-nissa-rose transition {{ request()->routeIs('packs.index') ? 'text-nissa-rose' : '' }}">
                        Packs
                    </a>
                    <a href="{{ route('pages.a-propos') }}"
                        class="text-sm text-nissa-choco hover:text-nissa-rose transition {{ request()->routeIs('pages.a-propos') ? 'text-nissa-rose' : '' }}">
                        À propos
                    </a>
                </nav>

                {{-- LOGO CENTRAL --}}
                <a href="{{ route('accueil') }}" class="absolute left-1/2 -translate-x-1/2">
                    <div class="text-center">
                        <div class="text-3xl font-semibold tracking-[0.18em] text-nissa-choco"
                            style="font-family: 'Playfair Display', serif;">
                            NISSA
                        </div>
                        <div class="text-[9px] uppercase tracking-[0.35em] text-nissa-rose mt-1">
                            accessoires
                        </div>
                    </div>
                </a>

                {{-- BARRE DE RECHERCHE (Desktop) --}}
                <form action="{{ route('recherche') }}" method="GET"
                    class="hidden xl:flex items-center flex-1 max-w-xs mx-6 ml-auto mr-4">
                    <div class="relative w-full">
                        <input type="text" name="q" value="{{ request('q') }}"
                            placeholder="Rechercher..."
                            class="w-full pl-10 pr-4 py-2 bg-white border border-[#eee8e3] rounded-full text-sm focus:outline-none focus:border-nissa-rose transition">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </form>

                {{-- ACTIONS DROITE --}}
                <div class="flex items-center gap-2">
                    <a href="https://wa.me/2290191309710" target="_blank"
                        class="hidden sm:flex items-center gap-2 text-sm font-medium text-white bg-nissa-rose px-4 py-2 rounded-full hover:bg-nissa-rose-dark transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347" />
                        </svg>
                        WhatsApp
                    </a>

                    {{-- Icône recherche mobile --}}
                    <button type="button" onclick="document.getElementById('mobile-search').classList.toggle('hidden')"
                        class="xl:hidden w-10 h-10 flex items-center justify-center text-nissa-choco hover:text-nissa-rose transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>

                    <livewire:compteur-favoris />
                    <livewire:compteur-panier />

                    <button type="button" id="burger-btn"
                        class="lg:hidden w-10 h-10 flex items-center justify-center text-nissa-choco hover:text-nissa-rose transition"
                        aria-label="Menu" aria-expanded="false" aria-controls="mobile-menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="burger-icon">
                            <path d="M4 7h16M4 12h16M4 17h16" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        <svg class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            id="close-icon">
                            <path d="M6 18L18 6M6 6l12 12" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- BARRE DE RECHERCHE MOBILE --}}
            <div id="mobile-search" class="hidden pb-4 xl:hidden">
                <form action="{{ route('recherche') }}" method="GET">
                    <div class="relative">
                        <input type="text" name="q" value="{{ request('q') }}"
                            placeholder="Rechercher un produit..."
                            class="w-full pl-10 pr-4 py-3 bg-white border border-[#eee8e3] rounded-full text-sm focus:outline-none focus:border-nissa-rose">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </form>
            </div>
        </div>

        {{-- MENU MOBILE --}}
        <div id="mobile-menu" class="hidden lg:hidden bg-[#FCFAF8] border-t border-[#eee8e3] transition-all duration-300">
            <nav class="max-w-7xl mx-auto px-5 sm:px-8 py-6 flex flex-col gap-1">
                <a href="{{ route('accueil') }}"
                    class="px-4 py-3 rounded-xl text-base font-medium text-nissa-choco hover:bg-nissa-rose/10 hover:text-nissa-rose transition {{ request()->routeIs('accueil') ? 'bg-nissa-rose/10 text-nissa-rose' : '' }}">
                    Accueil
                </a>
                <a href="{{ route('boutique') }}"
                    class="px-4 py-3 rounded-xl text-base font-medium text-nissa-choco hover:bg-nissa-rose/10 hover:text-nissa-rose transition {{ request()->routeIs('boutique') ? 'bg-nissa-rose/10 text-nissa-rose' : '' }}">
                    Boutique
                </a>
                <a href="{{ route('boutique', ['categorie' => 'chouchous']) }}"
                    class="px-4 py-3 rounded-xl text-sm font-medium text-gray-600 hover:bg-nissa-rose/10 hover:text-nissa-rose transition pl-8">
                    ↳ Chouchous
                </a>
                <a href="{{ route('boutique', ['categorie' => 'sacs']) }}"
                    class="px-4 py-3 rounded-xl text-sm font-medium text-gray-600 hover:bg-nissa-rose/10 hover:text-nissa-rose transition pl-8">
                    ↳ Sacs
                </a>
                <a href="{{ route('boutique', ['categorie' => 'trousses']) }}"
                    class="px-4 py-3 rounded-xl text-sm font-medium text-gray-600 hover:bg-nissa-rose/10 hover:text-nissa-rose transition pl-8">
                    ↳ Trousses
                </a>
                <a href="{{ route('packs.index') }}"
                    class="px-4 py-3 rounded-xl text-base font-medium text-nissa-choco hover:bg-nissa-rose/10 hover:text-nissa-rose transition {{ request()->routeIs('packs.index') ? 'bg-nissa-rose/10 text-nissa-rose' : '' }}">
                    Packs
                </a>
                <a href="{{ route('pages.a-propos') }}"
                    class="px-4 py-3 rounded-xl text-base font-medium text-nissa-choco hover:bg-nissa-rose/10 hover:text-nissa-rose transition {{ request()->routeIs('pages.a-propos') ? 'bg-nissa-rose/10 text-nissa-rose' : '' }}">
                    À propos
                </a>

                <div class="border-t border-[#eee8e3] my-3"></div>

                <a href="https://wa.me/2290191309710" target="_blank"
                    class="flex items-center justify-center gap-2 bg-nissa-rose text-white px-6 py-3 rounded-full font-medium hover:bg-nissa-rose-dark transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347" />
                    </svg>
                    Commander sur WhatsApp
                </a>
            </nav>
        </div>
    </header>

    {{-- CONTENU --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-nissa-choco text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-12">
            <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-6 lg:gap-8">
                <div class="md:col-span-3 lg:col-span-1">
                    <div class="mb-4">
                        <div class="text-2xl font-semibold tracking-[0.18em]" style="font-family: 'Playfair Display', serif;">
                            NISSA
                        </div>
                        <div class="text-[9px] uppercase tracking-[0.35em] text-nissa-rose mt-1">accessoires</div>
                    </div>
                    <p class="text-sm text-white/70 leading-relaxed mb-4 max-w-xs">
                        Créations artisanales faites main au Bénin avec passion et amour du détail.
                    </p>
                    <div class="flex items-center gap-3 lg:hidden">
                        <a href="https://www.tiktok.com/@nissa_accessoires" target="_blank" rel="noopener"
                            class="w-9 h-9 rounded-full bg-white/10 hover:bg-nissa-rose flex items-center justify-center transition"
                            aria-label="TikTok">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005.8 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1.84-.1z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <details class="group lg:group-open:block" open>
                        <summary class="flex items-center justify-between font-semibold text-white mb-4 text-sm uppercase tracking-wider cursor-pointer lg:cursor-default list-none">
                            <span>Boutique</span>
                            <svg class="w-4 h-4 lg:hidden transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>
                        <ul class="space-y-2 text-sm mt-3 lg:mt-0">
                            <li><a href="{{ route('boutique') }}" class="text-white/70 hover:text-nissa-rose transition">Tous les produits</a></li>
                            <li><a href="{{ route('boutique', ['categorie' => 'chouchous']) }}" class="text-white/70 hover:text-nissa-rose transition">Chouchous</a></li>
                            <li><a href="{{ route('boutique', ['categorie' => 'sacs']) }}" class="text-white/70 hover:text-nissa-rose transition">Sacs</a></li>
                            <li><a href="{{ route('boutique', ['categorie' => 'trousses']) }}" class="text-white/70 hover:text-nissa-rose transition">Trousses</a></li>
                            <li><a href="{{ route('packs.index') }}" class="text-white/70 hover:text-nissa-rose transition">Packs cadeaux</a></li>
                        </ul>
                    </details>
                </div>

                <div>
                    <details class="group lg:group-open:block" open>
                        <summary class="flex items-center justify-between font-semibold text-white mb-4 text-sm uppercase tracking-wider cursor-pointer lg:cursor-default list-none">
                            <span>Informations</span>
                            <svg class="w-4 h-4 lg:hidden transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>
                        <ul class="space-y-2 text-sm mt-3 lg:mt-0">
                            <li><a href="{{ route('pages.a-propos') }}" class="text-white/70 hover:text-nissa-rose transition">À propos</a></li>
                            <li><a href="{{ route('pages.contact') }}" class="text-white/70 hover:text-nissa-rose transition">Contact</a></li>
                            <li><a href="{{ route('pages.faq') }}" class="text-white/70 hover:text-nissa-rose transition">FAQ</a></li>
                            <li><a href="{{ route('pages.livraison') }}" class="text-white/70 hover:text-nissa-rose transition">Livraison</a></li>
                            <li><a href="{{ route('pages.cgv') }}" class="text-white/70 hover:text-nissa-rose transition">CGV</a></li>
                            <li><a href="{{ route('pages.politique-confidentialite') }}" class="text-white/70 hover:text-nissa-rose transition">Confidentialité</a></li>
                            <li><a href="{{ route('pages.politique-retours') }}" class="text-white/70 hover:text-nissa-rose transition">Retours</a></li>
                            <li><a href="{{ route('pages.mentions-legales') }}" class="text-white/70 hover:text-nissa-rose transition">Mentions légales</a></li>
                        </ul>
                    </details>
                </div>

                <div>
                    <h4 class="font-semibold text-white mb-4 text-sm uppercase tracking-wider">Contact</h4>
                    <ul class="space-y-3 text-sm text-white/70">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-nissa-rose shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                            <a href="https://wa.me/2290191309710" target="_blank" class="hover:text-nissa-rose transition break-all">+229 01 91 30 97 10</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-nissa-rose shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <a href="mailto:nissa.accessoires@gmail.com" class="hover:text-nissa-rose transition break-all text-xs sm:text-sm">nissa.accessoires@gmail.com</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-nissa-rose shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Cotonou, Bénin
                        </li>
                    </ul>

                    <div class="hidden lg:flex items-center gap-3 mt-5">
                        <a href="https://www.tiktok.com/@nissa_accessoires" target="_blank" rel="noopener"
                            class="w-9 h-9 rounded-full bg-white/10 hover:bg-nissa-rose flex items-center justify-center transition"
                            aria-label="TikTok">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005.8 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1.84-.1z" />
                            </svg>
                        </a>
                        <span class="text-xs text-white/50">@nissa_accessoires</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-white/10">
            <div class="max-w-7xl mx-auto px-4 py-5 text-center text-xs text-white/60">
                © {{ date('Y') }} Nissa Accessoires. Tous droits réservés. Créations artisanales faites main avec passion au Bénin
            </div>
        </div>
    </footer>

    {{-- SCRIPT MENU MOBILE --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const burgerBtn = document.getElementById('burger-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const burgerIcon = document.getElementById('burger-icon');
            const closeIcon = document.getElementById('close-icon');

            if (!burgerBtn || !mobileMenu) return;

            burgerBtn.addEventListener('click', function() {
                const isOpen = !mobileMenu.classList.contains('hidden');
                if (isOpen) {
                    mobileMenu.classList.add('hidden');
                    burgerIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                    burgerBtn.setAttribute('aria-expanded', 'false');
                } else {
                    mobileMenu.classList.remove('hidden');
                    burgerIcon.classList.add('hidden');
                    closeIcon.classList.remove('hidden');
                    burgerBtn.setAttribute('aria-expanded', 'true');
                }
            });

            mobileMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenu.classList.add('hidden');
                    burgerIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                    burgerBtn.setAttribute('aria-expanded', 'false');
                });
            });
        });
    </script>

    {{-- BOUTON WHATSAPP FLOTTANT --}}
    <a href="https://wa.me/2290191309710?text={{ urlencode('Bonjour Nissa Accessoires ! Je visite votre site et j\'aimerais avoir plus d\'informations.') }}"
        target="_blank" rel="noopener noreferrer" class="whatsapp-float group fixed bottom-6 right-6 z-50" aria-label="Discuter sur WhatsApp">
        <span class="whatsapp-pulse absolute inset-0 rounded-full bg-[#25D366] animate-ping opacity-40"></span>
        <span class="relative flex items-center justify-center w-14 h-14 md:w-16 md:h-16 bg-[#25D366] rounded-full shadow-2xl transition-all duration-300 group-hover:scale-110 group-hover:shadow-[0_8px_30px_rgba(37,211,102,0.5)]">
            <svg class="w-7 h-7 md:w-8 md:h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
            </svg>
        </span>
        <span class="absolute right-full mr-3 top-1/2 -translate-y-1/2 hidden md:block opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none">
            <span class="block bg-nissa-choco text-white text-xs font-semibold px-4 py-2.5 rounded-xl shadow-xl whitespace-nowrap">
                Une question ? Discutons !
            </span>
        </span>
    </a>

    <!-- Livewire Scripts -->
    @livewireScripts

    {{-- SDK Kkiapay --}}
    <script src="https://cdn.kkiapay.me/k.js"></script>

    @stack('scripts')
</body>

</html>