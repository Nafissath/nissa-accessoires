@extends('pages._layout-legal')

@section('page-header')
    {{-- =========================================================
         EN-TÊTE
    ========================================================== --}}
    <div class="text-center mb-12">
        <span class="inline-flex items-center gap-3
                     text-[11px] uppercase tracking-[0.35em]
                     text-nissa-rose font-medium">
            <span class="w-8 h-px bg-nissa-rose"></span>
            CGV
            <span class="w-8 h-px bg-nissa-rose"></span>
        </span>

        <h1 class="mt-6 text-4xl md:text-5xl text-nissa-choco leading-tight"
            style="font-family:'Playfair Display', serif;">
            Conditions générales
            <span class="italic text-nissa-rose">de vente</span>
        </h1>

        <p class="mt-6 text-gray-600 leading-relaxed max-w-2xl mx-auto">
            Les présentes conditions régissent les relations entre
            NISSA et ses clients. Toute commande implique leur acceptation.
        </p>
    </div>
@endsection

@section('legal-content')

    {{-- =====================================================
         ARTICLE 1 - OBJET
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span class="shrink-0 w-10 h-10 rounded-full bg-nissa-rose/10 flex items-center justify-center text-nissa-rose font-semibold text-sm">
                    01
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;">
                    Objet
                </h2>
            </div>
            <p class="text-gray-600 leading-relaxed">
                Les présentes conditions générales de vente régissent les relations
                contractuelles entre Nissa Accessoires et ses clients, les deux parties
                les acceptant sans réserve. Toute commande passée sur le site implique
                l'adhésion pleine et entière aux présentes conditions.
            </p>
        </div>
    </div>


    {{-- =====================================================
         ARTICLE 2 - PRODUITS
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span class="shrink-0 w-10 h-10 rounded-full bg-nissa-gold/10 flex items-center justify-center text-nissa-gold font-semibold text-sm">
                    02
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;">
                    Produits
                </h2>
            </div>
            <p class="text-gray-600 leading-relaxed mb-3">
                Les produits proposés sont des <strong class="text-nissa-choco">créations artisanales faites main</strong>.
                Chaque pièce est unique et peut présenter de légères variations par rapport
                aux photos, ce qui constitue le charme de l'artisanat.
            </p>
            <p class="text-gray-600 leading-relaxed">
                Les photographies sont les plus fidèles possible, mais le rendu des couleurs
                peut varier légèrement selon l'écran utilisé.
            </p>
        </div>
    </div>


    {{-- =====================================================
         ARTICLE 3 - PRIX
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span class="shrink-0 w-10 h-10 rounded-full bg-nissa-sauge/10 flex items-center justify-center text-nissa-sauge font-semibold text-sm">
                    03
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;">
                    Prix
                </h2>
            </div>
            <p class="text-gray-600 leading-relaxed mb-3">
                Les prix sont indiqués en <strong class="text-nissa-choco">Francs CFA (FCFA)</strong>,
                toutes taxes comprises. Nissa Accessoires se réserve le droit de modifier
                ses prix à tout moment, mais les produits seront facturés sur la base
                des tarifs en vigueur au moment de la validation de la commande.
            </p>
            <p class="text-gray-600 leading-relaxed">
                Les frais de livraison, lorsqu'ils s'appliquent, sont communiqués
                avant la validation finale de la commande.
            </p>
        </div>
    </div>


    {{-- =====================================================
         ARTICLE 4 - COMMANDE
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span class="shrink-0 w-10 h-10 rounded-full bg-nissa-rose/10 flex items-center justify-center text-nissa-rose font-semibold text-sm">
                    04
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;">
                    Commande
                </h2>
            </div>
            <p class="text-gray-600 leading-relaxed mb-3">
                La validation de la commande implique l'acceptation des présentes
                conditions générales. La commande est enregistrée
                <strong class="text-nissa-choco">une fois le paiement validé</strong>.
            </p>
            <p class="text-gray-600 leading-relaxed">
                Vous pouvez suivre votre commande à tout moment en nous contactant
                via <strong class="text-nissa-choco">WhatsApp</strong>.
            </p>
        </div>
    </div>


    {{-- =====================================================
         ARTICLE 5 - PAIEMENT
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span class="shrink-0 w-10 h-10 rounded-full bg-nissa-gold/10 flex items-center justify-center text-nissa-gold font-semibold text-sm">
                    05
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;">
                    Paiement
                </h2>
            </div>
            <p class="text-gray-600 leading-relaxed mb-3">
                Le paiement s'effectue via la solution sécurisée
                <strong class="text-nissa-choco">Kkiapay</strong> :
            </p>
            <ul class="space-y-2 text-gray-600 mb-4">
                <li class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-nissa-rose shrink-0"></span>
                    Mobile Money (MTN MoMo, Moov Money)
                </li>
                <li class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-nissa-rose shrink-0"></span>
                    Carte bancaire (Visa, Mastercard)
                </li>
            </ul>
            <p class="text-gray-600 leading-relaxed">
                La commande est considérée comme validée uniquement après confirmation
                du paiement. Aucun montant n'est débité si la transaction échoue.
            </p>
        </div>
    </div>


    {{-- =====================================================
         ARTICLE 6 - LIVRAISON
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span class="shrink-0 w-10 h-10 rounded-full bg-nissa-sauge/10 flex items-center justify-center text-nissa-sauge font-semibold text-sm">
                    06
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;">
                    Livraison
                </h2>
            </div>
            <p class="text-gray-600 leading-relaxed mb-3">
                Les livraisons sont effectuées au <strong class="text-nissa-choco">Bénin</strong>
                (Cotonou et autres villes). Les délais varient de
                <strong class="text-nissa-choco">24 heures à 7 jours</strong> selon la destination.
            </p>
            <p class="text-gray-600 leading-relaxed">
                Les frais de livraison sont communiqués avant validation de la commande.
                Pour le détail des zones et délais, consultez notre
                <a href="{{ route('pages.livraison') }}" class="text-nissa-rose font-semibold hover:underline">page Livraison</a>.
            </p>
        </div>
    </div>


    {{-- =====================================================
         ARTICLE 7 - RETOURS ET REMBOURSEMENTS
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span class="shrink-0 w-10 h-10 rounded-full bg-nissa-rose/10 flex items-center justify-center text-nissa-rose font-semibold text-sm">
                    07
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;">
                    Retours et remboursements
                </h2>
            </div>
            <p class="text-gray-600 leading-relaxed mb-3">
                Vous disposez de <strong class="text-nissa-choco">7 jours</strong> après réception
                pour demander un retour ou un échange, sous conditions
                (article non utilisé, emballage d'origine, parfait état).
            </p>
            <p class="text-gray-600 leading-relaxed">
                Consultez notre
                <a href="{{ route('pages.politique-retours') }}" class="text-nissa-rose font-semibold hover:underline">politique de retours</a>
                pour le détail des conditions et modalités de remboursement.
            </p>
        </div>
    </div>


    {{-- =====================================================
         ARTICLE 8 - RESPONSABILITÉ
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span class="shrink-0 w-10 h-10 rounded-full bg-nissa-gold/10 flex items-center justify-center text-nissa-gold font-semibold text-sm">
                    08
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;">
                    Responsabilité
                </h2>
            </div>
            <p class="text-gray-600 leading-relaxed">
                Nissa Accessoires ne saurait être tenue responsable de l'inexécution
                du contrat conclu en cas de force majeure, de perturbation ou de grève
                totale ou partielle, notamment des services postaux et moyens de transport.
            </p>
        </div>
    </div>


    {{-- =====================================================
         ARTICLE 9 - DONNÉES PERSONNELLES
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span class="shrink-0 w-10 h-10 rounded-full bg-nissa-sauge/10 flex items-center justify-center text-nissa-sauge font-semibold text-sm">
                    09
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;">
                    Données personnelles
                </h2>
            </div>
            <p class="text-gray-600 leading-relaxed mb-3">
                Les informations collectées (nom, adresse, contact) sont utilisées
                uniquement pour le traitement de vos commandes et la livraison.
                Elles ne sont jamais revendues à des tiers.
            </p>
            <p class="text-gray-600 leading-relaxed">
                Pour en savoir plus, consultez notre
                <a href="{{ route('pages.politique-confidentialite') }}" class="text-nissa-rose font-semibold hover:underline">politique de confidentialité</a>.
            </p>
        </div>
    </div>


    {{-- =====================================================
         ARTICLE 10 - DROIT APPLICABLE
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span class="shrink-0 w-10 h-10 rounded-full bg-nissa-rose/10 flex items-center justify-center text-nissa-rose font-semibold text-sm">
                    10
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;">
                    Droit applicable
                </h2>
            </div>
            <p class="text-gray-600 leading-relaxed mb-3">
                Les présentes conditions générales sont soumises au
                <strong class="text-nissa-choco">droit béninois</strong>.
                En cas de litige, une solution amiable sera recherchée en priorité
                via WhatsApp ou email.
            </p>
            <p class="text-gray-600 leading-relaxed">
                À défaut, les tribunaux de Cotonou seront seuls compétents.
            </p>
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
                Une question ?
            </p>

            <h2 class="mt-4 text-3xl md:text-4xl text-white"
                style="font-family:'Playfair Display', serif;">
                Contactez
                <span class="italic text-nissa-rose">NISSA</span>
            </h2>

            <p class="mt-4 max-w-xl mx-auto text-white/70 leading-relaxed">
                Une question sur ces conditions ?
                Notre équipe est là pour vous répondre.
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