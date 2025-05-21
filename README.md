# DevProfile - Application Laravel

## Description

DevProfile est une application web construite avec Laravel 11 permettant aux utilisateurs de créer un profil développeur, ajouter des projets, des compétences et générer un CV au format PDF.

## Fonctionnalités

- Authentification (inscription, connexion) avec Laravel Breeze
- Création et édition de profil utilisateur
- Ajout, modification, suppression de projets
- Ajout, suppression de compétences
- Génération d'un CV en PDF (nom, titre, bio, projets, compétences)
- Page de profil public accessible par une URL unique

## Installation

### Prérequis

- PHP 8.2+
- Composer
- MySQL
- Node.js et NPM

### Étapes

```bash
git clone https://github.com/votre-utilisateur/devprofile.git
cd devprofile

# Installer les dépendances
composer install
npm install && npm run dev

# Copier le fichier d'environnement
cp .env.example .env

# Générer la clé d'application
php artisan key:generate

# Configurer la base de données dans .env
DB_DATABASE=devprofile
DB_USERNAME=root
DB_PASSWORD=

# Migrer la base de données
php artisan migrate

# Lancer le serveur
php artisan serve
