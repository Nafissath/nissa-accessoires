@extends('layouts.principal')

@section('content')
    {{-- =========================================================
     HERO
========================================================= --}}
    <section class="relative overflow-hidden bg-[#FCFAF8]">

        <div class="max-w-7xl mx-auto px-5 sm:px-8 py-20 lg:py-28">

            <div class="max-w-4xl mx-auto text-center">

                <span
                    class="inline-flex items-center gap-3 text-[11px] uppercase tracking-[0.35em] text-nissa-rose font-medium">
                    <span class="w-8 h-px bg-nissa-rose"></span>
                    À propos de NISSA
                    <span class="w-8 h-px bg-nissa-rose"></span>
                </span>

                <h1 class="mt-7 text-5xl sm:text-6xl lg:text-7xl leading-[1.05] text-nissa-choco"
                    style="font-family:'Playfair Display', serif;">
                    Une marque née
                    <span class="italic">de l'envie de créer.</span>
                </h1>

                <p class="mt-7 max-w-2xl mx-auto text-base sm:text-lg leading-8 text-gray-600">
                    NISSA imagine des créations pensées pour accompagner le quotidien,
                    exprimer un style et donner de la valeur aux petits détails.
                </p>

            </div>

        </div>

        {{-- Décoration --}}
        <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-nissa-rose/10"></div>
        <div class="absolute -bottom-32 -left-24 w-80 h-80 rounded-full bg-nissa-gold/10"></div>

    </section>


    {{-- =========================================================
     MANIFESTE
========================================================= --}}
    <section class="bg-nissa-choco text-white py-16 md:py-20 overflow-hidden relative">

        <div class="absolute top-0 left-1/4 w-96 h-96 bg-nissa-rose/10 rounded-full blur-3xl"></div>

        <div class="absolute -bottom-40 right-0 w-80 h-80 bg-nissa-gold/10 rounded-full blur-3xl"></div>

        <div class="relative max-w-4xl mx-auto px-5 text-center">

            <p class="text-2xl md:text-3xl italic leading-relaxed font-light text-white/95"
                style="font-family:'Playfair Display', serif;">
                « Créer des pièces qui ont une place dans votre quotidien,
                tout en laissant une place à votre personnalité. »
            </p>

            <div class="mt-8 flex items-center justify-center gap-4">

                <span class="h-px w-16 bg-nissa-rose/60"></span>

                <span class="text-sm uppercase tracking-[0.3em] text-nissa-rose">
                    L'esprit NISSA
                </span>

                <span class="h-px w-16 bg-nissa-rose/60"></span>

            </div>

        </div>

    </section>


    {{-- =========================================================
     NOTRE HISTOIRE
========================================================= --}}
    <section class="bg-white py-20 md:py-28">

        <div class="max-w-6xl mx-auto px-5 sm:px-8">

            <div class="grid lg:grid-cols-[0.8fr_1.2fr] gap-14 lg:gap-24 items-start">

                {{-- Titre STICKY --}}
                <div class="lg:sticky lg:top-32">

                    <span class="text-[11px] uppercase tracking-[0.3em] text-nissa-rose font-medium">
                        Notre histoire
                    </span>

                    <h2 class="mt-4 text-4xl sm:text-5xl leading-tight text-nissa-choco"
                        style="font-family:'Playfair Display', serif;">
                        Tout commence<br>
                        par une idée.
                    </h2>

                    <div class="mt-7 w-16 h-px bg-nissa-gold"></div>

                </div>


                {{-- Texte qui défile --}}
                <div class="space-y-6 text-gray-600 leading-8">

                    <p>
                        <strong class="text-nissa-choco">
                            NISSA
                        </strong>
                        est née d'une envie simple : créer de belles choses,
                        avec soin, et leur donner une place dans le quotidien.
                    </p>

                    <p>
                        Au fil des créations, l'univers de la marque s'est construit
                        autour de matières, de couleurs et de savoir-faire qui permettent
                        à chaque pièce d'avoir sa propre personnalité.
                    </p>

                    <p>
                        Des chouchous aux créations au crochet, chaque article est pensé
                        avec attention, dans une démarche qui associe esthétique,
                        créativité et travail artisanal.
                    </p>

                    <p>
                        NISSA évolue avec les envies, les idées et les personnes qui
                        découvrent la marque. L'objectif n'est pas simplement de proposer
                        des accessoires, mais de créer un univers dans lequel chacun peut
                        trouver une pièce qui lui ressemble.
                    </p>

                    <div class="pt-5">

                        <p class="text-xl text-nissa-choco italic leading-8" style="font-family:'Playfair Display', serif;">
                            « Les petits détails peuvent parfois raconter
                            les plus belles histoires. »
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
     POURQUOI NISSA
========================================================= --}}
    <section class="bg-[#F8F3EE] py-20 md:py-28">

        <div class="max-w-6xl mx-auto px-5 sm:px-8">

            <div class="grid lg:grid-cols-2 gap-14 lg:gap-24 items-center">

                <div>

                    <p class="text-xs uppercase tracking-[0.3em] text-nissa-rose font-semibold mb-5">
                        L'origine du nom
                    </p>

                    <h2 class="text-6xl md:text-8xl font-medium text-nissa-choco leading-none"
                        style="font-family:'Playfair Display', serif;">
                        Nissa<span class="text-nissa-rose">.</span>
                    </h2>

                    <div class="mt-8 flex items-center gap-4">

                        <span class="w-16 h-px bg-nissa-rose"></span>

                        <span class="text-xs uppercase tracking-[0.3em] text-gray-500">
                            Une identité
                        </span>

                    </div>

                </div>


                <div class="space-y-6 text-gray-700 leading-relaxed">

                    <p class="text-lg">

                        Le nom
                        <strong class="text-nissa-choco">
                            Nissa
                        </strong>
                        vient de l'arabe et signifie
                        <em class="text-nissa-rose not-italic font-semibold">
                            « femmes »
                        </em>.

                        Cette inspiration a donné naissance à l'univers initial
                        de la marque : un univers tourné vers la femme,
                        son élégance, sa créativité et sa manière de s'affirmer.

                    </p>

                    <p>

                        Mais au-delà de sa signification,
                        Nissa représente une
                        <strong class="text-nissa-choco">
                            identité
                        </strong>.

                        Une identité qui évolue, qui expérimente,
                        qui crée et qui laisse à chacun la possibilité
                        de trouver quelque chose qui lui ressemble.

                    </p>

                    <div class="mt-8 pl-6 border-l-2 border-nissa-rose">

                        <p class="text-xl md:text-2xl italic text-nissa-choco"
                            style="font-family:'Playfair Display', serif;">
                            NISSA évolue, mais son envie de créer reste au cœur
                            de son identité.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
     LA FONDATRICE
========================================================= --}}
    {{-- <section class="bg-white py-20 md:py-28">

    <div class="max-w-6xl mx-auto px-5 sm:px-8">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20 items-center">

            <div class="order-2 md:order-1">

                <p class="text-xs uppercase tracking-[0.3em] text-nissa-rose font-semibold mb-5">
                    La fondatrice
                </p>

                <h2
                    class="text-4xl md:text-5xl font-medium mb-6 text-nissa-choco"
                    style="font-family:'Playfair Display', serif;"
                >
                    Une créatrice derrière NISSA
                </h2>

                <p class="text-gray-700 leading-relaxed mb-5">
                    Derrière NISSA se trouve une envie de créer,
                    d'imaginer des pièces originales et de construire
                    progressivement un univers qui associe créativité,
                    élégance et accessibilité.
                </p>

                <p class="text-gray-700 leading-relaxed mb-5">
                    Chaque étape de la marque est l'occasion d'expérimenter,
                    d'apprendre et de faire évoluer les collections
                    en fonction des idées et des envies de création.
                </p>

                <p class="text-gray-700 leading-relaxed">
                    Aujourd'hui, cette vision se traduit à travers
                    des accessoires et des créations artisanales
                    imaginés avec attention.
                </p>

                <div class="mt-8 flex items-center gap-4">

                    <span class="w-12 h-px bg-nissa-rose"></span>

                    <span class="text-sm uppercase tracking-[0.2em] text-nissa-choco">
                        Nafissath
                    </span>

                </div>

            </div>


            <div class="order-1 md:order-2">

                <div
                    class="relative aspect-4/5 rounded-3xl overflow-hidden
                           bg-[#F4EDE5] border border-[#E9DED4]"
                >

                    <div class="absolute inset-0 flex flex-col items-center justify-center p-10 text-center">

                        <div
                            class="w-20 h-20 rounded-full bg-white/70
                                   flex items-center justify-center mb-6"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-8 h-8 text-nissa-rose"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M15.75 7.5a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 21a7.5 7.5 0 0115 0"
                                />

                            </svg>

                        </div>

                        <p
                            class="text-3xl text-nissa-choco italic"
                            style="font-family:'Playfair Display', serif;"
                        >
                            Nafissath
                        </p>

                        <p class="mt-2 text-sm text-gray-500">
                            Fondatrice & créatrice
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section> --}}

    {{-- =========================================================
     LA FONDATRICE
========================================================= --}}
    <section class="bg-white py-20 md:py-28">

        <div class="max-w-6xl mx-auto px-5 sm:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20 items-center">

                {{-- Texte à gauche --}}
                <div class="order-2 md:order-1">

                    <p class="text-xs uppercase tracking-[0.3em] text-nissa-rose font-semibold mb-5">
                        La fondatrice
                    </p>

                    <h2 class="text-4xl md:text-5xl font-medium mb-6 text-nissa-choco"
                        style="font-family:'Playfair Display', serif;">
                        Une créatrice derrière NISSA
                    </h2>

                    <p class="text-gray-700 leading-relaxed mb-5">
                        Derrière NISSA se trouve une envie de créer,
                        d'imaginer des pièces originales et de construire
                        progressivement un univers qui associe créativité,
                        élégance et accessibilité.
                    </p>

                    <p class="text-gray-700 leading-relaxed mb-5">
                        Chaque étape de la marque est l'occasion d'expérimenter,
                        d'apprendre et de faire évoluer les collections
                        en fonction des idées et des envies de création.
                    </p>

                    <p class="text-gray-700 leading-relaxed">
                        Aujourd'hui, cette vision se traduit à travers
                        des accessoires et des créations artisanales
                        imaginés avec attention.
                    </p>

                    <div class="mt-8 flex items-center gap-4">

                        <span class="w-12 h-px bg-nissa-rose"></span>

                        <span class="text-sm uppercase tracking-[0.2em] text-nissa-choco">
                            Nafissath
                        </span>

                    </div>

                </div>


                {{-- Image à droite (placeholder élégant) --}}
                <div class="order-1 md:order-2">

                    <div
                        class="relative aspect-[4/5] rounded-3xl overflow-hidden
                           bg-gradient-to-br from-nissa-rose/20 via-nissa-cream to-nissa-gold/20
                           border border-nissa-rose/20 shadow-xl">

                        {{-- Décorations circulaires --}}
                        <div class="absolute top-8 left-8 w-16 h-16 rounded-full bg-nissa-rose/10"></div>
                        <div class="absolute bottom-12 right-8 w-24 h-24 rounded-full bg-nissa-gold/10"></div>
                        <div class="absolute top-1/3 right-12 w-12 h-12 rounded-full bg-nissa-choco/5"></div>

                        {{-- Contenu centré --}}
                        <div class="absolute inset-0 flex flex-col items-center justify-center p-10 text-center">

                            <div
                                class="w-32 h-32 rounded-full bg-white/80 backdrop-blur
                                   flex items-center justify-center mb-6 shadow-xl">
                                <span class="text-5xl font-bold text-nissa-rose"
                                    style="font-family: 'Playfair Display', serif;">
                                    N
                                </span>
                            </div>

                            <p class="text-3xl text-nissa-choco italic" style="font-family:'Playfair Display', serif;">
                                Nafissath
                            </p>

                            <p class="mt-2 text-sm text-gray-500">
                                Fondatrice & créatrice
                            </p>

                            <div class="mt-6 flex items-center gap-2">
                                <span class="w-8 h-px bg-nissa-rose"></span>
                                <span class="text-[10px] uppercase tracking-[0.3em] text-gray-400">
                                    Bénin
                                </span>
                                <span class="w-8 h-px bg-nissa-rose"></span>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- <div class="order-1 md:order-2">
    <div class="relative">
        Photo principale 
        <img
            src="{{ asset('images/fondatrice.jpg') }}"
            alt="Nafissath, fondatrice de Nissa Accessoires"
            class="relative rounded-3xl shadow-2xl w-full object-cover aspect-[4/5]"
        >

        Badge flottant (optionnel) 
        <div class="absolute -bottom-6 -right-6 bg-white rounded-2xl shadow-xl p-4 hidden md:block">
            <p class="text-3xl font-bold text-nissa-choco" style="font-family: 'Playfair Display', serif;">N</p>
            <p class="text-xs text-gray-500 uppercase tracking-wider">Nafissath</p>
        </div>
    </div>
</div> --}}


    {{-- =========================================================
     PHILOSOPHIE
========================================================= --}}
    <section class="bg-[#FBF8F3] py-20 md:py-28">

        <div class="max-w-6xl mx-auto px-5 sm:px-8">

            <div class="max-w-3xl mb-14">

                <p class="text-xs uppercase tracking-[0.3em] text-nissa-rose font-semibold mb-5">
                    Notre philosophie
                </p>

                <h2 class="text-4xl md:text-5xl font-medium text-nissa-choco leading-tight"
                    style="font-family:'Playfair Display', serif;">
                    Plus qu'un accessoire,
                    <span class="italic text-nissa-rose">
                        une intention.
                    </span>
                </h2>

                <p class="mt-6 text-gray-600 text-lg leading-relaxed">
                    Un chouchou peut accompagner une coiffure au quotidien.
                    Un sac peut devenir une pièce qui affirme un style.
                    Une création au crochet peut apporter une touche personnelle
                    à une tenue.
                </p>

                <p class="mt-4 text-gray-600 text-lg leading-relaxed">
                    Nous voulons créer des pièces que l'on a envie de porter,
                    d'utiliser, d'offrir et de garder.
                </p>

            </div>


            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">

                {{-- Beauté --}}
                <div
                    class="group bg-white rounded-3xl p-7 border border-[#eee8e3]
                        hover:shadow-lg transition duration-300">

                    <div
                        class="w-12 h-12 rounded-2xl bg-nissa-rose/10
                            flex items-center justify-center mb-6">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-nissa-rose" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4.5 12.75l6 6 9-9" />
                        </svg>

                    </div>

                    <h3 class="text-xl text-nissa-choco font-semibold" style="font-family:'Playfair Display', serif;">
                        Beauté
                    </h3>

                    <p class="mt-3 text-sm text-gray-500 leading-relaxed">
                        Des créations pensées pour apporter une touche
                        soignée et élégante au quotidien.
                    </p>

                </div>


                {{-- Créativité --}}
                <div
                    class="group bg-white rounded-3xl p-7 border border-[#eee8e3]
                        hover:shadow-lg transition duration-300">

                    <div
                        class="w-12 h-12 rounded-2xl bg-nissa-gold/10
                            flex items-center justify-center mb-6">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-nissa-gold" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 3v18M3 12h18" />
                        </svg>

                    </div>

                    <h3 class="text-xl text-nissa-choco font-semibold" style="font-family:'Playfair Display', serif;">
                        Créativité
                    </h3>

                    <p class="mt-3 text-sm text-gray-500 leading-relaxed">
                        Explorer les matières, les couleurs et les formes
                        pour donner vie à de nouvelles idées.
                    </p>

                </div>


                {{-- Simplicité --}}
                <div
                    class="group bg-white rounded-3xl p-7 border border-[#eee8e3]
                        hover:shadow-lg transition duration-300">

                    <div
                        class="w-12 h-12 rounded-2xl bg-nissa-sauge/10
                            flex items-center justify-center mb-6">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-nissa-sauge" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6l4 2" />
                        </svg>

                    </div>

                    <h3 class="text-xl text-nissa-choco font-semibold" style="font-family:'Playfair Display', serif;">
                        Simplicité
                    </h3>

                    <p class="mt-3 text-sm text-gray-500 leading-relaxed">
                        Des pièces faciles à intégrer dans la vie quotidienne,
                        sans perdre leur caractère.
                    </p>

                </div>


                {{-- Personnalité --}}
                <div
                    class="group bg-white rounded-3xl p-7 border border-[#eee8e3]
                        hover:shadow-lg transition duration-300">

                    <div
                        class="w-12 h-12 rounded-2xl bg-nissa-rose/10
                            flex items-center justify-center mb-6">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-nissa-rose" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 3l1.9 5.8H20l-4.8 3.5 1.8 5.7-5-3.5-5 3.5 1.8-5.7L4 8.8h6.1L12 3z" />
                        </svg>

                    </div>

                    <h3 class="text-xl text-nissa-choco font-semibold" style="font-family:'Playfair Display', serif;">
                        Personnalité
                    </h3>

                    <p class="mt-3 text-sm text-gray-500 leading-relaxed">
                        Parce qu'un accessoire peut devenir une façon
                        de montrer ce qui nous rend unique.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
     NOTRE UNIVERS
     Design des cartes conservé du deuxième code
========================================================= --}}
    <section class="bg-white py-20 md:py-28">

        <div class="max-w-6xl mx-auto px-5 sm:px-8">

            <div class="text-center max-w-2xl mx-auto mb-14">

                <p class="text-xs uppercase tracking-[0.3em] text-nissa-rose font-semibold mb-5">
                    Notre univers
                </p>

                <h2 class="text-4xl md:text-5xl font-medium text-nissa-choco"
                    style="font-family:'Playfair Display', serif;">
                    Des créations qui évoluent
                </h2>

                <p class="mt-5 text-gray-500 leading-relaxed">
                    NISSA rassemble plusieurs univers créatifs,
                    avec l'envie de proposer des pièces différentes
                    pour différentes façons de s'exprimer.
                </p>

            </div>


            <div class="grid md:grid-cols-3 gap-6">

                {{-- Chouchous --}}
                <a href="{{ route('boutique', ['categorie' => 'chouchous']) }}"
                    class="group relative overflow-hidden rounded-3xl bg-[#FBF8F3]
                       p-8 min-h-[300px] flex flex-col justify-end
                       border border-[#eee8e3]
                       hover:shadow-xl transition duration-300">

                    <div
                        class="absolute -top-16 -right-16 w-48 h-48
                           rounded-full bg-nissa-rose/10
                           group-hover:scale-125 transition duration-500">
                    </div>

                    <div class="relative">

                        <p class="text-xs uppercase tracking-[0.25em] text-nissa-rose font-semibold">
                            Collection
                        </p>

                        <h3 class="mt-3 text-3xl text-nissa-choco" style="font-family:'Playfair Display', serif;">
                            Chouchous
                        </h3>

                        <p class="mt-4 text-sm text-gray-500 leading-relaxed">
                            Satin, soie, velours, laine et autres matières
                            pour accompagner différents styles.
                        </p>

                        <span class="inline-flex mt-6 items-center gap-2 text-sm font-medium text-nissa-choco">

                            Découvrir

                            <span class="group-hover:translate-x-1 transition">
                                →
                            </span>

                        </span>

                    </div>

                </a>


                {{-- Crochet --}}
                <a href="{{ route('boutique', ['categorie' => 'crochet']) }}"
                    class="group relative overflow-hidden rounded-3xl bg-[#F7F2EA]
                       p-8 min-h-[300px] flex flex-col justify-end
                       border border-[#eee8e3]
                       hover:shadow-xl transition duration-300">

                    <div
                        class="absolute -top-16 -right-16 w-48 h-48
                           rounded-full bg-nissa-gold/10
                           group-hover:scale-125 transition duration-500">
                    </div>

                    <div class="relative">

                        <p class="text-xs uppercase tracking-[0.25em] text-nissa-gold font-semibold">
                            Fait main
                        </p>

                        <h3 class="mt-3 text-3xl text-nissa-choco" style="font-family:'Playfair Display', serif;">
                            Crochet
                        </h3>

                        <p class="mt-4 text-sm text-gray-500 leading-relaxed">
                            Sacs, trousses et autres créations artisanales
                            pensées comme de véritables pièces de style.
                        </p>

                        <span class="inline-flex mt-6 items-center gap-2 text-sm font-medium text-nissa-choco">

                            Découvrir

                            <span class="group-hover:translate-x-1 transition">
                                →
                            </span>

                        </span>

                    </div>

                </a>


                {{-- Packs --}}
                <a href="{{ route('packs.index') }}"
                    class="group relative overflow-hidden rounded-3xl bg-[#F5EEE8]
                       p-8 min-h-[300px] flex flex-col justify-end
                       border border-[#eee8e3]
                       hover:shadow-xl transition duration-300">

                    <div
                        class="absolute -top-16 -right-16 w-48 h-48
                           rounded-full bg-nissa-sauge/10
                           group-hover:scale-125 transition duration-500">
                    </div>

                    <div class="relative">

                        <p class="text-xs uppercase tracking-[0.25em] text-nissa-sauge font-semibold">
                            À offrir
                        </p>

                        <h3 class="mt-3 text-3xl text-nissa-choco" style="font-family:'Playfair Display', serif;">
                            Packs & Coffrets
                        </h3>

                        <p class="mt-4 text-sm text-gray-500 leading-relaxed">
                            Des associations pensées pour découvrir plusieurs
                            créations ou faire plaisir à quelqu'un.
                        </p>

                        <span class="inline-flex mt-6 items-center gap-2 text-sm font-medium text-nissa-choco">

                            Découvrir

                            <span class="group-hover:translate-x-1 transition">
                                →
                            </span>

                        </span>

                    </div>

                </a>

            </div>

        </div>

    </section>


   {{-- =========================================================
     SAVOIR-FAIRE / MATIÈRES
========================================================= --}}
<section class="bg-[#FBF8F3] py-20 md:py-28">

    <div class="max-w-6xl mx-auto px-5 sm:px-8">

        <div class="grid lg:grid-cols-[0.8fr_1.2fr] gap-14 lg:gap-24 items-start">

            <div>

                <p class="text-xs uppercase tracking-[0.3em] text-nissa-rose font-semibold mb-5">
                    Nos matières
                </p>

                <h2
                    class="text-4xl md:text-5xl font-medium text-nissa-choco leading-tight"
                    style="font-family:'Playfair Display', serif;"
                >
                    La matière au cœur
                    <span class="italic text-nissa-rose">
                        de la création.
                    </span>
                </h2>

                <p class="mt-6 text-gray-600 leading-relaxed">
                    Les matières jouent un rôle essentiel dans l'univers
                    de NISSA. Elles influencent le toucher, l'apparence,
                    les couleurs et le caractère de chaque création.
                </p>

            </div>


            <div class="grid sm:grid-cols-2 gap-4">

                <div class="bg-white rounded-2xl p-6 border border-[#eee8e3]">
                    <span class="text-xs uppercase tracking-[0.25em] text-nissa-rose">01</span>
                    <h3 class="mt-3 text-2xl text-nissa-choco" style="font-family:'Playfair Display', serif;">Satin</h3>
                    <p class="mt-2 text-sm text-gray-500">Douceur, fluidité et élégance.</p>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-[#eee8e3]">
                    <span class="text-xs uppercase tracking-[0.25em] text-nissa-gold">02</span>
                    <h3 class="mt-3 text-2xl text-nissa-choco" style="font-family:'Playfair Display', serif;">Soie</h3>
                    <p class="mt-2 text-sm text-gray-500">Une matière raffinée et délicate.</p>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-[#eee8e3]">
                    <span class="text-xs uppercase tracking-[0.25em] text-nissa-rose">03</span>
                    <h3 class="mt-3 text-2xl text-nissa-choco" style="font-family:'Playfair Display', serif;">Velours</h3>
                    <p class="mt-2 text-sm text-gray-500">Texture, profondeur et caractère.</p>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-[#eee8e3]">
                    <span class="text-xs uppercase tracking-[0.25em] text-nissa-gold">04</span>
                    <h3 class="mt-3 text-2xl text-nissa-choco" style="font-family:'Playfair Display', serif;">Laine</h3>
                    <p class="mt-2 text-sm text-gray-500">Une matière chaleureuse et expressive.</p>
                </div>

            </div>

        </div>


        {{-- Savoir-faire séparé --}}
        <div class="mt-20 pt-16 border-t border-[#eee8e3]">

            <div class="grid lg:grid-cols-[0.8fr_1.2fr] gap-14 lg:gap-24 items-center">

                <div>

                    <p class="text-xs uppercase tracking-[0.3em] text-nissa-sauge font-semibold mb-5">
                        Notre savoir-faire
                    </p>

                    <h2
                        class="text-4xl md:text-5xl font-medium text-nissa-choco leading-tight"
                        style="font-family:'Playfair Display', serif;"
                    >
                        Le crochet,
                        <span class="italic text-nissa-sauge">
                            un art à part.
                        </span>
                    </h2>

                    <p class="mt-6 text-gray-600 leading-relaxed">
                        Au-delà des matières, NISSA maîtrise des techniques
                        artisanales qui donnent à chaque pièce
                        une dimension unique et singulière.
                    </p>

                </div>


                <div class="bg-white rounded-2xl p-8 border border-[#eee8e3]">

                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 rounded-full bg-nissa-sauge/10 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-nissa-sauge" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                            </svg>
                        </div>
                        <span class="text-xs uppercase tracking-[0.25em] text-nissa-sauge font-semibold">
                            Fait main
                        </span>
                    </div>

                    <h3
                        class="text-3xl text-nissa-choco"
                        style="font-family:'Playfair Display', serif;"
                    >
                        Crochet
                    </h3>

                    <p class="mt-4 text-gray-600 leading-relaxed">
                        Des créations entièrement réalisées à la main,
                        maille après maille. Le crochet donne à chaque pièce
                        une dimension artisanale et singulière
                        qu'aucune machine ne peut reproduire.
                    </p>

                    <div class="mt-6 pt-6 border-t border-[#eee8e3] flex items-center gap-3 text-sm text-gray-500">
                        <svg class="w-5 h-5 text-nissa-sauge" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Plusieurs heures de travail par pièce</span>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


    {{-- =========================================================
     NOS VALEURS
========================================================= --}}
    <section class="bg-white py-20 md:py-28">

        <div class="max-w-6xl mx-auto px-5 sm:px-8">

            <div class="max-w-2xl mb-14">

                <p class="text-xs uppercase tracking-[0.3em] text-nissa-rose font-semibold mb-5">
                    Nos valeurs
                </p>

                <h2 class="text-4xl md:text-5xl font-medium text-nissa-choco"
                    style="font-family:'Playfair Display', serif;">
                    Ce qui guide NISSA
                </h2>

                <p class="mt-5 text-gray-500 leading-relaxed">
                    Plus qu'une esthétique, NISSA repose sur des valeurs
                    qui accompagnent chaque étape de son évolution.
                </p>

            </div>


            <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-4">

                <div class="p-6 rounded-2xl bg-[#FBF8F3]">
                    <span class="text-nissa-rose text-sm">01</span>

                    <h3 class="mt-4 text-xl text-nissa-choco" style="font-family:'Playfair Display', serif;">
                        Créativité
                    </h3>

                    <p class="mt-3 text-sm text-gray-500 leading-relaxed">
                        Imaginer et expérimenter sans cesse.
                    </p>
                </div>


                <div class="p-6 rounded-2xl bg-[#FBF8F3]">
                    <span class="text-nissa-gold text-sm">02</span>

                    <h3 class="mt-4 text-xl text-nissa-choco" style="font-family:'Playfair Display', serif;">
                        Authenticité
                    </h3>

                    <p class="mt-3 text-sm text-gray-500 leading-relaxed">
                        Créer avec sincérité et rester fidèle à notre identité.
                    </p>
                </div>


                <div class="p-6 rounded-2xl bg-[#FBF8F3]">
                    <span class="text-nissa-rose text-sm">03</span>

                    <h3 class="mt-4 text-xl text-nissa-choco" style="font-family:'Playfair Display', serif;">
                        Élégance
                    </h3>

                    <p class="mt-3 text-sm text-gray-500 leading-relaxed">
                        Accorder de l'importance aux détails.
                    </p>
                </div>


                <div class="p-6 rounded-2xl bg-[#FBF8F3]">
                    <span class="text-nissa-sauge text-sm">04</span>

                    <h3 class="mt-4 text-xl text-nissa-choco" style="font-family:'Playfair Display', serif;">
                        Accessibilité
                    </h3>

                    <p class="mt-3 text-sm text-gray-500 leading-relaxed">
                        Proposer un univers qui reste accessible.
                    </p>
                </div>


                <div class="p-6 rounded-2xl bg-[#FBF8F3]">
                    <span class="text-nissa-gold text-sm">05</span>

                    <h3 class="mt-4 text-xl text-nissa-choco" style="font-family:'Playfair Display', serif;">
                        Évolution
                    </h3>

                    <p class="mt-3 text-sm text-gray-500 leading-relaxed">
                        Grandir, apprendre et faire évoluer la marque.
                    </p>
                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
     VISION
========================================================= --}}
    <section class="relative overflow-hidden bg-nissa-choco text-white py-20 md:py-28">

        <div class="absolute -top-40 -right-40 w-[30rem] h-[30rem]
               rounded-full bg-nissa-rose/10 blur-3xl">
        </div>

        <div
            class="absolute -bottom-40 -left-40 w-[30rem] h-[30rem]
               rounded-full bg-nissa-gold/10 blur-3xl">
        </div>


        <div class="relative max-w-4xl mx-auto px-5 text-center">

            <p class="text-xs uppercase tracking-[0.35em] text-nissa-rose font-semibold mb-6">
                Notre vision
            </p>

            <h2 class="text-4xl md:text-6xl font-medium leading-tight" style="font-family:'Playfair Display', serif;">
                Construire une marque qui
                <span class="italic text-nissa-rose">
                    évolue avec vous.
                </span>
            </h2>

            <p class="mt-8 text-white/70 text-lg leading-relaxed max-w-2xl mx-auto">
                Aujourd'hui, NISSA développe principalement un univers féminin.
                Demain, la marque pourra explorer de nouveaux univers,
                de nouvelles collections et de nouvelles façons de créer,
                tout en conservant l'identité qui lui a donné naissance.
            </p>

            <div class="mt-10">

                <a href="{{ route('boutique') }}"
                    class="inline-flex items-center justify-center gap-3
                       bg-white text-nissa-choco
                       px-7 py-3.5 rounded-full
                       text-sm font-medium
                       hover:bg-nissa-cream transition duration-300">
                    Découvrir la boutique
                    <span>→</span>
                </a>

            </div>

        </div>

    </section>


    {{-- =========================================================
     CONTACT / PARLONS DE NISSA
========================================================= --}}
    <section class="bg-white py-20 md:py-24">

        <div class="max-w-5xl mx-auto px-5 sm:px-8">

            <div class="bg-[#FBF8F3] rounded-[2rem] p-8 md:p-14">

                <div class="grid md:grid-cols-2 gap-12 items-center">

                    {{-- Texte --}}
                    <div>

                        <p class="text-xs uppercase tracking-[0.3em] text-nissa-rose font-semibold mb-5">
                            Une question ?
                        </p>

                        <h2 class="text-4xl md:text-5xl font-medium text-nissa-choco leading-tight"
                            style="font-family:'Playfair Display', serif;">
                            Parlons de
                            <span class="italic text-nissa-rose">
                                NISSA.
                            </span>
                        </h2>

                        <p class="mt-6 text-gray-600 leading-relaxed">
                            Une question sur une création, une commande,
                            une personnalisation ou simplement envie
                            d'en savoir plus ?
                        </p>

                    </div>


                    {{-- Contacts --}}
                    <div class="space-y-4">

                        {{-- WhatsApp --}}
                        <a href="https://wa.me/2290191309710" target="_blank" rel="noopener noreferrer"
                            class="group flex items-center gap-5 bg-white
                               rounded-2xl p-5 border border-[#eee8e3]
                               hover:shadow-md transition duration-300">

                            <div
                                class="w-12 h-12 rounded-full bg-nissa-rose/10
                                   flex items-center justify-center shrink-0">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-nissa-rose" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M8.5 10.5c.7 1.4 1.6 2.3 3 3l1-.9c.2-.2.5-.2.8-.1l1.6.7c.3.1.5.4.4.7-.2 1-1 1.7-2 1.7-3.9 0-7-3.1-7-7 0-1 .7-1.8 1.7-2 .3-.1.6.1.7.4l.7 1.6c.1.3.1.6-.1.8l-.8 1.1z" />

                                </svg>

                            </div>

                            <div class="flex-1">

                                <p class="text-xs uppercase tracking-[0.2em] text-gray-400">
                                    WhatsApp
                                </p>

                                <p class="mt-1 text-nissa-choco font-medium">
                                    Nous contacter
                                </p>

                            </div>

                            <span class="text-nissa-choco group-hover:translate-x-1 transition">
                                →
                            </span>

                        </a>


                        {{-- Email --}}
                        <a href="mailto:nissa.accessoires@gmail.com"
                            class="group flex items-center gap-5 bg-white
                               rounded-2xl p-5 border border-[#eee8e3]
                               hover:shadow-md transition duration-300">

                            <div
                                class="w-12 h-12 rounded-full bg-nissa-gold/10
                                   flex items-center justify-center shrink-0">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-nissa-gold" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3 6.75A2.25 2.25 0 015.25 4.5h13.5A2.25 2.25 0 0121 6.75v10.5a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 17.25V6.75z" />

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3.5 6l8.5 7 8.5-7" />

                                </svg>

                            </div>

                            <div class="flex-1">

                                <p class="text-xs uppercase tracking-[0.2em] text-gray-400">
                                    Email
                                </p>

                                <p class="mt-1 text-nissa-choco font-medium break-all">
                                    nissa.accessoires@gmail.com
                                </p>

                            </div>

                            <span class="text-nissa-choco group-hover:translate-x-1 transition">
                                →
                            </span>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
