<!DOCTYPE html>
<html lang="fr" class="h-full bg-nissa-cream">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Nissa Accessoires - Créations artisanales' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,500,600,700|poppins:300,400,500,600"
        rel="stylesheet" />

    {{-- Kkiapay SDK --}}
    <script src="https://cdn.kkiapay.me/kkiapay.js"></script>

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles
</head>

<body class="h-full font-sans text-nissa-choco antialiased">

    {{-- ============================================================
         HEADER / NAVBAR
    ============================================================= --}}
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

                {{-- ACTIONS DROITE --}}
                <div class="flex items-center gap-2 ml-auto">

                    {{-- WhatsApp (Desktop) --}}
                    <a href="https://wa.me/2290191309710" target="_blank"
                        class="hidden sm:flex items-center gap-2 text-sm font-medium text-white bg-nissa-rose px-4 py-2 rounded-full hover:bg-nissa-rose-dark transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347" />
                        </svg>
                        WhatsApp
                    </a>

                    {{-- Favoris --}}
                    <livewire:compteur-favoris />

                    {{-- Panier --}}
                    <livewire:compteur-panier />

                    {{-- Burger Menu (Mobile/Tablette) --}}
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
        </div>

        {{-- ============================================================
             MENU MOBILE (Dropdown)
        ============================================================= --}}
        <div id="mobile-menu"
            class="hidden lg:hidden bg-[#FCFAF8] border-t border-[#eee8e3] transition-all duration-300">
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

                {{-- WhatsApp mobile (pleine largeur) --}}
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

    {{-- ============================================================
         CONTENU
    ============================================================= --}}
    <main>
        @yield('content')
    </main>

    {{-- ============================================================
     FOOTER AMÉLIORÉ & RESPONSIVE
============================================================= --}}
    <footer class="bg-nissa-choco text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-12">

            {{-- Grille responsive : 1 col mobile / 3 tablette / 4 desktop --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-6 lg:gap-8">

                {{-- Colonne 1 : Marque --}}
                <div class="md:col-span-3 lg:col-span-1">
                    <div class="mb-4">
                        <div class="text-2xl font-semibold tracking-[0.18em]"
                            style="font-family: 'Playfair Display', serif;">
                            NISSA
                        </div>
                        <div class="text-[9px] uppercase tracking-[0.35em] text-nissa-rose mt-1">
                            accessoires
                        </div>
                    </div>
                    <p class="text-sm text-white/70 leading-relaxed mb-4 max-w-xs">
                        Créations artisanales faites main au Bénin avec passion et amour du détail.
                    </p>

                    {{-- Réseaux sociaux (mobile : sous la description / desktop : cachés ici) --}}
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

                {{-- Colonne 2 : Boutique --}}
                <div>
                    <details class="group lg:group-open:block" open>
                        <summary
                            class="flex items-center justify-between font-semibold text-white mb-4 text-sm uppercase tracking-wider cursor-pointer lg:cursor-default list-none">
                            <span>Boutique</span>
                            <svg class="w-4 h-4 lg:hidden transition-transform group-open:rotate-180" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>
                        <ul class="space-y-2 text-sm mt-3 lg:mt-0">
                            <li><a href="{{ route('boutique') }}"
                                    class="text-white/70 hover:text-nissa-rose transition">Tous les produits</a></li>
                            <li><a href="{{ route('boutique', ['categorie' => 'chouchous']) }}"
                                    class="text-white/70 hover:text-nissa-rose transition">Chouchous</a></li>
                            <li><a href="{{ route('boutique', ['categorie' => 'sacs']) }}"
                                    class="text-white/70 hover:text-nissa-rose transition">Sacs</a></li>
                            <li><a href="{{ route('boutique', ['categorie' => 'trousses']) }}"
                                    class="text-white/70 hover:text-nissa-rose transition">Trousses</a></li>
                            <li><a href="{{ route('packs.index') }}"
                                    class="text-white/70 hover:text-nissa-rose transition">Packs cadeaux</a></li>
                        </ul>
                    </details>
                </div>

                {{-- Colonne 3 : Informations --}}
                <div>
                    <details class="group lg:group-open:block" open>
                        <summary
                            class="flex items-center justify-between font-semibold text-white mb-4 text-sm uppercase tracking-wider cursor-pointer lg:cursor-default list-none">
                            <span>Informations</span>
                            <svg class="w-4 h-4 lg:hidden transition-transform group-open:rotate-180" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>
                        <ul class="space-y-2 text-sm mt-3 lg:mt-0">
                            <li><a href="{{ route('pages.a-propos') }}"
                                    class="text-white/70 hover:text-nissa-rose transition">À propos</a></li>
                            <li><a href="{{ route('pages.contact') }}"
                                    class="text-white/70 hover:text-nissa-rose transition">Contact</a></li>
                            <li><a href="{{ route('pages.faq') }}"
                                    class="text-white/70 hover:text-nissa-rose transition">FAQ</a></li>
                            <li><a href="#" class="text-white/70 hover:text-nissa-rose transition">Livraison</a>
                            </li>
                            <li><a href="#" class="text-white/70 hover:text-nissa-rose transition">CGV</a></li>
                        </ul>
                    </details>
                </div>

                {{-- Colonne 4 : Contact --}}
                <div>
                    <h4 class="font-semibold text-white mb-4 text-sm uppercase tracking-wider">Contact</h4>
                    <ul class="space-y-3 text-sm text-white/70">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-nissa-rose shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                            <a href="https://wa.me/2290191309710" target="_blank"
                                class="hover:text-nissa-rose transition break-all">+229 01 91 30 97 10</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-nissa-rose shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <a href="mailto:nissa.accessoires@gmail.com"
                                class="hover:text-nissa-rose transition break-all text-xs sm:text-sm">nissa.accessoires@gmail.com</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-nissa-rose shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Cotonou, Bénin
                        </li>
                    </ul>

                    {{-- TikTok (desktop uniquement) --}}
                    <div class="hidden lg:flex items-center gap-3 mt-5">
                        <a href="https://www.tiktok.com/@nissa_accessoires" target="_blank" rel="noopener"
                            class="w-9 h-9 rounded-full bg-white/10 hover:bg-nissa-rose flex items-center justify-center transition"
                            aria-label="TikTok">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005.8 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1.84-.1z" />
                            </svg>
                        </a>
                        <span class="text-xs text-white/50">@nissa_accessoires</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="border-t border-white/10">
            <div class="max-w-7xl mx-auto px-4 py-5 text-center text-xs text-white/60">
                © {{ date('Y') }} Nissa Accessoires. Tous droits réservés. Créations artisanales faites main avec
                passion au Bénin
            </div>
        </div>
    </footer>

    {{-- ============================================================
         SCRIPT MENU MOBILE
    ============================================================= --}}
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

            // Fermer le menu si on clique sur un lien
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

    {{-- ============================================================
         BOUTON WHATSAPP FLOTTANT
    ============================================================= --}}
    <a href="https://wa.me/2290191309710?text={{ urlencode('Bonjour Nissa Accessoires ! Je visite votre site et j\'aimerais avoir plus d\'informations.') }}"
        target="_blank" rel="noopener noreferrer" class="whatsapp-float group" aria-label="Discuter sur WhatsApp">

        {{-- Halo animé --}}
        <span class="whatsapp-pulse"></span>

        {{-- Bouton --}}
        <span
            class="relative flex items-center justify-center w-14 h-14 md:w-16 md:h-16 bg-[#25D366] rounded-full shadow-2xl transition-all duration-300 group-hover:scale-110 group-hover:shadow-[0_8px_30px_rgba(37,211,102,0.5)]">
            <svg class="w-7 h-7 md:w-8 md:h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
            </svg>
        </span>

        {{-- Bulle de texte (visible au survol sur desktop) --}}
        <span
            class="absolute right-full mr-3 top-1/2 -translate-y-1/2 hidden md:block opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none">
            <span
                class="block bg-nissa-choco text-white text-xs font-semibold px-4 py-2.5 rounded-xl shadow-xl whitespace-nowrap">
                Une question ? Discutons !
            </span>
        </span>
    </a>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>

</html>
