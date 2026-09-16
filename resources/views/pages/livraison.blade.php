@extends('pages._layout-legal')

@section('legal-content')
<h2>Zones de livraison</h2>
<p>
    Nous livrons partout au <strong>Bénin</strong>, notamment :
</p>
<ul>
    <li>Cotonou et environs (Calavi, Sèmè, Porto-Novo)</li>
    <li>Parakou, Bohicon, Abomey</li>
    <li>Et toutes les autres villes du Bénin</li>
</ul>

<h2>Délais de livraison</h2>
<table class="min-w-full border border-gray-200 mt-4">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-4 py-3 text-left text-sm font-semibold text-nissa-choco">Destination</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-nissa-choco">Délai</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-100">
        <tr>
            <td class="px-4 py-3 text-sm">Cotonou et Calavi</td>
            <td class="px-4 py-3 text-sm">24 à 48h</td>
        </tr>
        <tr>
            <td class="px-4 py-3 text-sm">Autres villes du Sud</td>
            <td class="px-4 py-3 text-sm">2 à 4 jours</td>
        </tr>
        <tr>
            <td class="px-4 py-3 text-sm">Nord du Bénin</td>
            <td class="px-4 py-3 text-sm">4 à 7 jours</td>
        </tr>
    </tbody>
</table>

<h2 class="mt-8">Frais de livraison</h2>
<p>
    Les frais de livraison dépendent de votre localisation et vous sont communiqués avant la validation de votre commande. Ils peuvent être offerts à partir d'un certain montant d'achat (voir promotions en cours).
</p>

<h2>Suivi de commande</h2>
<p>
    Dès l'expédition de votre commande, vous recevrez :
</p>
<ul>
    <li>Un email de confirmation avec les détails</li>
    <li>Un message WhatsApp du livreur pour convenir d'un rendez-vous</li>
</ul>

<h2>Problème de livraison</h2>
<p>
    En cas de problème (adresse incorrecte, absence, retard), contactez-nous immédiatement :
</p>
<ul>
    <li>WhatsApp : +229 01 91 30 97 10</li>
    <li>Email : nissa.accessoires@gmail.com</li>
</ul>
@endsection