@extends('layouts.principal')

@section('content')

{{-- =========================================================
     FAQ
========================================================= --}}
<section class="bg-[#FCFAF8] py-20 md:py-28">

    <div class="max-w-4xl mx-auto px-5 sm:px-8">

        {{-- =====================================================
             EN-TÊTE
        ====================================================== --}}
        <div class="text-center max-w-2xl mx-auto mb-14 md:mb-16">

            <span class="inline-flex items-center gap-3
                         text-[11px] uppercase tracking-[0.35em]
                         text-nissa-rose font-medium">

                <span class="w-8 h-px bg-nissa-rose"></span>

                FAQ

                <span class="w-8 h-px bg-nissa-rose"></span>

            </span>

            <h1
                class="mt-6 text-5xl md:text-6xl
                       text-nissa-choco leading-tight"
                style="font-family:'Playfair Display', serif;"
            >
                Questions
                <span class="italic text-nissa-rose">
                    fréquentes.
                </span>
            </h1>

            <p class="mt-6 text-gray-600 leading-relaxed">
                Retrouvez ici les réponses aux questions les plus
                fréquentes concernant vos commandes, nos créations,
                les paiements et la livraison.
            </p>

        </div>


        {{-- =====================================================
             FILTRES DE NAVIGATION
        ====================================================== --}}
        <div class="flex flex-wrap gap-2 justify-center mb-14 sticky top-20 z-30 bg-[#FCFAF8] py-4">
            <a href="#commandes" class="px-4 py-2 rounded-full bg-white border border-[#eee8e3] text-sm font-medium text-nissa-choco hover:bg-nissa-rose hover:text-white hover:border-nissa-rose transition shadow-sm">
                Commandes
            </a>
            <a href="#paiement" class="px-4 py-2 rounded-full bg-white border border-[#eee8e3] text-sm font-medium text-nissa-choco hover:bg-nissa-gold hover:text-white hover:border-nissa-gold transition shadow-sm">
                Paiement
            </a>
            <a href="#livraison" class="px-4 py-2 rounded-full bg-white border border-[#eee8e3] text-sm font-medium text-nissa-choco hover:bg-nissa-rose hover:text-white hover:border-nissa-rose transition shadow-sm">
                Livraison
            </a>
            <a href="#produits" class="px-4 py-2 rounded-full bg-white border border-[#eee8e3] text-sm font-medium text-nissa-choco hover:bg-nissa-sauge hover:text-white hover:border-nissa-sauge transition shadow-sm">
                Produits
            </a>
            <a href="#packs" class="px-4 py-2 rounded-full bg-white border border-[#eee8e3] text-sm font-medium text-nissa-choco hover:bg-nissa-gold hover:text-white hover:border-nissa-gold transition shadow-sm">
                Packs
            </a>
            <a href="#retours" class="px-4 py-2 rounded-full bg-white border border-[#eee8e3] text-sm font-medium text-nissa-choco hover:bg-nissa-rose hover:text-white hover:border-nissa-rose transition shadow-sm">
                Retours
            </a>
            <a href="#autres" class="px-4 py-2 rounded-full bg-white border border-[#eee8e3] text-sm font-medium text-nissa-choco hover:bg-nissa-sauge hover:text-white hover:border-nissa-sauge transition shadow-sm">
                Autres
            </a>
        </div>


        {{-- =====================================================
             01 - COMMANDES
        ====================================================== --}}
        <div id="commandes" class="mb-12 scroll-mt-32">

            <div class="flex items-center gap-4 mb-5">

                <span class="text-[11px] uppercase tracking-[0.3em]
                             text-nissa-rose font-semibold">
                    01
                </span>

                <h2
                    class="text-2xl md:text-3xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;"
                >
                    Commandes
                </h2>

                <span class="flex-1 h-px bg-[#E9DED4]"></span>

            </div>


            <div class="space-y-3">

                {{-- Question 1 : Comment passer une commande --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Comment passer une commande ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-rose/10
                                   flex items-center justify-center
                                   text-nissa-rose text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            C'est très simple :
                        </p>

                        <ol class="list-decimal list-inside space-y-2 text-gray-600 leading-relaxed">
                            <li>Parcourez notre boutique et ajoutez vos articles au panier</li>
                            <li>Choisissez les variantes disponibles (couleur, taille, matière) si nécessaire</li>
                            <li>Cliquez sur l'icône panier en haut à droite</li>
                            <li>Validez votre panier et renseignez vos informations de livraison</li>
                            <li>Choisissez votre mode de paiement et confirmez</li>
                        </ol>

                        <p class="text-gray-600 leading-relaxed mt-3">
                            Vous recevrez un email de confirmation dès que votre commande sera enregistrée.
                        </p>

                    </div>

                </details>


                {{-- Question 2 : Dois-je créer un compte --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Dois-je créer un compte pour commander ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-rose/10
                                   flex items-center justify-center
                                   text-nissa-rose text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            <strong class="text-nissa-choco">Non</strong>, vous pouvez commander en tant qu'invité.
                            Vos informations de contact seront simplement nécessaires pour le suivi
                            de votre commande et la livraison.
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            Si vous passez plusieurs commandes, nous conserverons votre historique
                            pour faciliter vos prochains achats.
                        </p>

                    </div>

                </details>


                {{-- Question 3 : Modifier ou annuler --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Puis-je modifier ou annuler ma commande ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-rose/10
                                   flex items-center justify-center
                                   text-nissa-rose text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Vous pouvez modifier ou annuler votre commande
                            <strong class="text-nissa-choco">tant qu'elle n'a pas été expédiée</strong>.
                        </p>

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Contactez-nous rapidement par WhatsApp ou email avec votre numéro de commande
                            afin de vérifier si la modification est encore possible.
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            Une fois la commande expédiée, elle ne peut plus être modifiée.
                            Vous pourrez alors demander un retour après réception.
                        </p>

                    </div>

                </details>


                {{-- Question 4 : Plusieurs articles --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Puis-je commander plusieurs articles différents ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-rose/10
                                   flex items-center justify-center
                                   text-nissa-rose text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed">
                            <strong class="text-nissa-choco">Oui</strong>. Vous pouvez ajouter plusieurs articles,
                            variantes ou packs au panier avant de passer votre commande.
                        </p>

                    </div>

                </details>

{{-- Question 5 : Suivre ma commande --}}
<details class="group bg-white border border-[#eee8e3] rounded-2xl">

    <summary
        class="flex items-center justify-between gap-6
               p-5 md:p-6 cursor-pointer
               list-none text-nissa-choco font-medium"
    >
        <span>
            Comment suivre ma commande ?
        </span>

        <span
            class="shrink-0 w-8 h-8 rounded-full
                   bg-nissa-rose/10
                   flex items-center justify-center
                   text-nissa-rose text-lg
                   transition-transform duration-300
                   group-open:rotate-45"
        >
            +
        </span>

    </summary>

    <div class="px-5 md:px-6 pb-6">

        <p class="text-gray-600 leading-relaxed">
            Pour connaître l'état de votre commande, vous pouvez nous contacter
            directement par <strong class="text-nissa-choco">WhatsApp</strong>.
            Nous vous répondrons rapidement avec les informations de suivi.
        </p>

    </div>

</details>

            </div>

        </div>


        {{-- =====================================================
             02 - PAIEMENT
        ====================================================== --}}
        <div id="paiement" class="mb-12 scroll-mt-32">

            <div class="flex items-center gap-4 mb-5">

                <span class="text-[11px] uppercase tracking-[0.3em]
                             text-nissa-gold font-semibold">
                    02
                </span>

                <h2
                    class="text-2xl md:text-3xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;"
                >
                    Paiement
                </h2>

                <span class="flex-1 h-px bg-[#E9DED4]"></span>

            </div>


            <div class="space-y-3">

                {{-- Question 1 : Modes de paiement --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Quels modes de paiement acceptez-vous ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-gold/10
                                   flex items-center justify-center
                                   text-nissa-gold text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Nous acceptons plusieurs modes de paiement sécurisés :
                        </p>

                        <ul class="list-disc list-inside space-y-2 text-gray-600 leading-relaxed">
                            <li><strong class="text-nissa-choco">Mobile Money</strong> : MTN Mobile Money, Moov Money</li>
                            <li><strong class="text-nissa-choco">Carte bancaire</strong> : Visa, Mastercard via notre partenaire sécurisé</li>
                        </ul>

                        <p class="text-gray-600 leading-relaxed mt-3">
                            Tous les paiements en ligne sont sécurisés et cryptés.
                        </p>

                    </div>

                </details>


                {{-- Question 2 : Paiement sécurisé --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Le paiement en ligne est-il sécurisé ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-gold/10
                                   flex items-center justify-center
                                   text-nissa-gold text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            <strong class="text-nissa-choco">Oui, absolument.</strong>
                            Nous utilisons <strong class="text-nissa-choco">Kkiapay</strong>,
                            une solution de paiement certifiée et sécurisée, largement utilisée
                            au Bénin et en Afrique de l'Ouest.
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            Vos données bancaires ne sont jamais stockées sur notre site.
                            Toutes les transactions sont cryptées et protégées.
                        </p>

                    </div>

                </details>


                {{-- Question 3 : Paiement échoue --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Que faire si mon paiement échoue ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-gold/10
                                   flex items-center justify-center
                                   text-nissa-gold text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Vérifiez les informations saisies, puis réessayez le paiement
                            ou choisissez un autre moyen de paiement.
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            Si le problème persiste, <strong class="text-nissa-choco">contactez-nous</strong>
                            par WhatsApp, nous pourrons finaliser votre commande manuellement.
                        </p>

                    </div>

                </details>


                {{-- Question 4 : Paiement en plusieurs fois --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Puis-je payer en plusieurs fois ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-gold/10
                                   flex items-center justify-center
                                   text-nissa-gold text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Pour le moment, nous n'offrons pas le paiement en plusieurs fois en ligne.
                            Le paiement doit être effectué en une seule fois.
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            Pour des commandes importantes ou des arrangements particuliers,
                            contactez-nous directement par WhatsApp pour en discuter.
                        </p>

                    </div>

                </details>

            </div>

        </div>


        {{-- =====================================================
             03 - LIVRAISON
        ====================================================== --}}
        <div id="livraison" class="mb-12 scroll-mt-32">

            <div class="flex items-center gap-4 mb-5">

                <span class="text-[11px] uppercase tracking-[0.3em]
                             text-nissa-rose font-semibold">
                    03
                </span>

                <h2
                    class="text-2xl md:text-3xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;"
                >
                    Livraison
                </h2>

                <span class="flex-1 h-px bg-[#E9DED4]"></span>

            </div>


            <div class="space-y-3">

                {{-- Question 1 : Où livrez-vous --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Où livrez-vous ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-rose/10
                                   flex items-center justify-center
                                   text-nissa-rose text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Nous livrons principalement au <strong class="text-nissa-choco">Bénin</strong>,
                            avec une attention particulière pour Cotonou et ses environs.
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            Pour les livraisons internationales, contactez-nous directement
                            par WhatsApp ou email afin que nous puissions étudier les possibilités
                            et les tarifs selon votre destination.
                        </p>

                    </div>

                </details>


                {{-- Question 2 : Délais de livraison --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Quels sont les délais de livraison ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-rose/10
                                   flex items-center justify-center
                                   text-nissa-rose text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Les délais varient selon votre localisation :
                        </p>

                        <ul class="list-disc list-inside space-y-2 text-gray-600 leading-relaxed">
                            <li><strong class="text-nissa-choco">Cotonou et environs</strong> : 24 à 48h après validation</li>
                            <li><strong class="text-nissa-choco">Autres villes du Bénin</strong> : 2 à 5 jours ouvrés</li>
                            <li><strong class="text-nissa-choco">International</strong> : sur devis, contactez-nous</li>
                        </ul>

                        <p class="text-gray-600 leading-relaxed mt-3">
                            Ces délais s'entendent après validation du paiement et préparation
                            de votre commande.
                        </p>

                    </div>

                </details>


                {{-- Question 3 : Frais de livraison --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Quels sont les frais de livraison ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-rose/10
                                   flex items-center justify-center
                                   text-nissa-rose text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Les frais de livraison dépendent de votre localisation et du poids
                            de votre commande. Ils vous seront communiqués et confirmés
                            avant la validation finale de votre commande.
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            Pour Cotonou et ses environs, nous proposons la livraison à domicile.
                            Pour les autres villes, nous travaillons avec des services
                            de transport fiables.
                        </p>

                    </div>

                </details>


                {{-- Question 4 : Emballage --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Comment sont emballés mes articles ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-rose/10
                                   flex items-center justify-center
                                   text-nissa-rose text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Chaque création NISSA est <strong class="text-nissa-choco">soigneusement emballée</strong>
                            pour arriver en parfait état. Nous utilisons des emballages protecteurs
                            adaptés à chaque type de produit.
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            Les packs cadeaux bénéficient d'une présentation particulièrement soignée,
                            prête à offrir.
                        </p>

                    </div>

                </details>

            </div>

        </div>


        {{-- =====================================================
             04 - PRODUITS & CRÉATIONS
        ====================================================== --}}
        <div id="produits" class="mb-12 scroll-mt-32">

            <div class="flex items-center gap-4 mb-5">

                <span class="text-[11px] uppercase tracking-[0.3em]
                             text-nissa-sauge font-semibold">
                    04
                </span>

                <h2
                    class="text-2xl md:text-3xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;"
                >
                    Produits & créations
                </h2>

                <span class="flex-1 h-px bg-[#E9DED4]"></span>

            </div>


            <div class="space-y-3">

                {{-- Question 1 : Faits main --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Les produits sont-ils faits main ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-sauge/10
                                   flex items-center justify-center
                                   text-nissa-sauge text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            <strong class="text-nissa-choco">Oui</strong>. NISSA propose notamment des créations
                            réalisées à la main, en particulier les créations au crochet.
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            De légères différences peuvent donc exister d'une pièce à l'autre,
                            ce qui fait le charme et l'authenticité de chaque création.
                        </p>

                    </div>

                </details>


                {{-- Question 2 : Couleurs et variantes --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Les produits sont-ils disponibles en plusieurs couleurs ou matières ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-sauge/10
                                   flex items-center justify-center
                                   text-nissa-sauge text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Cela dépend de chaque création. Lorsque plusieurs variantes sont
                            disponibles, elles sont indiquées directement sur la fiche du produit.
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            Vous pouvez sélectionner la variante qui vous convient (couleur, taille,
                            matière) avant d'ajouter l'article au panier.
                        </p>

                    </div>

                </details>


                {{-- Question 3 : Couleurs fidèles aux photos --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Les couleurs peuvent-elles légèrement différer des photos ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-sauge/10
                                   flex items-center justify-center
                                   text-nissa-sauge text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            <strong class="text-nissa-choco">Oui</strong>. Le rendu des couleurs peut varier
                            légèrement selon l'éclairage de la photo et l'écran utilisé
                            (téléphone, ordinateur, tablette).
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            En cas de doute sur une couleur, n'hésitez pas à nous contacter
                            par WhatsApp, nous pourrons vous envoyer des photos complémentaires.
                        </p>

                    </div>

                </details>


                {{-- Question 4 : Entretien chouchous --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Comment entretenir mes chouchous en satin/soie ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-sauge/10
                                   flex items-center justify-center
                                   text-nissa-sauge text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Pour préserver la beauté de vos chouchous en satin ou soie :
                        </p>

                        <ul class="list-disc list-inside space-y-2 text-gray-600 leading-relaxed">
                            <li><strong class="text-nissa-choco">Lavage</strong> : à la main, à l'eau froide, avec une lessive douce</li>
                            <li><strong class="text-nissa-choco">Séchage</strong> : à l'air libre, à l'abri du soleil direct</li>
                            <li><strong class="text-nissa-choco">Repassage</strong> : à fer doux si nécessaire, avec un linge protecteur</li>
                            <li><strong class="text-nissa-choco">Rangement</strong> : à plat ou suspendu, éviter l'humidité</li>
                        </ul>

                        <p class="text-gray-600 leading-relaxed mt-3">
                            Évitez la machine à laver et le sèche-linge qui abîment les fibres délicates.
                        </p>

                    </div>

                </details>


                {{-- Question 5 : Entretien crochet --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Comment entretenir les créations au crochet ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-sauge/10
                                   flex items-center justify-center
                                   text-nissa-sauge text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            L'entretien dépend de la matière utilisée pour la création.
                            Il est recommandé de privilégier un <strong class="text-nissa-choco">entretien doux</strong>,
                            à la main, à l'eau tiède.
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            Pour une indication précise adaptée à votre article,
                            <strong class="text-nissa-choco">contactez-nous</strong> par WhatsApp
                            en nous précisant le produit concerné.
                        </p>

                    </div>

                </details>


                {{-- Question 6 : Créations au crochet identiques --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Les créations au crochet sont-elles toutes identiques ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-sauge/10
                                   flex items-center justify-center
                                   text-nissa-sauge text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed">
                            <strong class="text-nissa-choco">Non</strong>. Comme elles sont réalisées à la main,
                            de légères différences peuvent apparaître entre deux pièces.
                            Ces particularités font partie de leur caractère artisanal
                            et garantissent que vous recevez une pièce unique.
                        </p>

                    </div>

                </details>


                {{-- Question 7 : Personnalisation --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Puis-je personnaliser une création ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-sauge/10
                                   flex items-center justify-center
                                   text-nissa-sauge text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Certaines créations peuvent être personnalisées selon les possibilités
                            disponibles (couleurs, tailles, matières).
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            <strong class="text-nissa-choco">Contactez-nous</strong> sur WhatsApp
                            pour discuter de votre projet. Les créations sur mesure
                            nécessitent un délai de réalisation supplémentaire.
                        </p>

                    </div>

                </details>

            </div>

        </div>


        {{-- =====================================================
             05 - PACKS & CADEAUX
        ====================================================== --}}
        <div id="packs" class="mb-12 scroll-mt-32">

            <div class="flex items-center gap-4 mb-5">

                <span class="text-[11px] uppercase tracking-[0.3em]
                             text-nissa-gold font-semibold">
                    05
                </span>

                <h2
                    class="text-2xl md:text-3xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;"
                >
                    Packs & cadeaux
                </h2>

                <span class="flex-1 h-px bg-[#E9DED4]"></span>

            </div>


            <div class="space-y-3">

                {{-- Question 1 : Contenu des packs --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Que contiennent les packs NISSA ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-gold/10
                                   flex items-center justify-center
                                   text-nissa-gold text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Le contenu de chaque pack est présenté directement sur sa fiche.
                            La composition peut varier selon l'offre proposée.
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            Les packs sont pensés pour offrir une expérience complète
                            et avantageuse par rapport à l'achat des articles séparément.
                        </p>

                    </div>

                </details>


                {{-- Question 2 : Offrir une commande --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Puis-je offrir une création NISSA ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-gold/10
                                   flex items-center justify-center
                                   text-nissa-gold text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            <strong class="text-nissa-choco">Oui</strong>, les créations NISSA peuvent être offertes
                            pour différentes occasions. Les packs et coffrets sont notamment
                            pensés pour faire plaisir.
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            Il suffit d'indiquer les informations de livraison du destinataire
                            lors de la commande.
                        </p>

                    </div>

                </details>


                {{-- Question 3 : Composer son propre pack --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Puis-je demander un pack personnalisé ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-gold/10
                                   flex items-center justify-center
                                   text-nissa-gold text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Si les packs proposés ne correspondent pas à vos besoins,
                            vous pouvez nous contacter afin de voir les possibilités
                            selon les articles disponibles.
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            Contactez-nous sur WhatsApp avec vos préférences
                            (types de produits, couleurs, budget) et nous vous proposerons
                            une composition sur mesure.
                        </p>

                    </div>

                </details>

            </div>

        </div>


        {{-- =====================================================
             06 - RETOURS & ÉCHANGES
        ====================================================== --}}
        <div id="retours" class="mb-12 scroll-mt-32">

            <div class="flex items-center gap-4 mb-5">

                <span class="text-[11px] uppercase tracking-[0.3em]
                             text-nissa-rose font-semibold">
                    06
                </span>

                <h2
                    class="text-2xl md:text-3xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;"
                >
                    Retours & Échanges
                </h2>

                <span class="flex-1 h-px bg-[#E9DED4]"></span>

            </div>


            <div class="space-y-3">

                {{-- Question 1 : Retourner un article --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Puis-je retourner un article ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-rose/10
                                   flex items-center justify-center
                                   text-nissa-rose text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            <strong class="text-nissa-choco">Oui</strong>, vous disposez de
                            <strong class="text-nissa-choco">7 jours</strong> après réception
                            pour demander un retour ou un échange, à condition que :
                        </p>

                        <ul class="list-disc list-inside space-y-2 text-gray-600 leading-relaxed">
                            <li>L'article n'ait pas été utilisé</li>
                            <li>L'article soit dans son emballage d'origine</li>
                            <li>L'article soit en parfait état</li>
                        </ul>

                        <p class="text-gray-600 leading-relaxed mt-3">
                            Contactez-nous par WhatsApp ou email avec votre numéro de commande
                            et des photos du produit.
                        </p>

                    </div>

                </details>


                {{-- Question 2 : Produit avec problème --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Que faire si je reçois un produit avec un problème ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-rose/10
                                   flex items-center justify-center
                                   text-nissa-rose text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Contactez-nous <strong class="text-nissa-choco">rapidement</strong>
                            par WhatsApp ou par email en indiquant :
                        </p>

                        <ul class="list-disc list-inside space-y-2 text-gray-600 leading-relaxed">
                            <li>Votre numéro de commande</li>
                            <li>Une description claire du problème rencontré</li>
                            <li>Des photos du produit concerné</li>
                        </ul>

                        <p class="text-gray-600 leading-relaxed mt-3">
                            Nous étudierons votre demande et vous proposerons une solution adaptée
                            (échange, remboursement ou renvoi d'un nouveau produit).
                        </p>

                    </div>

                </details>


                {{-- Question 3 : Frais de retour --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Qui prend en charge les frais de retour ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-rose/10
                                   flex items-center justify-center
                                   text-nissa-rose text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            <strong class="text-nissa-choco">Si le produit est défectueux ou non conforme</strong> :
                            nous prenons en charge les frais de retour et vous renvoyons
                            un nouveau produit ou vous remboursons intégralement.
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            <strong class="text-nissa-choco">Si vous changez d'avis</strong> :
                            les frais de retour sont à votre charge, et les frais de livraison
                            initiaux ne sont pas remboursés.
                        </p>

                    </div>

                </details>


                {{-- Question 4 : Délai de remboursement --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Quel est le délai de remboursement ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-rose/10
                                   flex items-center justify-center
                                   text-nissa-rose text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Une fois le retour reçu et validé (vérification de l'état du produit),
                            le remboursement est effectué dans un délai de
                            <strong class="text-nissa-choco">5 à 7 jours ouvrés</strong>.
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            Le remboursement se fait via le même mode de paiement que celui
                            utilisé lors de la commande (Mobile Money ou carte bancaire).
                        </p>

                    </div>

                </details>

            </div>

        </div>


        {{-- =====================================================
             07 - AUTRES QUESTIONS
        ====================================================== --}}
        <div id="autres" class="mb-16 scroll-mt-32">

            <div class="flex items-center gap-4 mb-5">

                <span class="text-[11px] uppercase tracking-[0.3em]
                             text-nissa-sauge font-semibold">
                    07
                </span>

                <h2
                    class="text-2xl md:text-3xl text-nissa-choco"
                    style="font-family:'Playfair Display', serif;"
                >
                    Autres questions
                </h2>

                <span class="flex-1 h-px bg-[#E9DED4]"></span>

            </div>


            <div class="space-y-3">

                {{-- Question 1 : Plus d'informations sur un produit --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Comment obtenir plus d'informations sur un produit ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-sauge/10
                                   flex items-center justify-center
                                   text-nissa-sauge text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Les informations principales (description, matières, dimensions)
                            sont indiquées directement sur la fiche du produit.
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            Pour une précision supplémentaire concernant la matière, la couleur,
                            la taille ou la disponibilité, <strong class="text-nissa-choco">contactez-nous</strong>
                            par WhatsApp et nous vous répondrons avec plaisir.
                        </p>

                    </div>

                </details>


                {{-- Question 2 : Être informé des nouveautés --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Comment être informé des nouveautés ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-sauge/10
                                   flex items-center justify-center
                                   text-nissa-sauge text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Les nouvelles créations sont ajoutées directement à la boutique.
                            Pour ne rien manquer, vous avez plusieurs options :
                        </p>

                        <ul class="list-disc list-inside space-y-2 text-gray-600 leading-relaxed">
                            <li><strong class="text-nissa-choco">Newsletter</strong> : inscrivez-vous en bas de page pour recevoir nos nouveautés par email</li>
                            <li><strong class="text-nissa-choco">TikTok</strong> : suivez-nous sur @nissa_accessoires</li>
                            <li><strong class="text-nissa-choco">WhatsApp</strong> : contactez-nous pour connaître les dernières créations disponibles</li>
                        </ul>

                    </div>

                </details>


                {{-- Question 3 : Désinscription newsletter --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Comment me désinscrire de la newsletter ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-sauge/10
                                   flex items-center justify-center
                                   text-nissa-sauge text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Vous pouvez vous désinscrire à tout moment en cliquant sur le lien
                            de désabonnement présent en bas de chaque email que nous vous envoyons.
                        </p>

                        <p class="text-gray-600 leading-relaxed">
                            Vous pouvez aussi nous contacter directement et nous nous chargerons
                            de votre désinscription immédiatement.
                        </p>

                    </div>

                </details>


                {{-- Question 4 : Laisser un avis --}}
                <details class="group bg-white border border-[#eee8e3] rounded-2xl">

                    <summary
                        class="flex items-center justify-between gap-6
                               p-5 md:p-6 cursor-pointer
                               list-none text-nissa-choco font-medium"
                    >
                        <span>
                            Comment laisser un avis sur un produit ?
                        </span>

                        <span
                            class="shrink-0 w-8 h-8 rounded-full
                                   bg-nissa-sauge/10
                                   flex items-center justify-center
                                   text-nissa-sauge text-lg
                                   transition-transform duration-300
                                   group-open:rotate-45"
                        >
                            +
                        </span>

                    </summary>

                    <div class="px-5 md:px-6 pb-6">

                        <p class="text-gray-600 leading-relaxed mb-3">
                            Après avoir reçu votre commande, vous pouvez laisser un avis
                            sur la page du produit acheté :
                        </p>

                        <ol class="list-decimal list-inside space-y-2 text-gray-600 leading-relaxed">
                            <li>Allez sur la page du produit concerné</li>
                            <li>Descendez jusqu'à la section "Avis clients"</li>
                            <li>Remplissez le formulaire (note, nom, email, commentaire)</li>
                            <li>Validez votre avis</li>
                        </ol>

                        <p class="text-gray-600 leading-relaxed mt-3">
                            Votre avis sera publié après validation par notre équipe
                            (généralement sous 24-48h).
                        </p>

                    </div>

                </details>

            </div>

        </div>


        {{-- =====================================================
             CONTACT FINAL
        ====================================================== --}}
        <div class="relative overflow-hidden
                    bg-nissa-choco rounded-[2rem]
                    px-7 py-10 md:px-12 md:py-12
                    text-center">

            {{-- Décoration --}}
            <div
                class="absolute -top-20 -right-20
                       w-48 h-48 rounded-full
                       bg-nissa-rose/10"
            ></div>

            <div
                class="absolute -bottom-24 -left-20
                       w-56 h-56 rounded-full
                       bg-nissa-gold/10"
            ></div>


            <div class="relative">

                <p class="text-xs uppercase tracking-[0.3em]
                          text-nissa-rose font-semibold">
                    Une autre question ?
                </p>

                <h2
                    class="mt-4 text-3xl md:text-4xl text-white"
                    style="font-family:'Playfair Display', serif;"
                >
                    Parlons de
                    <span class="italic text-nissa-rose">
                        NISSA.
                    </span>
                </h2>

                <p class="mt-4 max-w-xl mx-auto
                          text-white/70 leading-relaxed">
                    Vous n'avez pas trouvé la réponse à votre question ?
                    Notre équipe est là pour vous répondre.
                </p>

                <div class="mt-7 flex flex-col sm:flex-row gap-3 justify-center">
                    <a
                        href="https://wa.me/2290191309710"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center justify-center gap-2
                               px-7 py-3.5
                               bg-white text-nissa-choco
                               rounded-full text-sm font-medium
                               hover:bg-nissa-cream
                               transition duration-300"
                    >
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        WhatsApp
                    </a>

                    <a
                        href="mailto:nissa.accessoires@gmail.com"
                        class="inline-flex items-center justify-center gap-2
                               px-7 py-3.5
                               bg-nissa-rose text-white
                               rounded-full text-sm font-medium
                               hover:bg-nissa-rose-dark
                               transition duration-300"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Email
                    </a>
                </div>

            </div>

        </div>

    </div>

</section>

@endsection