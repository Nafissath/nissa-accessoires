@extends('layouts.principal')

@section('content')
    {{-- OUVERTURE : Citation --}}
    <section class="bg-nissa-choco text-white py-20 overflow-hidden relative">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-nissa-rose/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-nissa-gold/10 rounded-full blur-3xl"></div>

        <div class="relative max-w-4xl mx-auto px-4 text-center">
            <p class="text-2xl md:text-4xl italic leading-relaxed font-light text-white/95"
                style="font-family: 'Playfair Display', serif;">
                « Derrière chaque création, il y a une passion, un savoir-faire
                et une vision : célébrer la femme africaine moderne. »
            </p>

            <div class="mt-10 flex items-center justify-center gap-4">
                <span class="h-px w-16 bg-nissa-rose/60"></span>
                <span class="text-sm uppercase tracking-[0.3em] text-nissa-rose">Nafissath, fondatrice</span>
                <span class="h-px w-16 bg-nissa-rose/60"></span>
            </div>
        </div>
    </section>

    {{-- SECTION 1 : Notre histoire --}}
    <section class="py-20 bg-white">
        <div class="max-w-5xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-start">

                <div>
                    <span
                        class="inline-block px-4 py-1 bg-nissa-rose/10 text-nissa-rose text-sm font-semibold uppercase tracking-wider rounded-full mb-5">
                        Notre histoire
                    </span>
                    <h2 class="text-4xl md:text-5xl font-bold mb-6 text-nissa-choco leading-tight"
                        style="font-family: 'Playfair Display', serif;">
                        Nissa Accessoires
                    </h2>
                    <p class="text-lg italic text-nissa-rose mb-4" style="font-family: 'Playfair Display', serif;">
                        Une histoire née d'une envie de créer
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Nissa Accessoires est née d'une passion pour les belles choses, la création et les petits détails qui peuvent transformer une tenue et révéler une personnalité.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Au départ, l'idée était simple : créer des accessoires à la fois jolis, utiles et accessibles, avec une attention particulière portée aux matières, aux couleurs et aux finitions.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        C'est ainsi que Nissa a commencé autour des chouchous, notamment en satin, soie, velours, laine et autres matières, avant de s'ouvrir progressivement à l'univers du crochet et de la création artisanale : sacs, trousses et autres pièces réalisées avec soin.
                    </p>
                </div>

                <div class="relative pl-8 border-l-2 border-nissa-rose/30 space-y-10">
                    <div class="relative">
                        <span
                            class="absolute -left-[41px] w-5 h-5 rounded-full bg-nissa-rose border-4 border-white shadow"></span>
                        <p class="text-sm font-bold text-nissa-rose uppercase tracking-wider mb-1">2025 - La naissance</p>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Nissa voit le jour avec une première collection de chouchous en satin, soie, velours et laine, pensés pour protéger les cheveux naturels avec élégance.
                        </p>
                    </div>
                    <div class="relative">
                        <span
                            class="absolute -left-[41px] w-5 h-5 rounded-full bg-nissa-gold border-4 border-white shadow"></span>
                        <p class="text-sm font-bold text-nissa-gold uppercase tracking-wider mb-1">2025 - L'atelier crochet</p>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Lancement des sacs et trousses au crochet, pièces uniques faites main qui révèlent le savoir-faire artisanal béninois.
                        </p>
                    </div>
                    <div class="relative">
                        <span
                            class="absolute -left-[41px] w-5 h-5 rounded-full bg-nissa-sauge border-4 border-white shadow"></span>
                        <p class="text-sm font-bold text-nissa-sauge uppercase tracking-wider mb-1">Demain - Votre histoire</p>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Nissa peut grandir avec le temps, au-delà de ses premières créations, et accueillir de nouveaux univers.
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-12 max-w-3xl mx-auto text-center">
                <p class="text-gray-600 italic text-lg">
                    Mais Nissa n'est pas pensée comme une simple boutique d'accessoires.
                </p>
                <p class="text-2xl font-semibold text-nissa-rose mt-3" style="font-family: 'Playfair Display', serif;">
                    Chaque création est une manière d'exprimer son style.
                </p>
            </div>
        </div>
    </section>

    {{-- SECTION 2 : Pourquoi Nissa ? --}}
    <section class="py-20 bg-[#FBF8F3]">
        <div class="max-w-4xl mx-auto px-4">
            <div class="text-center mb-12">
                <span
                    class="inline-block px-4 py-1 bg-nissa-rose/10 text-nissa-rose text-sm font-semibold uppercase tracking-wider rounded-full mb-5">
                    L'origine du nom
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-nissa-choco" style="font-family: 'Playfair Display', serif;">
                    Pourquoi « <span class="italic text-nissa-rose">Nissa</span> » ?
                </h2>
            </div>

            <div class="space-y-5 text-gray-700 leading-relaxed">
                <p class="text-lg">
                    Le nom <strong class="text-nissa-choco">Nissa</strong> vient de l'arabe et signifie <em class="text-nissa-rose font-semibold">« femmes »</em>. C'est cette inspiration qui a donné naissance à l'univers initial de la marque : un univers tourné vers la femme, son élégance, sa créativité et sa manière de s'affirmer.
                </p>
                <p>
                    Mais au-delà de sa signification, Nissa représente une <strong class="text-nissa-choco">identité</strong>.
                </p>
                <p>
                    Une identité qui évolue, qui expérimente, qui crée et qui laisse à chacun la possibilité de trouver quelque chose qui lui ressemble.
                </p>
                <p class="italic text-nissa-choco font-medium text-lg pt-4 border-t border-nissa-rose/20">
                    C'est pourquoi Nissa peut grandir avec le temps, au-delà de ses premières créations.
                </p>
            </div>
        </div>
    </section>

    {{-- SECTION 3 : Plus que des accessoires --}}
    <section class="py-20 bg-white">
        <div class="max-w-5xl mx-auto px-4">
            <div class="text-center mb-12">
                <span
                    class="inline-block px-4 py-1 bg-nissa-rose/10 text-nissa-rose text-sm font-semibold uppercase tracking-wider rounded-full mb-5">
                    Notre philosophie
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-nissa-choco" style="font-family: 'Playfair Display', serif;">
                    Plus que des <span class="italic text-nissa-rose">accessoires</span>
                </h2>
            </div>

            <div class="grid md:grid-cols-2 gap-10 items-center">
                <div class="space-y-4 text-gray-700 leading-relaxed">
                    <p>
                        Chez Nissa, nous pensons qu'un accessoire peut être bien plus qu'un simple détail.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-nissa-rose mt-2 shrink-0"></span>
                            <span>Un <strong>chouchou</strong> peut accompagner une coiffure au quotidien.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-nissa-rose mt-2 shrink-0"></span>
                            <span>Un <strong>sac</strong> peut devenir une pièce qui affirme un style.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-nissa-rose mt-2 shrink-0"></span>
                            <span>Une <strong>création au crochet</strong> peut apporter une touche personnelle à une tenue.</span>
                        </li>
                    </ul>
                    <p class="pt-2">
                        Nous voulons créer des pièces que l'on a envie de porter, d'utiliser, d'offrir et de garder.
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gradient-to-br from-nissa-cream to-white rounded-2xl p-6 text-center border border-[#eee8e3] hover:shadow-md transition">
                        <div class="text-3xl mb-2">✨</div>
                        <p class="font-semibold text-nissa-choco">Beauté</p>
                    </div>
                    <div class="bg-gradient-to-br from-nissa-cream to-white rounded-2xl p-6 text-center border border-[#eee8e3] hover:shadow-md transition">
                        <div class="text-3xl mb-2">🧶</div>
                        <p class="font-semibold text-nissa-choco">Créativité</p>
                    </div>
                    <div class="bg-gradient-to-br from-nissa-cream to-white rounded-2xl p-6 text-center border border-[#eee8e3] hover:shadow-md transition">
                        <div class="text-3xl mb-2">🤍</div>
                        <p class="font-semibold text-nissa-choco">Simplicité</p>
                    </div>
                    <div class="bg-gradient-to-br from-nissa-cream to-white rounded-2xl p-6 text-center border border-[#eee8e3] hover:shadow-md transition">
                        <div class="text-3xl mb-2">✦</div>
                        <p class="font-semibold text-nissa-choco">Personnalité</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 4 : Notre savoir-faire --}}
    <section class="py-20 bg-[#FBF8F3]">
        <div class="max-w-4xl mx-auto px-4">
            <div class="flex items-center gap-4 mb-8">
                <span class="w-12 h-12 rounded-full bg-nissa-rose/10 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-nissa-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485" />
                    </svg>
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-nissa-choco" style="font-family: 'Playfair Display', serif;">
                    Notre savoir-faire
                </h2>
            </div>

            <div class="space-y-4 text-gray-700 leading-relaxed pl-0 md:pl-16">
                <p>
                    Une partie de l'identité de Nissa repose sur la <strong class="text-nissa-choco">création artisanale</strong>.
                </p>
                <p>
                    Les créations au crochet sont réalisées avec attention, tandis que les accessoires textiles sont sélectionnés et pensés autour des matières, des couleurs et des usages.
                </p>
                <p>
                    Nous accordons de l'importance aux détails parce que nous croyons qu'une belle création ne dépend pas seulement de son apparence.
                </p>
                <p class="italic text-nissa-choco font-medium text-lg pt-4 border-t border-nissa-rose/20">
                    Elle se ressent aussi dans sa finition.
                </p>
                <p class="text-sm text-gray-500 italic">
                    Cette importance accordée au savoir-faire et au processus de création est une approche que l'on retrouve chez plusieurs marques artisanales qui racontent leur identité à travers leurs techniques et leurs matières.
                </p>
            </div>
        </div>
    </section>

    {{-- SECTION 5 : Nos valeurs --}}
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-nissa-choco mb-12 text-center"
                style="font-family: 'Playfair Display', serif;">
                Nos <span class="italic text-nissa-rose">valeurs</span>
            </h2>

            <div class="divide-y divide-[#eee8e3]">
                <div class="flex items-start gap-6 py-8">
                    <span class="text-5xl font-bold text-nissa-rose/30 shrink-0"
                        style="font-family: 'Playfair Display', serif;">01</span>
                    <div>
                        <h3 class="text-2xl font-bold text-nissa-choco mb-2"
                            style="font-family: 'Playfair Display', serif;">Créativité</h3>
                        <p class="text-gray-600 leading-relaxed">Nous aimons imaginer, expérimenter et créer des pièces qui sortent de l'ordinaire.</p>
                    </div>
                </div>
                <div class="flex items-start gap-6 py-8">
                    <span class="text-5xl font-bold text-nissa-gold/40 shrink-0"
                        style="font-family: 'Playfair Display', serif;">02</span>
                    <div>
                        <h3 class="text-2xl font-bold text-nissa-choco mb-2"
                            style="font-family: 'Playfair Display', serif;">Authenticité</h3>
                        <p class="text-gray-600 leading-relaxed">Nous voulons que Nissa conserve son caractère humain et artisanal. Chaque création doit avoir une intention.</p>
                    </div>
                </div>
                <div class="flex items-start gap-6 py-8">
                    <span class="text-5xl font-bold text-nissa-sauge/40 shrink-0"
                        style="font-family: 'Playfair Display', serif;">03</span>
                    <div>
                        <h3 class="text-2xl font-bold text-nissa-choco mb-2"
                            style="font-family: 'Playfair Display', serif;">Élégance</h3>
                        <p class="text-gray-600 leading-relaxed">Nous recherchons une beauté simple, soignée et intemporelle plutôt qu'une accumulation de détails.</p>
                    </div>
                </div>
                <div class="flex items-start gap-6 py-8">
                    <span class="text-5xl font-bold text-nissa-rose/30 shrink-0"
                        style="font-family: 'Playfair Display', serif;">04</span>
                    <div>
                        <h3 class="text-2xl font-bold text-nissa-choco mb-2"
                            style="font-family: 'Playfair Display', serif;">Accessibilité</h3>
                        <p class="text-gray-600 leading-relaxed">Nous voulons permettre à différentes personnes de se faire plaisir avec des créations originales sans que l'élégance soit inaccessible.</p>
                    </div>
                </div>
                <div class="flex items-start gap-6 py-8">
                    <span class="text-5xl font-bold text-nissa-choco/30 shrink-0"
                        style="font-family: 'Playfair Display', serif;">05</span>
                    <div>
                        <h3 class="text-2xl font-bold text-nissa-choco mb-2"
                            style="font-family: 'Playfair Display', serif;">Évolution</h3>
                        <p class="text-gray-600 leading-relaxed">Nissa est une marque qui a vocation à grandir. Nos premières créations ne définissent pas nécessairement tout ce que nous serons demain.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 6 : Notre vision --}}
    <section class="py-16 bg-gradient-to-br from-nissa-choco to-[#6B4423] text-white">
        <div class="max-w-4xl mx-auto px-4">
            <div class="text-center mb-8">
                <span class="inline-block text-xs font-semibold uppercase tracking-[0.3em] text-nissa-rose mb-4">
                    Notre vision
                </span>
                <h2 class="text-3xl md:text-4xl font-bold italic text-white/95" style="font-family: 'Playfair Display', serif;">
                    Commencer petit, créer avec intention<br>et évoluer avec le temps.
                </h2>
            </div>

            <div class="space-y-4 text-white/90 leading-relaxed text-center max-w-3xl mx-auto">
                <p>
                    Nissa Accessoires commence son histoire avec les accessoires et l'artisanat, mais nous voulons laisser la porte ouverte à de nouvelles créations, de nouvelles matières et de nouvelles collections.
                </p>
                <p>
                    Aujourd'hui, notre univers s'adresse principalement aux <strong class="text-nissa-rose">femmes</strong>.
                </p>
                <p>
                    Demain, Nissa pourra évoluer vers d'autres univers et accueillir de nouvelles collections, notamment pour les <strong class="text-nissa-rose">hommes</strong>, sans perdre l'identité qui a donné naissance à la marque.
                </p>
                <p class="text-xl text-white font-semibold pt-6 border-t border-white/20 italic" style="font-family: 'Playfair Display', serif;">
                    Parce qu'une marque peut évoluer sans oublier d'où elle vient.
                </p>
            </div>
        </div>
    </section>

    {{-- SECTION 7 : Témoignages --}}
    <section class="py-20 bg-[#FBF8F3]">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-14">
                <span class="inline-block text-xs font-semibold uppercase tracking-[0.3em] text-nissa-rose mb-4">
                    Témoignages
                </span>
                <h2 class="text-4xl font-bold text-nissa-choco" style="font-family: 'Playfair Display', serif;">
                    Ce qu'elles en disent
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-3xl shadow-sm">
                    <div class="flex gap-1 mb-4">
                        @for ($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-nissa-gold" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                    <p class="text-gray-700 mb-6 italic leading-relaxed">
                        "Les chouchous Nissa sont incroyables ! Mes cheveux n'ont jamais été aussi bien protégés. Je recommande à 100%."
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-nissa-rose/20 rounded-full flex items-center justify-center text-nissa-rose font-bold">A</div>
                        <div>
                            <p class="font-semibold text-nissa-choco">Aïcha K.</p>
                            <p class="text-sm text-gray-500">Cliente depuis 2025</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm">
                    <div class="flex gap-1 mb-4">
                        @for ($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-nissa-gold" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                    <p class="text-gray-700 mb-6 italic leading-relaxed">
                        "Le sac crochet est magnifique ! On voit la qualité du travail artisanal. Je reçois toujours des compliments quand je le porte."
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-nissa-sauge/20 rounded-full flex items-center justify-center text-nissa-sauge font-bold">F</div>
                        <div>
                            <p class="font-semibold text-nissa-choco">Fatou D.</p>
                            <p class="text-sm text-gray-500">Cliente depuis 2025</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm">
                    <div class="flex gap-1 mb-4">
                        @for ($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-nissa-gold" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                    <p class="text-gray-700 mb-6 italic leading-relaxed">
                        "Service client au top et livraison rapide. J'ai commandé un pack cadeau pour ma sœur, elle était ravie !"
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-nissa-gold/20 rounded-full flex items-center justify-center text-nissa-gold font-bold">M</div>
                        <div>
                            <p class="font-semibold text-nissa-choco">Marie T.</p>
                            <p class="text-sm text-gray-500">Cliente depuis 2025</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 8 : Contact --}}
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-6 text-nissa-choco" style="font-family: 'Playfair Display', serif;">
                Une question ? <span class="italic text-nissa-rose">Écrivez-nous</span>
            </h2>
            <p class="text-gray-600 mb-8 text-lg">
                Nous sommes à votre écoute pour toute question, demande personnalisée ou collaboration.
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="https://wa.me/2290191309710" target="_blank"
                    class="inline-flex items-center gap-2 bg-white border-2 border-green-600 text-green-700 hover:bg-green-600 hover:text-white px-8 py-4 rounded-full font-medium transition shadow-lg">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                    </svg>
                    WhatsApp
                </a>

                <a href="mailto:nissa.accessoires@gmail.com"
                    class="inline-flex items-center gap-2 bg-nissa-choco text-white px-8 py-4 rounded-full font-medium hover:opacity-90 transition shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Email
                </a>
            </div>
        </div>
    </section>
@endsection