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
                <a href="{{ route('accueil') }}"
                   class="absolute left-1/2 -translate-x-1/2">
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
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/>
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
                            <path d="M4 7h16M4 12h16M4 17h16" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                        <svg class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="close-icon">
                            <path d="M6 18L18 6M6 6l12 12" stroke-width="1.5" stroke-linecap="round"/>
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
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/>
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
         FOOTER
    ============================================================= --}}
    <footer class="bg-white border-t border-gray-100 mt-20 py-8">
        <div class="max-w-7xl mx-auto px-4 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Nissa Accessoires. Créations faites main avec passion.
        </div>
    </footer>

    {{-- ============================================================
         SCRIPT MENU MOBILE
    ============================================================= --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const burgerBtn = document.getElementById('burger-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const burgerIcon = document.getElementById('burger-icon');
            const closeIcon = document.getElementById('close-icon');

            if (!burgerBtn || !mobileMenu) return;

            burgerBtn.addEventListener('click', function () {
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
                link.addEventListener('click', function () {
                    mobileMenu.classList.add('hidden');
                    burgerIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                    burgerBtn.setAttribute('aria-expanded', 'false');
                });
            });
        });
    </script>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>

</html>