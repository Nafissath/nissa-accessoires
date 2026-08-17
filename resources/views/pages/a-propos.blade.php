@extends('layouts.principal')

@section('content')
    {{-- ============================================================
     OUVERTURE : Citation (simple, sans hero)
============================================================= --}}
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

    {{-- ============================================================
     SECTION 1 : Notre histoire (même texte que l'accueil)
============================================================= --}}
    <section class="py-20 bg-white">
        <div class="max-w-5xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-start">

                {{-- Texte histoire (identique à l'accueil) --}}
                <div>
                    <span
                        class="inline-block px-4 py-1 bg-nissa-rose/10 text-nissa-rose text-sm font-semibold uppercase tracking-wider rounded-full mb-5">
                        Notre histoire
                    </span>
                    <h2 class="text-4xl md:text-5xl font-bold mb-6 text-nissa-choco leading-tight"
                        style="font-family: 'Playfair Display', serif;">
                        Nissa, c'est <span class="italic text-nissa-rose">vous</span>
                    </h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        <strong class="text-nissa-choco">Nissa</strong> vient de l'arabe et signifie <em
                            class="text-nissa-rose">"femme"</em>.
                        Ce nom a été choisi pour célébrer chaque femme dans toute sa singularité.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        Nos créations allient <strong class="text-nissa-choco">beauté, soin et originalité</strong>.
                        Des chouchous qui prennent soin de vos cheveux, aux accessoires au crochet
                        qui révèlent votre style unique.
                    </p>
                </div>

                {{-- Timeline (inchangée) --}}
                <div class="relative pl-8 border-l-2 border-nissa-rose/30 space-y-10">
                    <div class="relative">
                        <span
                            class="absolute -left-[41px] w-5 h-5 rounded-full bg-nissa-rose border-4 border-white shadow"></span>
                        <p class="text-sm font-bold text-nissa-rose uppercase tracking-wider mb-1">2025 - La naissance</p>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Nissa voit le jour avec une première collection de chouchous en satin,
                            pensés pour protéger les cheveux naturels.
                        </p>
                    </div>
                    <div class="relative">
                        <span
                            class="absolute -left-[41px] w-5 h-5 rounded-full bg-nissa-gold border-4 border-white shadow"></span>
                        <p class="text-sm font-bold text-nissa-gold uppercase tracking-wider mb-1">2025 - L'atelier crochet
                        </p>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Lancement des sacs et trousses au crochet, pièces uniques faites main
                            qui révèlent le savoir-faire artisanal béninois.
                        </p>
                    </div>
                    <div class="relative">
                        <span
                            class="absolute -left-[41px] w-5 h-5 rounded-full bg-nissa-sauge border-4 border-white shadow"></span>
                        <p class="text-sm font-bold text-nissa-sauge uppercase tracking-wider mb-1">Demain - Votre histoire
                        </p>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Chaque cliente qui porte une création Nissa écrit avec nous
                            la suite de cette belle aventure.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ============================================================
     SECTION 2 : La fondatrice (image à DROITE, inversé)
============================================================= --}}
    <section class="py-20 bg-[#FBF8F3]">
        <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

            {{-- Texte à gauche --}}
            <div class="order-2 md:order-1">
                <span
                    class="inline-block px-4 py-1 bg-nissa-rose/10 text-nissa-rose text-sm font-semibold uppercase tracking-wider rounded-full mb-4">
                    La fondatrice
                </span>
                <h2 class="text-4xl font-bold mb-6 text-nissa-choco" style="font-family: 'Playfair Display', serif;">
                    Une passion née au Bénin
                </h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Nafissath a grandi entourée de femmes créatives. Très tôt, elle développe une passion
                    pour l'artisanat et la mode, observant sa grand-mère tisser et coudre avec amour.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    Aujourd'hui, elle met ce savoir-faire au service de toutes les femmes,
                    avec des créations qui allient beauté, soin et originalité.
                </p>
            </div>

            {{-- Image à droite --}}
            <div class="order-1 md:order-2 relative">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=800&q=90" alt="Fondatrice Nissa"
                    class="rounded-3xl shadow-xl w-full">
                <div class="absolute -bottom-6 -left-6 bg-nissa-rose text-white p-6 rounded-2xl shadow-xl">
                    <p class="text-3xl font-bold" style="font-family: 'Playfair Display', serif;">Nafissath</p>
                    <p class="text-sm">Fondatrice & Créatrice</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
     SECTION 3 : Valeurs (lignes numérotées)
============================================================= --}}
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-nissa-choco mb-12 text-center"
                style="font-family: 'Playfair Display', serif;">
                Ce qui nous <span class="italic text-nissa-rose">anime</span>
            </h2>

            <div class="divide-y divide-[#eee8e3]">
                <div class="flex items-start gap-6 py-8">
                    <span class="text-5xl font-bold text-nissa-rose/30"
                        style="font-family: 'Playfair Display', serif;">01</span>
                    <div>
                        <h3 class="text-2xl font-bold text-nissa-choco mb-2"
                            style="font-family: 'Playfair Display', serif;">Amour du détail</h3>
                        <p class="text-gray-600 leading-relaxed">Chaque couture, chaque point est réalisé avec précision. La
                            beauté réside dans les petits détails.</p>
                    </div>
                </div>
                <div class="flex items-start gap-6 py-8">
                    <span class="text-5xl font-bold text-nissa-rose/30"
                        style="font-family: 'Playfair Display', serif;">02</span>
                    <div>
                        <h3 class="text-2xl font-bold text-nissa-choco mb-2"
                            style="font-family: 'Playfair Display', serif;">Respect des cheveux</h3>
                        <p class="text-gray-600 leading-relaxed">Nos chouchous en satin et soie protègent vos cheveux,
                            réduisent la casse et préservent leur éclat naturel.</p>
                    </div>
                </div>
                <div class="flex items-start gap-6 py-8">
                    <span class="text-5xl font-bold text-nissa-rose/30"
                        style="font-family: 'Playfair Display', serif;">03</span>
                    <div>
                        <h3 class="text-2xl font-bold text-nissa-choco mb-2"
                            style="font-family: 'Playfair Display', serif;">Authenticité</h3>
                        <p class="text-gray-600 leading-relaxed">Nous célébrons l'artisanat africain et mettons en avant le
                            savoir-faire local dans chacune de nos créations.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
     SECTION 4 : Chiffres
============================================================= --}}
    <section class="py-16 bg-gradient-to-br from-nissa-choco to-[#6B4423] text-white">
        <div class="max-w-6xl mx-auto px-4 flex flex-wrap items-center justify-center gap-x-16 gap-y-8 text-center">
            <div>
                <p class="text-5xl font-bold text-nissa-rose" style="font-family: 'Playfair Display', serif;">200+</p>
                <p class="text-white/80 text-sm uppercase tracking-wider mt-1">Clientes satisfaites</p>
            </div>
            <div>
                <p class="text-5xl font-bold text-nissa-rose" style="font-family: 'Playfair Display', serif;">500+</p>
                <p class="text-white/80 text-sm uppercase tracking-wider mt-1">Créations vendues</p>
            </div>
            <div>
                <p class="text-5xl font-bold text-nissa-rose" style="font-family: 'Playfair Display', serif;">100%</p>
                <p class="text-white/80 text-sm uppercase tracking-wider mt-1">Fait main</p>
            </div>
            <div>
                <p class="text-5xl font-bold text-nissa-rose" style="font-family: 'Playfair Display', serif;">4.9★</p>
                <p class="text-white/80 text-sm uppercase tracking-wider mt-1">Satisfaction</p>
            </div>
        </div>
    </section>

    {{-- ============================================================
     SECTION 5 : Témoignages (admin ajoute les vrais avis)
============================================================= --}}
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
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                    <p class="text-gray-700 mb-6 italic leading-relaxed">
                        "Les chouchous Nissa sont incroyables ! Mes cheveux n'ont jamais été aussi bien protégés.
                        Je recommande à 100%."
                    </p>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 bg-nissa-rose/20 rounded-full flex items-center justify-center text-nissa-rose font-bold">
                            A</div>
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
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                    <p class="text-gray-700 mb-6 italic leading-relaxed">
                        "Le sac crochet est magnifique ! On voit la qualité du travail artisanal.
                        Je reçois toujours des compliments quand je le porte."
                    </p>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 bg-nissa-sauge/20 rounded-full flex items-center justify-center text-nissa-sauge font-bold">
                            F</div>
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
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                    <p class="text-gray-700 mb-6 italic leading-relaxed">
                        "Service client au top et livraison rapide.
                        J'ai commandé un pack cadeau pour ma sœur, elle était ravie !"
                    </p>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 bg-nissa-gold/20 rounded-full flex items-center justify-center text-nissa-gold font-bold">
                            M</div>
                        <div>
                            <p class="font-semibold text-nissa-choco">Marie T.</p>
                            <p class="text-sm text-gray-500">Cliente depuis 2025</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
     SECTION 6 : Contact
============================================================= --}}
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
                    class="inline-flex items-center gap-2 bg-white border-2 border-green-600 text-green-700 hover:bg-green-600 hover:text-white text-center  px-8 py-4 rounded-full font-medium transition shadow-lg">
                    WhatsApp
                </a>                

                <a href="mailto:nissaisma292@.com"
                    class="inline-flex items-center gap-2 bg-nissa-choco text-white px-8 py-4 rounded-full font-medium hover:opacity-90 transition shadow-lg">
                    Email
                </a>
            </div>
        </div>
    </section>
@endsection
