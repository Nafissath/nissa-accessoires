@extends('pages._layout-legal')

@section('page-header')
    <div class="text-center mb-12">
        <span
            class="inline-flex items-center gap-3
                     text-[11px] uppercase tracking-[0.35em]
                     text-nissa-rose font-medium">
            <span class="w-8 h-px bg-nissa-rose"></span>
            Mentions légales
            <span class="w-8 h-px bg-nissa-rose"></span>
        </span>

        <h1 class="mt-6 text-4xl md:text-5xl text-nissa-choco leading-tight" style="font-family:'Playfair Display', serif;">
            Mentions
            <span class="italic text-nissa-rose">légales</span>
        </h1>

        <p class="mt-6 text-gray-600 leading-relaxed max-w-2xl mx-auto">
            Informations légales relatives au site Nissa Accessoires,
            conformément à la législation en vigueur.
        </p>
    </div>
@endsection

@section('legal-content')
    {{-- =====================================================
         ÉDITEUR DU SITE
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span
                    class="shrink-0 w-10 h-10 rounded-full bg-nissa-rose/10 flex items-center justify-center text-nissa-rose font-semibold text-sm">
                    01
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco" style="font-family:'Playfair Display', serif;">
                    Éditeur du site
                </h2>
            </div>

            <div class="bg-nissa-cream rounded-xl p-5 border border-nissa-rose/10">
                <p class="text-gray-700 leading-relaxed space-y-1">
                    <span class="block font-semibold text-nissa-choco text-lg"
                        style="font-family:'Playfair Display', serif;">
                        Nissa Accessoires
                    </span>
                    <span class="block text-sm text-gray-600">Marque artisanale</span>
                </p>

                <div class="mt-4 space-y-2 text-gray-600 text-sm">
                    <p class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-nissa-rose shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Siège : Cotonou, Bénin
                    </p>
                    <p class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-nissa-rose shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Email : <a href="mailto:nissa.accessoires@gmail.com"
                            class="text-nissa-rose hover:underline">nissa.accessoires@gmail.com</a>
                    </p>
                    <p class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-nissa-rose shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                        WhatsApp : +229 01 91 30 97 10
                    </p>
                    <p class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-nissa-rose shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Responsable : ISSOUMA Nafissatou
                    </p>
                </div>
            </div>
        </div>
    </div>


   {{-- =====================================================
     HÉBERGEMENT
====================================================== --}}
<div class="mb-6">
    <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
        <div class="flex items-center gap-4 mb-4">
            <span class="shrink-0 w-10 h-10 rounded-full bg-nissa-gold/10 flex items-center justify-center text-nissa-gold font-semibold text-sm">
                02
            </span>
            <h2 class="text-xl md:text-2xl text-nissa-choco"
                style="font-family:'Playfair Display', serif;">
                Hébergement
            </h2>
        </div>

        <div class="bg-nissa-cream rounded-xl p-5 border border-nissa-gold/10">
            <p class="font-semibold text-nissa-choco text-lg mb-1"
                style="font-family:'Playfair Display', serif;">
                alwaysdata
            </p>
            <p class="text-sm text-gray-600 mb-3">ALWAYSDATA, SARL au capital de 200 000 €</p>

            <div class="space-y-2 text-gray-600 text-sm">
                <p class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-nissa-gold shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    91 rue du Faubourg Saint-Honoré, 75008 Paris, France
                </p>
                <p class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-nissa-gold shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    +33 1 84 16 23 40
                </p>
                <p class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-nissa-gold shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                    </svg>
                    <a href="https://www.alwaysdata.com" target="_blank" rel="noopener noreferrer"
                        class="text-nissa-rose hover:underline">
                        www.alwaysdata.com
                    </a>
                </p>
                <p class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-nissa-gold shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <a href="mailto:contact@alwaysdata.com"
                        class="text-nissa-rose hover:underline">
                        contact@alwaysdata.com
                    </a>
                </p>
                <p class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-nissa-gold shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    RCS Paris 492 893 490
                </p>
            </div>
        </div>

        <p class="text-sm text-gray-500 mt-4 leading-relaxed">
            alwaysdata assure l'hébergement web, le stockage des données
            et la gestion de la base de données du site Nissa Accessoires.
        </p>
    </div>
</div>


    {{-- =====================================================
         PROPRIÉTÉ INTELLECTUELLE
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span
                    class="shrink-0 w-10 h-10 rounded-full bg-nissa-sauge/10 flex items-center justify-center text-nissa-sauge font-semibold text-sm">
                    03
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco" style="font-family:'Playfair Display', serif;">
                    Propriété intellectuelle
                </h2>
            </div>
            <p class="text-gray-600 leading-relaxed mb-4">
                L'ensemble de ce site relève de la législation béninoise et internationale
                sur le droit d'auteur et la propriété intellectuelle. Tous les droits de
                reproduction sont réservés, y compris pour les documents téléchargeables
                et les représentations iconographiques et photographiques.
            </p>
            <p class="text-gray-600 leading-relaxed">
                La reproduction de tout ou partie de ce site sur un support électronique
                quel qu'il soit est <strong class="text-nissa-choco">formellement interdite</strong>
                sauf autorisation expresse de la responsable de publication.
            </p>
        </div>
    </div>


    {{-- =====================================================
         CRÉDITS
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span
                    class="shrink-0 w-10 h-10 rounded-full bg-nissa-rose/10 flex items-center justify-center text-nissa-rose font-semibold text-sm">
                    04
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco" style="font-family:'Playfair Display', serif;">
                    Crédits
                </h2>
            </div>
            <ul class="space-y-2 text-gray-600">
                <li class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-nissa-rose shrink-0"></span>
                    <strong class="text-nissa-choco">Photographies</strong> : Nissa Accessoires
                </li>
                <li class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-nissa-rose shrink-0"></span>
                    <strong class="text-nissa-choco">Conception et développement</strong> : Nissa Accessoires
                </li>
                <li class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-nissa-rose shrink-0"></span>
                    <strong class="text-nissa-choco">Créations artisanales</strong> : réalisées à la main avec passion
                </li>
            </ul>
        </div>
    </div>


    {{-- =====================================================
         DONNÉES PERSONNELLES
    ====================================================== --}}
    <div class="mb-6">
        <div class="bg-white border border-[#eee8e3] rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 mb-4">
                <span
                    class="shrink-0 w-10 h-10 rounded-full bg-nissa-gold/10 flex items-center justify-center text-nissa-gold font-semibold text-sm">
                    05
                </span>
                <h2 class="text-xl md:text-2xl text-nissa-choco" style="font-family:'Playfair Display', serif;">
                    Données personnelles
                </h2>
            </div>
            <p class="text-gray-600 leading-relaxed mb-4">
                Conformément à la loi, vous disposez d'un droit d'accès, de rectification
                et de suppression des données vous concernant.
            </p>
            <p class="text-gray-600 leading-relaxed">
                Pour exercer ce droit, consultez notre
                <a href="{{ route('pages.politique-confidentialite') }}"
                    class="text-nissa-rose font-semibold hover:underline">politique de confidentialité</a>
                ou contactez-nous à l'adresse :
                <a href="mailto:nissa.accessoires@gmail.com" class="text-nissa-rose font-semibold hover:underline">
                    nissa.accessoires@gmail.com
                </a>
            </p>
        </div>
    </div>


    {{-- =====================================================
         CONTACT
    ====================================================== --}}
    <div
        class="relative overflow-hidden
                bg-nissa-choco rounded-[2rem]
                px-7 py-10 md:px-12 md:py-12
                text-center">

        <div class="absolute -top-20 -right-20 w-48 h-48 rounded-full bg-nissa-rose/10"></div>
        <div class="absolute -bottom-24 -left-20 w-56 h-56 rounded-full bg-nissa-gold/10"></div>

        <div class="relative">

            <p class="text-xs uppercase tracking-[0.3em] text-nissa-rose font-semibold">
                Une question ?
            </p>

            <h2 class="mt-4 text-3xl md:text-4xl text-white" style="font-family:'Playfair Display', serif;">
                Contactez
                <span class="italic text-nissa-rose">NISSA</span>
            </h2>

            <p class="mt-4 max-w-xl mx-auto text-white/70 leading-relaxed">
                Une question sur nos mentions légales ?
                Notre équipe est là pour vous répondre.
            </p>

            <div class="mt-7 flex flex-col sm:flex-row gap-3 justify-center">
                <a href="https://wa.me/2290191309710" target="_blank" rel="noopener noreferrer"
                    class="inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-white text-nissa-choco rounded-full text-sm font-medium hover:bg-nissa-cream transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                    </svg>
                    WhatsApp
                </a>

                <a href="mailto:nissa.accessoires@gmail.com"
                    class="inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-nissa-rose text-white rounded-full text-sm font-medium hover:bg-nissa-rose-dark transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Email
                </a>
            </div>

        </div>

    </div>
@endsection
