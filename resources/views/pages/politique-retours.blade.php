@extends('pages._layout-legal')

@section('page-header')
    <div class="text-center mb-12">
        <span class="inline-flex items-center gap-3
                     text-[11px] uppercase tracking-[0.35em]
                     text-nissa-rose font-medium">
            <span class="w-8 h-px bg-nissa-rose"></span>
            Retours
            <span class="w-8 h-px bg-nissa-rose"></span>
        </span>

        <h1 class="mt-6 text-4xl md:text-5xl text-nissa-choco leading-tight"
            style="font-family:'Playfair Display', serif;">
            Politique de
            <span class="italic text-nissa-rose">retours</span>
        </h1>

        <p class="mt-6 text-gray-600 leading-relaxed max-w-2xl mx-auto">
            Votre satisfaction est notre priorité. Découvrez comment
            retourner ou échanger vos articles.
        </p>
    </div>
@endsection

@section('legal-content')

    {{-- =====================================================
         1. DÉLAI DE RÉTRACTATION
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span class="shrink-0 w-10 h-10 rounded-full bg-nissa-rose/10 flex items-center justify-center text-nissa-rose font-semibold text-sm">
                    01
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;">
                    Délai de rétractation
                </h2>
            </div>
            <p class="text-gray-600 leading-relaxed">
                Vous disposez d'un délai de <strong class="text-nissa-choco">7 jours</strong>
                à compter de la réception de votre commande pour demander un retour
                ou un échange, sans avoir à justifier de motifs ni à payer de pénalité.
            </p>
        </div>
    </div>


    {{-- =====================================================
         2. CONDITIONS DE RETOUR
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span class="shrink-0 w-10 h-10 rounded-full bg-nissa-gold/10 flex items-center justify-center text-nissa-gold font-semibold text-sm">
                    02
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;">
                    Conditions de retour
                </h2>
            </div>
            <p class="text-gray-600 leading-relaxed mb-4">
                Pour être accepté, le produit retourné doit :
            </p>
            <ul class="space-y-2 text-gray-600">
                <li class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-nissa-gold shrink-0"></span>
                    Être dans son état d'origine (non porté, non lavé, non utilisé)
                </li>
                <li class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-nissa-gold shrink-0"></span>
                    Être accompagné de son emballage d'origine
                </li>
                <li class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-nissa-gold shrink-0"></span>
                    Être accompagné de la facture ou du numéro de commande
                </li>
            </ul>
        </div>
    </div>


    {{-- =====================================================
         3. PRODUITS NON RETOURNABLES
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span class="shrink-0 w-10 h-10 rounded-full bg-nissa-sauge/10 flex items-center justify-center text-nissa-sauge font-semibold text-sm">
                    03
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;">
                    Produits non retournables
                </h2>
            </div>
            <p class="text-gray-600 leading-relaxed mb-4">
                Certains produits ne peuvent pas être retournés pour des raisons
                d'<strong class="text-nissa-choco">hygiène</strong> ou de
                <strong class="text-nissa-choco">personnalisation</strong> :
            </p>
            <ul class="space-y-2 text-gray-600">
                <li class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-nissa-sauge shrink-0"></span>
                    Chouchous et accessoires pour cheveux (raisons d'hygiène)
                </li>
                <li class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-nissa-sauge shrink-0"></span>
                    Créations personnalisées sur demande (couleurs spécifiques, tailles sur mesure)
                </li>
                <li class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-nissa-sauge shrink-0"></span>
                    Packs cadeaux ouverts ou dont le contenu a été séparé
                </li>
            </ul>
        </div>
    </div>


    {{-- =====================================================
         4. PROCÉDURE DE RETOUR
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span class="shrink-0 w-10 h-10 rounded-full bg-nissa-rose/10 flex items-center justify-center text-nissa-rose font-semibold text-sm">
                    04
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;">
                    Procédure de retour
                </h2>
            </div>

            <ol class="space-y-4 text-gray-600">
                <li class="flex gap-4">
                    <span class="shrink-0 w-8 h-8 rounded-full bg-nissa-rose/10 text-nissa-rose font-semibold flex items-center justify-center text-sm">1</span>
                    <p>Contactez-nous par <strong class="text-nissa-choco">WhatsApp</strong> ou par <strong class="text-nissa-choco">email</strong> avec votre numéro de commande</p>
                </li>
                <li class="flex gap-4">
                    <span class="shrink-0 w-8 h-8 rounded-full bg-nissa-rose/10 text-nissa-rose font-semibold flex items-center justify-center text-sm">2</span>
                    <p>Nous vous fournirons les instructions de retour détaillées</p>
                </li>
                <li class="flex gap-4">
                    <span class="shrink-0 w-8 h-8 rounded-full bg-nissa-rose/10 text-nissa-rose font-semibold flex items-center justify-center text-sm">3</span>
                    <p>Renvoyez le produit à l'adresse indiquée, <strong class="text-nissa-choco">à vos frais</strong></p>
                </li>
                <li class="flex gap-4">
                    <span class="shrink-0 w-8 h-8 rounded-full bg-nissa-rose/10 text-nissa-rose font-semibold flex items-center justify-center text-sm">4</span>
                    <p>Après vérification, nous procéderons au remboursement ou à l'échange</p>
                </li>
            </ol>
        </div>
    </div>


    {{-- =====================================================
         5. REMBOURSEMENT
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span class="shrink-0 w-10 h-10 rounded-full bg-nissa-gold/10 flex items-center justify-center text-nissa-gold font-semibold text-sm">
                    05
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;">
                    Remboursement
                </h2>
            </div>
            <p class="text-gray-600 leading-relaxed mb-3">
                Le remboursement sera effectué dans un délai de
                <strong class="text-nissa-choco">5 à 7 jours ouvrés</strong>
                après réception et vérification du produit retourné,
                via le même moyen de paiement que celui utilisé pour l'achat initial
                (Mobile Money ou carte bancaire).
            </p>
            <p class="text-gray-600 leading-relaxed">
                Les frais de retour restent à la charge du client,
                sauf dans le cas d'un produit défectueux ou non conforme.
            </p>
        </div>
    </div>


    {{-- =====================================================
         6. PRODUIT DÉFECTUEUX
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-nissa-sauge/5 border border-nissa-sauge/20 rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span class="shrink-0 w-10 h-10 rounded-full bg-nissa-sauge/10 flex items-center justify-center text-nissa-sauge font-semibold text-sm">
                    06
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;">
                    Produit défectueux ou non conforme
                </h2>
            </div>
            <p class="text-gray-600 leading-relaxed mb-4">
                Si le produit reçu est défectueux ou non conforme à votre commande :
            </p>
            <ul class="space-y-2 text-gray-600">
                <li class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-nissa-sauge shrink-0"></span>
                    Contactez-nous dans les <strong class="text-nissa-choco">48h</strong> suivant la réception
                </li>
                <li class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-nissa-sauge shrink-0"></span>
                    Envoyez-nous des photos du produit concerné
                </li>
                <li class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-nissa-sauge shrink-0"></span>
                    Nous <strong class="text-nissa-choco">prendrons en charge les frais de retour</strong>
                    et procéderons à un échange ou remboursement
                </li>
            </ul>
        </div>
    </div>


    {{-- =====================================================
         CONTACT
    ====================================================== --}}
    <div class="relative overflow-hidden
                bg-nissa-choco rounded-[2rem]
                px-7 py-10 md:px-12 md:py-12
                text-center">

        <div class="absolute -top-20 -right-20 w-48 h-48 rounded-full bg-nissa-rose/10"></div>
        <div class="absolute -bottom-24 -left-20 w-56 h-56 rounded-full bg-nissa-gold/10"></div>

        <div class="relative">

            <p class="text-xs uppercase tracking-[0.3em] text-nissa-rose font-semibold">
                Besoin d'aide ?
            </p>

            <h2 class="mt-4 text-3xl md:text-4xl text-white"
                style="font-family:'Playfair Display', serif;">
                Contactez
                <span class="italic text-nissa-rose">NISSA</span>
            </h2>

            <p class="mt-4 max-w-xl mx-auto text-white/70 leading-relaxed">
                Une question sur un retour ou un échange ?
                Notre équipe est là pour vous accompagner.
            </p>

            <div class="mt-7 flex flex-col sm:flex-row gap-3 justify-center">
                <a href="https://wa.me/2290191309710"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-white text-nissa-choco rounded-full text-sm font-medium hover:bg-nissa-cream transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    WhatsApp
                </a>

                <a href="mailto:nissa.accessoires@gmail.com"
                    class="inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-nissa-rose text-white rounded-full text-sm font-medium hover:bg-nissa-rose-dark transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Email
                </a>
            </div>

        </div>

    </div>

@endsection