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
            Livraison
            <span class="w-8 h-px bg-nissa-rose"></span>
        </span>

        <h1 class="mt-6 text-4xl md:text-5xl text-nissa-choco leading-tight"
            style="font-family:'Playfair Display', serif;">
            Informations de
            <span class="italic text-nissa-rose">livraison</span>
        </h1>

        <p class="mt-6 text-gray-600 leading-relaxed max-w-2xl mx-auto">
            Découvrez nos zones de livraison, délais et tarifs
            pour recevoir vos créations NISSA.
        </p>
    </div>
@endsection

@section('legal-content')

{{-- =========================================================
     ZONES DE LIVRAISON
========================================================= --}}
<div class="mb-12">

    <div class="flex items-center gap-4 mb-6">
        <span class="text-[11px] uppercase tracking-[0.3em]
                     text-nissa-rose font-semibold">
            01
        </span>
        <h2 class="text-2xl md:text-3xl text-nissa-choco"
            style="font-family:'Playfair Display', serif;">
            Zones de livraison
        </h2>
        <span class="flex-1 h-px bg-[#E9DED4]"></span>
    </div>

    <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">

        <p class="text-gray-600 leading-relaxed mb-6">
            Nous livrons principalement au <strong class="text-nissa-choco">Bénin</strong>,
            avec une attention particulière pour Cotonou et ses environs.
        </p>

        <div class="grid md:grid-cols-2 gap-6">

            {{-- Zone principale --}}
            <div class="bg-nissa-cream rounded-xl p-6 border border-nissa-rose/20">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-full bg-nissa-rose/10 flex items-center justify-center">
                        <svg class="w-5 h-5 text-nissa-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-nissa-choco"
                        style="font-family:'Playfair Display', serif;">
                        Cotonou et environs
                    </h3>
                </div>
                <ul class="space-y-2 text-gray-600 text-sm">
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-nissa-rose"></span>
                        Cotonou
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-nissa-rose"></span>
                        Calavi
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-nissa-rose"></span>
                        Sèmè-Podji
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-nissa-rose"></span>
                        Porto-Novo
                    </li>
                </ul>
            </div>

            {{-- Autres villes --}}
            <div class="bg-nissa-cream rounded-xl p-6 border border-nissa-gold/20">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-full bg-nissa-gold/10 flex items-center justify-center">
                        <svg class="w-5 h-5 text-nissa-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-nissa-choco"
                        style="font-family:'Playfair Display', serif;">
                        Autres villes du Bénin
                    </h3>
                </div>
                <ul class="space-y-2 text-gray-600 text-sm">
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-nissa-gold"></span>
                        Parakou
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-nissa-gold"></span>
                        Bohicon
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-nissa-gold"></span>
                        Abomey
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-nissa-gold"></span>
                        Et toutes les autres villes
                    </li>
                </ul>
            </div>

        </div>

        {{-- International --}}
        <div class="mt-6 bg-nissa-sauge/5 rounded-xl p-6 border border-nissa-sauge/20">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-full bg-nissa-sauge/10 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-nissa-sauge" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-nissa-choco mb-2"
                        style="font-family:'Playfair Display', serif;">
                        Livraison internationale
                    </h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Pour les livraisons en dehors du Bénin, contactez-nous directement
                        par <strong class="text-nissa-choco">WhatsApp</strong> ou par email
                        afin que nous puissions étudier les possibilités et les tarifs
                        selon votre destination.
                    </p>
                </div>
            </div>
        </div>

    </div>

</div>


{{-- =========================================================
     DÉLAIS DE LIVRAISON
========================================================= --}}
<div class="mb-12">

    <div class="flex items-center gap-4 mb-6">
        <span class="text-[11px] uppercase tracking-[0.3em]
                     text-nissa-gold font-semibold">
            02
        </span>
        <h2 class="text-2xl md:text-3xl text-nissa-choco"
            style="font-family:'Playfair Display', serif;">
            Délais de livraison
        </h2>
        <span class="flex-1 h-px bg-[#E9DED4]"></span>
    </div>

    <div class="bg-white border border-[#eee8e3] rounded-2xl overflow-hidden">

        {{-- Tableau responsive --}}
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-[#FBF8F3]">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-nissa-choco border-b border-[#eee8e3]"
                            style="font-family:'Playfair Display', serif;">
                            Destination
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-nissa-choco border-b border-[#eee8e3]"
                            style="font-family:'Playfair Display', serif;">
                            Délai estimé
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#eee8e3]">
                    <tr class="hover:bg-[#FBF8F3] transition">
                        <td class="px-6 py-4 text-gray-700 font-medium">
                            Cotonou et Calavi
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-2 text-nissa-rose font-semibold">
                                <span class="w-2 h-2 rounded-full bg-nissa-rose"></span>
                                24 à 48h
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-[#FBF8F3] transition">
                        <td class="px-6 py-4 text-gray-700 font-medium">
                            Autres villes du Sud (Sèmè, Porto-Novo, Ouidah...)
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-2 text-nissa-gold font-semibold">
                                <span class="w-2 h-2 rounded-full bg-nissa-gold"></span>
                                2 à 4 jours
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-[#FBF8F3] transition">
                        <td class="px-6 py-4 text-gray-700 font-medium">
                            Nord du Bénin (Parakou, Djougou, Natitingou...)
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-2 text-nissa-sauge font-semibold">
                                <span class="w-2 h-2 rounded-full bg-nissa-sauge"></span>
                                4 à 7 jours
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-[#FBF8F3] transition">
                        <td class="px-6 py-4 text-gray-700 font-medium">
                            International
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-2 text-gray-500 font-semibold">
                                <span class="w-2 h-2 rounded-full bg-gray-400"></span>
                                Sur devis
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 bg-[#FBF8F3] border-t border-[#eee8e3]">
            <p class="text-sm text-gray-600 leading-relaxed">
                <strong class="text-nissa-choco">Note :</strong>
                Ces délais s'entendent après validation du paiement et préparation
                de votre commande. Les créations faites main peuvent nécessiter
                un délai de préparation supplémentaire.
            </p>
        </div>

    </div>

</div>


{{-- =========================================================
     FRAIS DE LIVRAISON
========================================================= --}}
<div class="mb-12">

    <div class="flex items-center gap-4 mb-6">
        <span class="text-[11px] uppercase tracking-[0.3em]
                     text-nissa-rose font-semibold">
            03
        </span>
        <h2 class="text-2xl md:text-3xl text-nissa-choco"
            style="font-family:'Playfair Display', serif;">
            Frais de livraison
        </h2>
        <span class="flex-1 h-px bg-[#E9DED4]"></span>
    </div>

    <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">

        <p class="text-gray-600 leading-relaxed mb-6">
            Les frais de livraison dépendent de votre <strong class="text-nissa-choco">localisation</strong>
            et du <strong class="text-nissa-choco">poids</strong> de votre commande.
            Ils vous seront communiqués et confirmés avant la validation finale
            de votre commande.
        </p>

        <div class="grid md:grid-cols-2 gap-4">

            <div class="bg-nissa-cream rounded-xl p-5 border border-nissa-rose/20">
                <div class="flex items-center gap-3 mb-2">
                    <svg class="w-5 h-5 text-nissa-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <h3 class="font-semibold text-nissa-choco">Cotonou</h3>
                </div>
                <p class="text-sm text-gray-600">
                    Livraison à domicile disponible.
                    Le livreur vous contactera pour convenir d'un rendez-vous.
                </p>
            </div>

            <div class="bg-nissa-cream rounded-xl p-5 border border-nissa-gold/20">
                <div class="flex items-center gap-3 mb-2">
                    <svg class="w-5 h-5 text-nissa-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                    </svg>
                    <h3 class="font-semibold text-nissa-choco">Autres villes</h3>
                </div>
                <p class="text-sm text-gray-600">
                    Nous travaillons avec des services de transport fiables
                    pour assurer la livraison de vos créations.
                </p>
            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     SUIVI DE COMMANDE
========================================================= --}}
<div class="mb-12">

    <div class="flex items-center gap-4 mb-6">
        <span class="text-[11px] uppercase tracking-[0.3em]
                     text-nissa-sauge font-semibold">
            04
        </span>
        <h2 class="text-2xl md:text-3xl text-nissa-choco"
            style="font-family:'Playfair Display', serif;">
            Suivi de commande
        </h2>
        <span class="flex-1 h-px bg-[#E9DED4]"></span>
    </div>

    <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">

        <p class="text-gray-600 leading-relaxed mb-6">
            Pour connaître l'état de votre commande, vous pouvez nous contacter
            directement par <strong class="text-nissa-choco">WhatsApp</strong>.
            Nous vous répondrons rapidement avec les informations de suivi.
        </p>

        <a href="https://wa.me/2290191309710?text={{ urlencode('Bonjour, je souhaite suivre ma commande.') }}"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex items-center gap-3 bg-[#25D366] text-white px-6 py-3 rounded-full font-medium hover:bg-[#20BA5A] transition shadow-lg hover:shadow-xl hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            Suivre ma commande sur WhatsApp
        </a>

    </div>

</div>


{{-- =========================================================
     PROBLÈME DE LIVRAISON
========================================================= --}}
<div class="mb-12">

    <div class="flex items-center gap-4 mb-6">
        <span class="text-[11px] uppercase tracking-[0.3em]
                     text-nissa-rose font-semibold">
            05
        </span>
        <h2 class="text-2xl md:text-3xl text-nissa-choco"
            style="font-family:'Playfair Display', serif;">
            Problème de livraison
        </h2>
        <span class="flex-1 h-px bg-[#E9DED4]"></span>
    </div>

    <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">

        <p class="text-gray-600 leading-relaxed mb-6">
            En cas de problème (adresse incorrecte, absence, retard),
            <strong class="text-nissa-choco">contactez-nous immédiatement</strong>
            afin que nous puissions trouver une solution rapidement.
        </p>

        <div class="grid md:grid-cols-2 gap-4">

            {{-- WhatsApp --}}
            <a href="https://wa.me/2290191309710"
                target="_blank"
                rel="noopener noreferrer"
                class="group flex items-center gap-4 bg-nissa-cream rounded-xl p-5 border border-nissa-rose/20 hover:border-nissa-rose hover:shadow-md transition">

                <div class="w-12 h-12 rounded-full bg-nissa-rose/10 flex items-center justify-center shrink-0 group-hover:bg-nissa-rose group-hover:text-white transition">
                    <svg class="w-5 h-5 text-nissa-rose group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                </div>

                <div class="flex-1">
                    <p class="text-xs uppercase tracking-[0.2em] text-gray-400 mb-1">WhatsApp</p>
                    <p class="text-nissa-choco font-semibold">+229 01 91 30 97 10</p>
                </div>

                <span class="text-nissa-choco group-hover:translate-x-1 transition">→</span>
            </a>

            {{-- Email --}}
            <a href="mailto:nissa.accessoires@gmail.com"
                class="group flex items-center gap-4 bg-nissa-cream rounded-xl p-5 border border-nissa-gold/20 hover:border-nissa-gold hover:shadow-md transition">

                <div class="w-12 h-12 rounded-full bg-nissa-gold/10 flex items-center justify-center shrink-0 group-hover:bg-nissa-gold group-hover:text-white transition">
                    <svg class="w-5 h-5 text-nissa-gold group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>

                <div class="flex-1 min-w-0">
                    <p class="text-xs uppercase tracking-[0.2em] text-gray-400 mb-1">Email</p>
                    <p class="text-nissa-choco font-semibold truncate">nissa.accessoires@gmail.com</p>
                </div>

                <span class="text-nissa-choco group-hover:translate-x-1 transition">→</span>
            </a>

        </div>

    </div>

</div>


{{-- =========================================================
     EMBALLAGE
========================================================= --}}
<div class="mb-12">

    <div class="flex items-center gap-4 mb-6">
        <span class="text-[11px] uppercase tracking-[0.3em]
                     text-nissa-gold font-semibold">
            06
        </span>
        <h2 class="text-2xl md:text-3xl text-nissa-choco"
            style="font-family:'Playfair Display', serif;">
            Emballage soigné
        </h2>
        <span class="flex-1 h-px bg-[#E9DED4]"></span>
    </div>

    <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">

        <p class="text-gray-600 leading-relaxed mb-4">
            Chaque création NISSA est <strong class="text-nissa-choco">soigneusement emballée</strong>
            pour arriver en parfait état. Nous utilisons des emballages protecteurs
            adaptés à chaque type de produit.
        </p>

        <p class="text-gray-600 leading-relaxed">
            Les <strong class="text-nissa-choco">packs cadeaux</strong> bénéficient
            d'une présentation particulièrement soignée, prête à offrir.
        </p>

    </div>

</div>


{{-- =========================================================
     CTA FINAL
========================================================= --}}
<div class="relative overflow-hidden
            bg-nissa-choco rounded-[2rem]
            px-7 py-10 md:px-12 md:py-12
            text-center">

    {{-- Décoration --}}
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
            Vous avez une question sur la livraison ?
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Email
            </a>
        </div>

    </div>

</div>

@endsection