@extends('layouts.principal')

@section('content')
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-3xl mx-auto px-4">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-nissa-choco mb-4" style="font-family: 'Playfair Display', serif;">
                Questions <span class="italic">fréquentes</span>
            </h1>
        </div>

        <div class="space-y-4">
            <details class="bg-gray-50 rounded-2xl p-6">
                <summary class="font-semibold text-nissa-choco cursor-pointer">Quels sont les délais de livraison ?</summary>
                <p class="mt-3 text-gray-600">Livraison sous 24-48h à Cotonou, 3-5 jours pour le reste du Bénin.</p>
            </details>
            <details class="bg-gray-50 rounded-2xl p-6">
                <summary class="font-semibold text-nissa-choco cursor-pointer">Quels modes de paiement acceptez-vous ?</summary>
                <p class="mt-3 text-gray-600">MTN MoMo, Moov Money, Celtis Cash et paiement à la livraison.</p>
            </details>
            <details class="bg-gray-50 rounded-2xl p-6">
                <summary class="font-semibold text-nissa-choco cursor-pointer">Vos produits sont-ils faits main ?</summary>
                <p class="mt-3 text-gray-600">Oui, tous nos accessoires sont créés à la main dans notre atelier au Bénin.</p>
            </details>
        </div>
    </div>
</section>
@endsection