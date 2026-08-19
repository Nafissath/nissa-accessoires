<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de commande</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, sans-serif; background-color: #f9f9f9;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f9f9f9; padding: 20px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                    
                    {{-- En-tête --}}
                    <tr>
                        <td style="background: linear-gradient(135deg, #4A3525 0%, #6B4423 100%); padding: 40px 30px; text-align: center;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 28px; font-family: Georgia, serif;">
                                Nissa Accessoires
                            </h1>
                            <p style="color: #E8B4B8; margin: 8px 0 0; font-size: 14px; letter-spacing: 2px;">
                                CRÉATIONS ARTISANALES
                            </p>
                        </td>
                    </tr>

                    {{-- Message principal --}}
                    <tr>
                        <td style="padding: 40px 30px;">
                            <h2 style="color: #4A3525; margin: 0 0 20px; font-size: 24px; font-family: Georgia, serif;">
                                Merci {{ $commande->cliente->prenom }} ! 🌸
                            </h2>
                            
                            <p style="color: #555555; line-height: 1.6; margin: 0 0 20px;">
                                Votre commande a bien été enregistrée et votre paiement a été confirmé.
                                Vous trouverez ci-dessous le récapitulatif de votre achat.
                            </p>

                            {{-- Numéro de commande --}}
                            <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #FBF8F3; border-radius: 12px; padding: 20px; margin: 20px 0;">
                                <tr>
                                    <td style="text-align: center;">
                                        <p style="color: #888; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; margin: 0 0 8px;">
                                            Numéro de commande
                                        </p>
                                        <p style="color: #D98B92; font-size: 20px; font-weight: bold; margin: 0; font-family: Georgia, serif;">
                                            {{ $commande->numero_commande }}
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Articles --}}
                            <h3 style="color: #4A3525; margin: 30px 0 15px; font-size: 18px; font-family: Georgia, serif; border-bottom: 2px solid #E8B4B8; padding-bottom: 8px;">
                                Vos articles
                            </h3>

                            <table width="100%" cellpadding="0" cellspacing="0">
                                @foreach ($commande->articles as $article)
                                    <tr>
                                        <td style="padding: 12px 0; border-bottom: 1px solid #f0f0f0;">
                                            <p style="color: #4A3525; margin: 0 0 4px; font-weight: 600;">
                                                @if ($article->pack)
                                                    🎁 {{ $article->pack->nom }}
                                                @else
                                                    {{ $article->produit->nom ?? 'Article' }}
                                                @endif
                                            </p>
                                            @if ($article->variante)
                                                <p style="color: #888; font-size: 13px; margin: 0;">
                                                    {{ $article->variante->couleur->nom ?? '' }}
                                                    {{ $article->variante->taille ? ' / ' . $article->variante->taille->nom : '' }}
                                                </p>
                                            @endif
                                        </td>
                                        <td style="padding: 12px 0; border-bottom: 1px solid #f0f0f0; text-align: right;">
                                            <p style="color: #555; margin: 0; font-size: 13px;">×{{ $article->quantite }}</p>
                                            <p style="color: #4A3525; font-weight: bold; margin: 0;">
                                                {{ number_format($article->prix_total, 0, ',', ' ') }} FCFA
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                            {{-- Total --}}
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 20px; background: linear-gradient(135deg, #4A3525 0%, #6B4423 100%); border-radius: 12px; padding: 20px;">
                                <tr>
                                    <td style="padding: 20px; color: #ffffff;">
                                        <p style="margin: 0; font-size: 14px; opacity: 0.8;">Total payé</p>
                                        <p style="margin: 5px 0 0; font-size: 28px; font-weight: bold; color: #E8B4B8; font-family: Georgia, serif;">
                                            {{ number_format($commande->total, 0, ',', ' ') }} FCFA
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Livraison --}}
                            <h3 style="color: #4A3525; margin: 30px 0 15px; font-size: 18px; font-family: Georgia, serif; border-bottom: 2px solid #E8B4B8; padding-bottom: 8px;">
                                Livraison
                            </h3>
                            <p style="color: #555; line-height: 1.6; margin: 0;">
                                <strong>Adresse :</strong> {{ $commande->adresse }}<br>
                                <strong>Téléphone :</strong> {{ $commande->telephone }}<br>
                                @if ($commande->cliente && $commande->cliente->email)
                                    <strong>Email :</strong> {{ $commande->cliente->email }}
                                @endif
                            </p>
                            @if ($commande->instructions)
                                <p style="color: #888; font-style: italic; margin: 10px 0 0; font-size: 14px;">
                                    💬 {{ $commande->instructions }}
                                </p>
                            @endif

                            {{-- Prochaines étapes --}}
                            <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #FBF8F3; border-radius: 12px; padding: 20px; margin: 30px 0;">
                                <tr>
                                    <td style="padding: 20px;">
                                        <h3 style="color: #4A3525; margin: 0 0 10px; font-size: 16px;">
                                            📦 Prochaines étapes
                                        </h3>
                                        <p style="color: #555; line-height: 1.6; margin: 0; font-size: 14px;">
                                            Votre commande sera préparée avec soin dans notre atelier au Bénin.
                                            Vous recevrez un message WhatsApp dans les 24h pour confirmer la date de livraison.
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Contact --}}
                            <p style="color: #555; line-height: 1.6; margin: 30px 0 0; text-align: center; font-size: 14px;">
                                Une question ? Contactez-nous :<br>
                                📱 <a href="https://wa.me/2290191309710" style="color: #D98B92; text-decoration: none;">WhatsApp</a>
                                &nbsp;|&nbsp;
                                📧 <a href="mailto:nissa.accessoires@gmail.com" style="color: #D98B92; text-decoration: none;">nissa.accessoires@gmail.com</a>
                            </p>
                        </td>
                    </tr>

                    {{-- Pied de page --}}
                    <tr>
                        <td style="background-color: #FBF8F3; padding: 25px; text-align: center; border-top: 1px solid #f0f0f0;">
                            <p style="color: #888; font-size: 12px; margin: 0;">
                                © 2026 Nissa Accessoires • Créations faites main avec passion au Bénin 🌸
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>