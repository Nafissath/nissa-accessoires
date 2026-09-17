<div align="center">

# 🌸 NISSA Accessoires

### Créations artisanales faites main au Bénin

*Boutique e-commerce premium dédiée aux accessoires féminins artisanaux*

[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Livewire](https://img.shields.io/badge/Livewire-3-4E56A6?style=for-the-badge&logo=livewire&logoColor=white)](https://livewire.laravel.com)
[![Tailwind](https://img.shields.io/badge/Tailwind-3-06B6D4?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com)

</div>

---

##  À propos

**NISSA Accessoires** est une boutique e-commerce artisanale béninoise dédiée à la création et à la vente d'accessoires faits main avec passion et savoir-faire.

> *« Les petits détails peuvent parfois raconter les plus belles histoires. »*

La marque propose une gamme soigneusement sélectionnée de créations uniques :

-  **Chouchous** en satin, soie, velours et laine — pensés pour prendre soin des cheveux naturels
-  **Sacs et trousses au crochet** — pièces uniques confectionnées à la main
-  **Packs et coffrets cadeaux** — des compositions idéales pour offrir ou se faire plaisir

NISSA met l'accent sur **la créativité, l'authenticité, l'élégance et l'accessibilité**, en proposant des créations pensées pour accompagner le quotidien tout en permettant à chacune d'exprimer son style.

###  Notre engagement

Chaque pièce est **faite main au Bénin** avec des matières nobles, dans une démarche qui associe esthétique, créativité et travail artisanal authentique.

---

##  Fonctionnalités principales

###  Expérience boutique

-  Découvrir les collections par catégorie (chouchous, sacs, trousses, packs)
-  Personnaliser par matière, couleur ou taille
-  Panier et favoris persistants
-  Avis clients avec notation 5 étoiles
-  Paiement **Mobile Money** (MTN, Moov) et carte bancaire via **Kkiapay**
-  Suivi des commandes en temps réel
-  Newsletter avec offres exclusives
-  Interface 100% responsive

###  Newsletter avancée

- Inscription depuis le footer avec email de bienvenue automatique
- Envoi groupé aux abonnés actifs depuis l'admin
- Historique des envois avec statistiques (succès / échecs)
- Export CSV des abonnés
- Désinscription en un clic via lien unique (token sécurisé)

###  Système d'avis clients

- Notation 1 à 5 étoiles avec sélection interactive
- Commentaires validés par l'administrateur
- Note moyenne affichée sur chaque fiche produit
- Protection anti-spam (un seul avis par email/produit)

###  Espace administration

-  Tableau de bord avec statistiques
-  Gestion produits, variantes, images (compression WebP automatique)
-  Commandes avec suivi de statut
-  Catégories, collections, attributs (couleurs, tailles, matières)
-  Packs cadeaux composés
-  Gestion clientes
-  Modération des avis clients
-  Newsletter avec envoi groupé et export
-  Paramètres du site

###  Pages légales (RGPD)

-  Conditions Générales de Vente (CGV)
-  Politique de confidentialité
-  Politique de retours et remboursements
-  Mentions légales
-  Informations de livraison

---

##  Stack technique

| Technologie | Version | Usage |
|---|---|---|
| **Laravel** | 12 | Framework backend |
| **PHP** | 8.2 | Langage serveur |
| **Livewire** | 3 | Composants interactifs (panier, favoris) |
| **Alpine.js** | 3 | Interactions légères (modales, toasts) |
| **Tailwind CSS** | 3 | Design system responsive |
| **MySQL** | 8.0 | Base de données |
| **Kkiapay** | API | Paiement Mobile Money Bénin |
| **Intervention Image** | 3 | Compression automatique WebP |
| **Spatie Sitemap** | 6 | Génération SEO automatique |

###  Architecture

```
app/
├── Http/
│   ├── Controllers/          # Contrôleurs publics
│   │   └── Admin/            # Contrôleurs administration
│   ├── Middleware/           # Auth admin + headers sécurité
│   └── Livewire/             # Composants réactifs
├── Helpers/
│   └── ImageHelper.php       # Compression WebP automatique
├── Mail/                     # Emails transactionnels
└── Models/                   # Modèles Eloquent

resources/views/
├── admin/                    # Interface administration
├── emails/                   # Templates emails
├── layouts/                  # Layouts principal + admin
└── pages/                    # Pages statiques

database/
├── migrations/               # Schéma versionné
└── seeders/                  # Données de démonstration
```

###  Sécurité

-  Protection CSRF sur tous les formulaires
-  Headers de sécurité (X-Frame-Options, X-XSS-Protection, HSTS en production)
-  Sessions isolées par client
-  Modération obligatoire des avis clients
-  Middleware d'authentification admin dédié
-  Hachage bcrypt des mots de passe
-  Validation stricte des entrées

###  Performance

-  **Compression WebP automatique** : réduction 50-70% du poids des images
-  **Miniatures 400x400** générées à l'upload
-  **Lazy loading** des images
-  **Cache** optimisé (views, config, routes)
-  **Eager loading** des relations Eloquent

---

##  Installation

### Prérequis

- **PHP** >= 8.2 (extensions : `gd`, `pdo_mysql`, `fileinfo`, `mbstring`, `openssl`)
- **Composer** (gestionnaire PHP)
- **Node.js** >= 18 avec npm
- **MySQL** >= 8.0
- **Git**

### Étapes

```bash
# 1. Cloner le projet
git clone https://github.com/Nafissath/nissa-accessoires.git
cd nissa-accessoires

# 2. Installer les dépendances
composer install
npm install

# 3. Configurer l'environnement
cp .env.example .env
php artisan key:generate

# 4. Créer la base de données MySQL
mysql -u root -p -e "CREATE DATABASE nissa_accessoires CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# 5. Exécuter migrations et seeders
php artisan migrate --seed

# 6. Lier le stockage public
php artisan storage:link

# 7. Compiler les assets
npm run build

# 8. Lancer le serveur
php artisan serve
```

---

##  Accès après installation

- **Site public** : [http://127.0.0.1:8000](http://127.0.0.1:8000)
- **Admin** : [http://127.0.0.1:8000/admin/connexion](http://127.0.0.1:8000/admin/connexion)
- **Identifiants démo** : `admin@nissa.com` / `admin123`

 **Changez ces identifiants en production !**

---

##  Configuration

###  Emails (Gmail recommandé)

1. Activer la **vérification en 2 étapes** sur votre compte Google
2. Créer un **mot de passe d'application**
3. Renseigner dans `.env` :

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=votre-email@gmail.com
MAIL_PASSWORD=votre-mot-de-passe-app
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="votre-email@gmail.com"
MAIL_FROM_NAME="Nissa Accessoires"
```

###  Paiement Kkiapay

1. Créer un compte sur [kkiapay.me](https://kkiapay.me)
2. Obtenir les clés API (sandbox pour tester, live pour production)
3. Renseigner dans `.env` :

```env
KKIAPAY_MODE=sandbox          # ou "live" en production
KKIAPAY_PUBLIC_KEY=votre_clé_publique
KKIAPAY_SECRET_KEY=votre_clé_secrète
```

###  Base de données

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nissa_accessoires
DB_USERNAME=root
DB_PASSWORD=votre_mot_de_passe
```

---

##  Déploiement en production

### Hébergement recommandé

| Hébergeur | Avantages | Prix |
|---|---|---|
| **Alwaysdata** | Support Laravel natif, français | À partir de 5€/mois |
| **Hostinger** | Économique, bon pour démarrer | À partir de 3€/mois |
| **OVH** | Hébergement européen | À partir de 4€/mois |
| **DigitalOcean** | Serveur dédié, scalable | À partir de 6$/mois |

### Étapes clés

1. **Acheter un domaine** (nissa-accessoires.com ou .bj)
2. **Activer HTTPS** (Let's Encrypt gratuit)
3. **Uploader les fichiers** via FTP ou Git
4. **Importer la base de données**
5. **Configurer `.env` de production** :

```env
APP_DEBUG=false
APP_ENV=production
KKIAPAY_MODE=live
```

6. **Optimiser les caches** :

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

7. **Soumettre le sitemap** à Google Search Console : `https://votre-domaine.com/sitemap.xml`

---

##  Roadmap

###  Court terme (1-2 mois)
- [ ] Chat en direct (Tawk.to)
- [ ] Programme de fidélité
- [ ] Google Analytics 4 + Search Console
- [ ] Photos réelles des produits

###  Moyen terme (3-6 mois)
- [ ] Blog avec articles sur l'artisanat
- [ ] Système de parrainage (codes promo)
- [ ] Notifications push (PWA)

###  Long terme (6+ mois)
- [ ] Box mensuelle (abonnement chouchou surprise)
- [ ] Personnalisation produit (gravure, couleurs custom)
- [ ] Multilingue (français / anglais)
- [ ] Instagram Shopping / TikTok Shop

---

##  Modèles principaux

| Modèle | Description |
|---|---|
| `Produit` | Produits avec variantes et images |
| `Categorie` | Catégories de produits |
| `VarianteProduit` | Déclinaisons (couleur, taille, matière) |
| `Pack` | Packs cadeaux composés |
| `Commande` | Commandes clientes |
| `Cliente` | Comptes clientes |
| `AbonneNewsletter` | Abonnés newsletter |
| `AvisProduit` | Avis clients avec notation |
| `Admin` | Administrateurs |

---

##  Tests avant mise en ligne

- [ ] Inscription newsletter → email reçu
- [ ] Envoi newsletter groupée → emails reçus
- [ ] Ajout panier → toast succès
- [ ] Paiement Kkiapay sandbox → OK
- [ ] Avis client → apparaît "En attente" en admin
- [ ] Approbation avis → apparaît sur fiche produit
- [ ] Mobile responsive (toutes pages)
- [ ] Commande complète de bout en bout

---

##  Autrice

**Nafissath** — Fondatrice et créatrice de NISSA Accessoires.

Passionnée par l'artisanat et la mode, elle conçoit chaque pièce avec soin au Bénin, en mettant l'accent sur la qualité des matières et l'attention aux détails.

-  **TikTok** : [@nissa_accessoires](https://www.tiktok.com/@nissa_accessoires)
-  **Email** : nissa.accessoires@gmail.com
-  **WhatsApp** : +229 01 91 30 97 10
-  **Localisation** : Cotonou, Bénin

---

##  Licence

**Projet privé** — Tous droits réservés © Nissa Accessoires 2026

Ce code est la propriété exclusive de Nissa Accessoires. Toute reproduction, distribution ou utilisation non autorisée est strictement interdite sans accord écrit préalable.

---

<div align="center">

###  Fait avec passion au Bénin 🇧🇯

**NISSA Accessoires** — *L'élégance qui prend soin de vous*

[Site web](https://nissa-accessoires.com) • [TikTok](https://www.tiktok.com/@nissa_accessoires) • [Contact](mailto:nissa.accessoires@gmail.com)

</div>