<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', sans-serif; background: #f9f9f9;">
    <table width="100%" cellpadding="0" cellspacing="0" style="padding: 20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background: #fff; border-radius: 16px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                    
                    {{-- En-tête --}}
                    <tr>
                        <td style="background: linear-gradient(135deg, #D98B92 0%, #B76B72 100%); padding: 30px; text-align: center;">
                            <h1 style="color: #fff; margin: 0; font-size: 24px;">🛍️ Nouvelle commande !</h1>
                            <p style="color: #fff; opacity: 0.9; margin: 8px 0 0;">{{ $commande->numero_commande }}</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 30px;">
                            
                            {{-- Montant --}}
                            <table width="100%" cellpadding="0" cellspacing="0" style="background: #FBF8F3; border-radius: 12px; padding: 20px; margin-bottom: 20px;">
                                <tr>
                                    <td style="text-align: center;">
                                        <p style="color: #888; font-size: 12px; text-transform: uppercase; margin: 0 0 5px;">Montant total</p>
                                        <p style="color: #D98B92; font-size: 32px; font-weight: bold; margin: 0;">
                                            {{ number_format($commande->total, 0, ',', ' ') }} FCFA
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Cliente --}}
                            <h3 style="color: #4A3525; margin: 25px 0 10px; border-bottom: 2px solid #E8B4B8; padding-bottom: 5px;">
                                👤 Cliente
                            </h3>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                <strong>{{ $commande->cliente->prenom }} {{ $commande->cliente->nom }}</strong><br>
                                 {{ $commande->telephone }}<br>
                                 WhatsApp : {{ $commande->whatsapp }}<br>
                                @if ($commande->cliente->email)
                                     {{ $commande->cliente->email }}<br>
                                @endif
                            </p>

                            {{-- Livraison --}}
                            <h3 style="color: #4A3525; margin: 25px 0 10px; border-bottom: 2px solid #E8B4B8; padding-bottom: 5px;">
                                📍 Livraison
                            </h3>
                            <p style="color: #555; line-height: 1.8; margin: 0;">
                                {{ $commande->adresse }}
                                @if ($commande->instructions)
                                    <br><em style="color: #888;"> {{ $commande->instructions }}</em>
                                @endif
                            </p>

                            {{-- Articles --}}
                            <h3 style="color: #4A3525; margin: 25px 0 10px; border-bottom: 2px solid #E8B4B8; padding-bottom: 5px;">
                                📦 Articles commandés
                            </h3>
                            <table width="100%" cellpadding="0" cellspacing="0">
                                @foreach ($commande->articles as $article)
                                    <tr>
                                        <td style="padding: 10px 0; border-bottom: 1px solid #f0f0f0;">
                                            <p style="margin: 0; color: #4A3525; font-weight: 600;">
                                                @if ($article->pack)
                                                     {{ $article->pack->nom }}
                                                @else
                                                    {{ $article->produit->nom ?? 'Article' }}
                                                @endif
                                            </p>
                                            @if ($article->variante)
                                                <p style="margin: 3px 0 0; color: #888; font-size: 13px;">
                                                    {{ $article->variante->couleur->nom ?? '' }}
                                                    {{ $article->variante->taille ? ' / ' . $article->variante->taille->nom : '' }}
                                                </p>
                                            @endif
                                        </td>
                                        <td style="padding: 10px 0; border-bottom: 1px solid #f0f0f0; text-align: right;">
                                            <p style="margin: 0; color: #555; font-size: 13px;">×{{ $article->quantite }}</p>
                                            <p style="margin: 3px 0 0; color: #4A3525; font-weight: bold;">
                                                {{ number_format($article->prix_total, 0, ',', ' ') }} FCFA
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                            {{-- Actions rapides --}}
                            @php
                                $messageClient = "Bonjour " . $commande->cliente->prenom . " ! 🌸\n\n";
                                $messageClient .= "Merci pour votre commande *" . $commande->numero_commande . "* chez Nissa Accessoires !\n\n";
                                $messageClient .= " *Total : " . number_format($commande->total, 0, ',', ' ') . " FCFA*\n\n";
                                $messageClient .= " Votre commande sera préparée avec soin dans notre atelier.\n\n";
                                $messageClient .= "Pour procéder au paiement Mobile Money (MTN MoMo, Moov Money ou Celtis Cash), veuillez nous confirmer que vous êtes disponible.\n\n";
                                $messageClient .= "À très vite !\n";
                                $messageClient .= "Nissa Accessoires 🌸";
                                $whatsappClient = preg_replace('/[^0-9]/', '', $commande->whatsapp);
                                if (!str_starts_with($whatsappClient, '229')) {
                                    $whatsappClient = '229' . $whatsappClient;
                                }
                            @endphp
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 25px;">
                                <tr>
                                    <td style="text-align: center;">
                                        <a href="https://wa.me/{{ $whatsappClient }}?text={{ urlencode($messageClient) }}"
                                           target="_blank"
                                           style="display: inline-block; background: #25D366; color: #fff; padding: 14px 30px; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 15px;">
                                             Envoyer la confirmation à la cliente
                                        </a>
                                        <p style="margin: 10px 0 0; color: #888; font-size: 12px;">
                                            Cliquez pour ouvrir WhatsApp avec le message pré-rempli
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="background: #FBF8F3; padding: 20px; text-align: center; border-top: 1px solid #f0f0f0;">
                            <p style="color: #888; font-size: 12px; margin: 0;">
                                Email automatique • Nissa Accessoires 🌸
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>