@extends('layouts.principal')

@section('content')
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-2xl mx-auto px-4">

            {{-- ============================================================
                 SUCCÈS
            ============================================================= --}}
            <div class="text-center mb-10">
                <div class="w-20 h-20 mx-auto mb-6 bg-green-50 rounded-full flex items-center justify-center">
                    <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold text-nissa-choco mb-3" style="font-family: 'Playfair Display', serif;">
                    Merci {{ $commande->cliente->prenom }} !
                </h1>
                <p class="text-gray-600 mb-4">Votre commande a bien été enregistrée.</p>
                <p class="inline-block bg-gray-50 border border-gray-200 rounded-full px-5 py-2 text-sm font-semibold text-nissa-choco">
                    N° de commande : <span class="text-nissa-rose">{{ $commande->numero_commande }}</span>
                </p>
            </div>

            {{-- ============================================================
                 RÉCAPITULATIF
            ============================================================= --}}
            <div class="bg-gray-50 rounded-3xl p-6 md:p-8 mb-6">
                <h2 class="text-lg font-semibold text-nissa-choco mb-5" style="font-family: 'Playfair Display', serif;">
                    Récapitulatif
                </h2>

                <div class="space-y-4">
                    @foreach ($commande->articles as $article)
                        <div class="flex justify-between gap-4 pb-4 border-b border-gray-200">
                            <div class="flex-1">
                                @if ($article->pack)
                                    <p class="font-semibold text-nissa-choco"> {{ $article->pack->nom }}</p>
                                    <ul class="text-sm text-gray-500 mt-1 space-y-0.5">
                                        @foreach ($article->pack->articles as $pa)
                                            <li>• {{ $pa->quantite }}x {{ $pa->produit->nom ?? 'Article' }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="font-semibold text-nissa-choco">{{ $article->produit->nom ?? 'Produit' }}</p>
                                    @if ($article->variante)
                                        <p class="text-sm text-gray-500">
                                            {{ $article->variante->couleur->nom ?? '' }}
                                            {{ $article->variante->taille ? ' / ' . $article->variante->taille->nom : '' }}
                                        </p>
                                    @endif
                                @endif
                                <p class="text-sm text-gray-500 mt-1">Quantité : {{ $article->quantite }}</p>
                            </div>
                            <p class="font-bold text-nissa-choco whitespace-nowrap">
                                {{ number_format($article->prix_total, 0, ',', ' ') }} FCFA
                            </p>
                        </div>
                    @endforeach

                    <div class="flex justify-between items-center pt-2">
                        <span class="text-lg font-semibold text-nissa-choco">Total</span>
                        <span class="text-2xl font-bold text-nissa-rose">
                            {{ number_format($commande->total, 0, ',', ' ') }} FCFA
                        </span>
                    </div>
                </div>
            </div>

            {{-- ============================================================
                 LIVRAISON
            ============================================================= --}}
            <div class="bg-white border border-gray-200 rounded-3xl p-6 md:p-8 mb-6">
                <h2 class="text-lg font-semibold text-nissa-choco mb-4" style="font-family: 'Playfair Display', serif;">
                    Livraison
                </h2>
                <p class="text-gray-700"> {{ $commande->adresse }}</p>
                @if ($commande->instructions)
                    <p class="text-gray-600 mt-2 text-sm italic"> {{ $commande->instructions }}</p>
                @endif
                <p class="text-gray-600 mt-2"> {{ $commande->telephone }}</p>
                @if ($commande->cliente && $commande->cliente->email)
                    <p class="text-gray-600"> {{ $commande->cliente->email }}</p>
                @endif
            </div>

           {{-- ============================================================
     PROCHAINES ÉTAPES
============================================================= --}}
<div class="bg-nissa-rose/5 border border-nissa-rose/20 rounded-3xl p-6 md:p-8 mb-8">
    <h2 class="text-lg font-semibold text-nissa-choco mb-3" style="font-family: 'Playfair Display', serif;">
        📦 Prochaines étapes
    </h2>
    <div class="space-y-3 text-sm text-gray-700 leading-relaxed">
        <div class="flex items-start gap-3">
            <span class="w-6 h-6 bg-nissa-rose text-white rounded-full flex items-center justify-center shrink-0 text-xs font-bold">1</span>
            <p>Un <strong>email de confirmation</strong> vient de vous être envoyé avec le récapitulatif complet.</p>
        </div>
        <div class="flex items-start gap-3">
            <span class="w-6 h-6 bg-nissa-rose text-white rounded-full flex items-center justify-center shrink-0 text-xs font-bold">2</span>
            <p>Envoyez-nous un <strong>message WhatsApp</strong> en cliquant ci-dessous pour confirmer votre commande.</p>
        </div>
        <div class="flex items-start gap-3">
            <span class="w-6 h-6 bg-nissa-rose text-white rounded-full flex items-center justify-center shrink-0 text-xs font-bold">3</span>
            <p>Votre commande sera <strong>préparée avec soin</strong> dans notre atelier au Bénin.</p>
        </div>
    </div>

    {{-- Bouton WhatsApp pour la cliente --}}
    <div class="mt-6 pt-6 border-t border-nissa-rose/20">
        @php
            $messageWhatsApp = "Bonjour Nissa Accessoires ! 🌸\n\n";
            $messageWhatsApp .= "Je viens de passer la commande *" . $commande->numero_commande . "*\n\n";
            $messageWhatsApp .= " *Articles :*\n";
            foreach ($commande->articles as $article) {
                $nomArticle = $article->pack ? ' ' . $article->pack->nom : $article->produit->nom;
                $messageWhatsApp .= "• " . $nomArticle . " (×" . $article->quantite . ") - " . number_format($article->prix_total, 0, ',', ' ') . " FCFA\n";
            }
            $messageWhatsApp .= "\n *Total : " . number_format($commande->total, 0, ',', ' ') . " FCFA*\n\n";
            $messageWhatsApp .= "Je souhaite confirmer cette commande et procéder au paiement Mobile Money.\n\n";
            $messageWhatsApp .= "Merci !";
        @endphp
        <a href="https://wa.me/2290191309710?text={{ urlencode($messageWhatsApp) }}"
           target="_blank"
           class="flex items-center justify-center gap-3 w-full bg-[#25D366] text-white px-6 py-4 rounded-2xl font-semibold hover:opacity-90 transition shadow-lg">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/>
            </svg>
            Confirmer ma commande sur WhatsApp
        </a>
    </div>
</div>

{{-- ============================================================
     ACTIONS
============================================================= --}}
<div class="flex flex-col sm:flex-row gap-4">
    <a href="{{ route('accueil') }}"
        class="flex-1 text-center px-8 py-4 bg-nissa-choco text-white rounded-2xl font-semibold hover:bg-nissa-rose transition shadow-lg">
        Retour à l'accueil
    </a>
    <a href="{{ route('boutique') }}"
        class="flex-1 text-center px-8 py-4 border-2 border-gray-200 text-gray-700 rounded-2xl font-semibold hover:bg-gray-50 transition">
        Continuer mes achats
    </a>
</div>
        </div>
    </section>
@endsection