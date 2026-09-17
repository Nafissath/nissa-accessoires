<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Bienvenue chez Nissa Accessoires</title>
</head>
<body style="margin:0;padding:0;background:#FBF8F3;font-family:Arial,Helvetica,sans-serif;color:#3E2F28;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff;border-radius:24px;overflow:hidden;max-width:600px;width:100%;">
                    <tr>
                        <td style="background:#3E2F28;padding:32px;text-align:center;">
                            <p style="margin:0;color:#ffffff;font-size:26px;letter-spacing:4px;font-family:Georgia,serif;">NISSA</p>
                            <p style="margin:4px 0 0;color:#D98B92;font-size:10px;letter-spacing:4px;text-transform:uppercase;">accessoires</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:40px 32px;">
                            <h1 style="margin:0 0 16px;font-size:24px;font-family:Georgia,serif;">Bienvenue dans la famille Nissa</h1>
                            <p style="margin:0 0 12px;line-height:1.6;">
                                Merci de vous être inscrite à notre newsletter.
                            </p>
                            <p style="margin:0 0 24px;line-height:1.6;">
                                Vous recevrez en avant-première nos nouvelles créations,
                                nos conseils et nos offres réservées aux abonnées.
                            </p>
                            <p style="margin:0;">
                                <a href="{{ route('boutique') }}"
                                    style="display:inline-block;background:#3E2F28;color:#ffffff;text-decoration:none;padding:14px 28px;border-radius:999px;font-size:14px;">
                                    Découvrir la boutique
                                </a>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:24px 32px;background:#FBF8F3;text-align:center;">
                            <p style="margin:0;font-size:12px;color:#8a7f78;line-height:1.6;">
                                Vous recevez cet email car vous vous êtes inscrite à la newsletter Nissa Accessoires.<br>
                                <a href="{{ route('newsletter.desinscription', $abonne->token) }}" style="color:#D98B92;">Se désinscrire</a>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>