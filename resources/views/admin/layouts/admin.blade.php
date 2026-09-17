<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - Nissa Accessoires</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700|playfair-display:400,600,700"
        rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- ✅ AJOUTER CETTE LIGNE (Alpine.js pour les interactions) --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        /* Masquer scrollbar mais garder scroll */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* ✅ AJOUTER CETTE LIGNE : évite le flash de la modale au chargement */
        [x-cloak] {
            display: none !important;
        }
    </style>

    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 font-sans text-nissa-choco">

    {{-- TOAST SUCCÈS ADMIN --}}
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 translate-y-4"
            class="fixed top-6 right-6 z-[9999] bg-white border-2 border-green-500 rounded-2xl shadow-2xl p-4 max-w-sm"
            style="display: none;">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-green-800 text-sm">Succès</p>
                    <p class="text-sm text-gray-600 mt-0.5 break-words">{{ session('success') }}</p>
                </div>
                <button @click="show = false" class="text-gray-400 hover:text-gray-600 shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    {{-- TOAST ERREUR ADMIN --}}
    @if (session('erreur') || session('error'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 translate-y-4"
            class="fixed top-6 right-6 z-[9999] bg-white border-2 border-red-500 rounded-2xl shadow-2xl p-4 max-w-sm"
            style="display: none;">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-red-700 text-sm">Attention</p>
                    <p class="text-sm text-gray-600 mt-0.5 break-words">{{ session('erreur') ?? session('error') }}</p>
                </div>
                <button @click="show = false" class="text-gray-400 hover:text-gray-600 shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    @auth('admin')
        <div x-data="{ sidebarOpen: false, showModal: false, modalMessage: '', modalAction: null }">

            {{-- Sidebar --}}
            <aside id="admin-sidebar" :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
                class="fixed inset-y-0 left-0 z-40 w-64 bg-nissa-choco text-white flex flex-col transition-transform duration-300">

                <div class="p-6 border-b border-white/10 shrink-0">
                    <h1 class="text-xl font-semibold tracking-wide" style="font-family: 'Playfair Display', serif;">NISSA
                    </h1>
                    <p class="text-xs text-nissa-rose uppercase tracking-widest mt-1">Admin</p>
                </div>

                <nav class="flex-1 p-4 space-y-1 overflow-y-auto scrollbar-hide">
                    <a href="{{ route('admin.tableau-de-bord') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm {{ request()->routeIs('admin.tableau-de-bord') ? 'bg-nissa-rose text-white' : 'text-white/80 hover:bg-white/10' }} transition">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Tableau de bord
                    </a>

                    <a href="{{ route('admin.commandes.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm {{ request()->routeIs('admin.commandes.*') ? 'bg-nissa-rose text-white' : 'text-white/80 hover:bg-white/10' }} transition">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Commandes
                    </a>

                    <a href="{{ route('admin.produits.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm {{ request()->routeIs('admin.produits.*') ? 'bg-nissa-rose text-white' : 'text-white/80 hover:bg-white/10' }} transition">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        Produits
                    </a>

                    <a href="{{ route('admin.packs.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm {{ request()->routeIs('admin.packs.*') ? 'bg-nissa-rose text-white' : 'text-white/80 hover:bg-white/10' }} transition">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                        </svg>
                        Packs
                    </a>

                    <a href="{{ route('admin.categories.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm {{ request()->routeIs('admin.categories.*') ? 'bg-nissa-rose text-white' : 'text-white/80 hover:bg-white/10' }} transition">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        Catégories
                    </a>

                    <a href="{{ route('admin.collections.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm {{ request()->routeIs('admin.collections.*') ? 'bg-nissa-rose text-white' : 'text-white/80 hover:bg-white/10' }} transition">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Collections
                    </a>

                    {{-- ✅ NOUVEAU : Lien Attributs --}}
                    <a href="{{ route('admin.attributs.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm {{ request()->routeIs('admin.attributs.*') ? 'bg-nissa-rose text-white' : 'text-white/80 hover:bg-white/10' }} transition">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 21h10a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343" />
                        </svg>
                        Attributs
                    </a>

                    <a href="{{ route('admin.clientes.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm {{ request()->routeIs('admin.clientes.*') ? 'bg-nissa-rose text-white' : 'text-white/80 hover:bg-white/10' }} transition">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Clientes
                    </a>

                    <a href="{{ route('admin.avis.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm {{ request()->routeIs('admin.avis.*') ? 'bg-nissa-rose text-white' : 'text-white/80 hover:bg-white/10' }} transition">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 2.02-1.538 1.45l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.528-1.538-1.45l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                        Avis clients
                    </a>

                    <a href="{{ route('admin.newsletter.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm {{ request()->routeIs('admin.newsletter.*') ? 'bg-nissa-rose text-white' : 'text-white/80 hover:bg-white/10' }} transition">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Newsletter
                    </a>

                    <a href="{{ route('admin.parametres.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm {{ request()->routeIs('admin.parametres.*') ? 'bg-nissa-rose text-white' : 'text-white/80 hover:bg-white/10' }} transition">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-2.572-1.065c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Paramètres
                    </a>
                </nav>

                <div class="p-4 border-t border-white/10 shrink-0">
                    <div class="flex items-center gap-3 mb-3">
                        <div
                            class="w-9 h-9 rounded-full bg-nissa-rose flex items-center justify-center text-white font-semibold text-sm shrink-0">
                            {{ strtoupper(substr(Auth::guard('admin')->user()->nom, 0, 1)) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium truncate">{{ Auth::guard('admin')->user()->nom }}</p>
                            <p class="text-xs text-white/60 truncate">{{ Auth::guard('admin')->user()->email }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.deconnexion') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 rounded-xl text-sm text-white/80 hover:bg-white/10 transition flex items-center gap-2">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Déconnexion
                        </button>
                    </form>
                </div>
            </aside>

            {{-- Overlay mobile --}}
            <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black/50 z-30 lg:hidden"
                style="display: none;"></div>

            {{-- Contenu principal --}}
            <div class="lg:pl-64 flex flex-col min-h-screen">

                <header class="bg-white border-b border-gray-200 sticky top-0 z-20 shrink-0">
                    <div class="flex items-center justify-between px-4 sm:px-6 py-3">
                        <div class="flex items-center gap-3">
                            <button @click="sidebarOpen = !sidebarOpen"
                                class="lg:hidden w-10 h-10 flex items-center justify-center rounded-xl hover:bg-gray-100 transition">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                            <h2 class="text-lg font-semibold text-nissa-choco">@yield('page-title', 'Administration')</h2>
                        </div>

                        <div class="flex items-center gap-3">
                            <a href="{{ route('accueil') }}" target="_blank"
                                class="hidden sm:flex items-center gap-2 text-sm text-gray-600 hover:text-nissa-rose transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Voir le site
                            </a>
                            <div class="w-px h-6 bg-gray-200 hidden sm:block"></div>
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-9 h-9 rounded-full bg-nissa-rose text-white flex items-center justify-center font-semibold text-sm">
                                    {{ strtoupper(substr(Auth::guard('admin')->user()->nom, 0, 1)) }}
                                </div>
                                <div class="hidden md:block">
                                    <p class="text-sm font-medium leading-tight">{{ Auth::guard('admin')->user()->nom }}
                                    </p>
                                    <p class="text-xs text-gray-500 leading-tight">Administratrice</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                {{-- Toasts --}}
                @if (session('success'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" x-transition
                        class="fixed top-6 right-6 z-50 bg-white border-2 border-green-500 rounded-2xl shadow-2xl p-4 max-w-sm">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold text-nissa-choco text-sm">Succès</p>
                                <p class="text-sm text-gray-600 mt-0.5">{{ session('success') }}</p>
                            </div>
                            <button @click="show = false" class="text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000)" x-transition
                        class="fixed top-6 right-6 z-50 bg-white border-2 border-red-500 rounded-2xl shadow-2xl p-4 max-w-sm">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold text-red-700 text-sm">Erreur</p>
                                <p class="text-sm text-gray-600 mt-0.5">{{ $errors->first() }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Modale de confirmation --}}
                <div x-show="showModal" x-cloak x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-150"
                    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm"
                    style="display: none;">
                    <div @click.outside="showModal = false" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        class="bg-white rounded-3xl shadow-2xl max-w-md w-full p-8">
                        <div class="text-center">
                            <div class="w-16 h-16 mx-auto mb-4 bg-red-50 rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-nissa-choco mb-2" x-text="modalMessage"></h3>
                            <p class="text-sm text-gray-500 mb-6">Cette action est irréversible.</p>
                            <div class="flex gap-3">
                                <button @click="showModal = false" type="button"
                                    class="flex-1 px-6 py-3 border-2 border-gray-200 text-gray-700 rounded-2xl font-semibold hover:bg-gray-50 transition">
                                    Annuler
                                </button>
                                <button @click="if(modalAction) modalAction.submit(); showModal = false;" type="button"
                                    class="flex-1 px-6 py-3 bg-red-500 text-white rounded-2xl font-semibold hover:bg-red-600 transition">
                                    Confirmer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <main class="flex-1 p-4 sm:p-6 lg:p-8">
                    @yield('content')
                </main>

                <footer class="px-6 py-4 text-center text-xs text-gray-400 border-t border-gray-200 bg-white shrink-0">
                    © {{ date('Y') }} Nissa Accessoires — Espace administrateur
                </footer>
            </div>
        </div>
    @else
        @yield('content')
    @endauth

</body>

</html>
