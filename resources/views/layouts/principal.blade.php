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

    <!-- Header -->
   <!-- Header / Navigation -->
<header class="bg-white/80 backdrop-blur-md shadow-sm border-b border-gray-100 sticky top-0 z-50">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-20">
        <!-- Logo -->
        <a href="{{ route('accueil') }}" class="flex items-center gap-2">
            <span class="text-3xl font-bold tracking-tight text-nissa-choco" style="font-family: 'Playfair Display', serif;">
                NISSA
            </span>
            <span class="hidden sm:inline text-xs text-gray-500 uppercase tracking-widest border-l border-gray-300 pl-2 ml-1">
                Accessoires
            </span>
        </a>
        
        <!-- Menu Desktop -->
        <div class="hidden md:flex items-center space-x-8">
            <a href="{{ route('accueil') }}" class="hover:text-nissa-rose transition font-medium">Accueil</a>
            <a href="{{ route('boutique') }}" class="hover:text-nissa-rose transition font-medium">Boutique</a>
            <a href="{{ route('packs.index') }}" class="hover:text-nissa-rose transition font-medium">Packs</a>
            <a href="{{ route('pages.a-propos') }}" class="hover:text-nissa-rose transition font-medium">À propos</a>
        </div>
        
        <!-- Actions -->
        <div class="flex items-center space-x-4">
            <button class="hidden md:flex items-center gap-2 text-sm font-medium text-white bg-nissa-rose px-4 py-2 rounded-full hover:bg-nissa-rose/90 transition">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/>
                </svg>
                WhatsApp
            </button>
            
            <!-- Panier -->
            <a href="{{ route('panier.index') }}" class="relative p-2 hover:bg-nissa-cream rounded-full transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span class="absolute top-0 right-0 inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-nissa-rose rounded-full">0</span>
            </a>
        </div>
    </nav>
</header>
    <!-- Contenu -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-100 mt-20 py-8">
        <div class="max-w-7xl mx-auto px-4 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Nissa Accessoires. Créations faites main avec passion.
        </div>
    </footer>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>

</html>
