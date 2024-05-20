# Projet de Blog

Bienvenue dans le Projet de Blog ! Ce projet est un blog simple mais entièrement fonctionnel construit en utilisant HTML, CSS, PHP et JavaScript. Il inclut des fonctionnalités telles que l'authentification des utilisateurs, la création de billets de blog et les commentaires.

## Table des Matières

- [Fonctionnalités](#fonctionnalités)
- [Technologies Utilisées](#technologies-utilisées)
- [Démarrage](#démarrage)
  - [Prérequis](#prérequis)
  - [Installation](#installation)
- [Utilisation](#utilisation)
- [Contribution](#contribution)
- [Licence](#licence)
- [Contact](#contact)

## Fonctionnalités

- Enregistrement et connexion des utilisateurs
- Créer, lire, mettre à jour et supprimer des billets de blog
- Commenter les posts du blog
- Design réactif
- Gestion des profils utilisateur

## Technologies Utilisées

- HTML : Structure des pages web
- CSS : Style des pages web
- JavaScript : Script côté client et AJAX
- PHP : Script côté serveur
- MySQL : Gestion de la base de données

## Démarrage

Pour obtenir une copie locale et la faire fonctionner, suivez ces étapes simples.

### Prérequis

- Un serveur web (par exemple, Apache)
- PHP installé sur le serveur
- Base de données MySQL

NB: J'utilise WAMP pour aller plus vite

### Installation

1. Clonez le dépôt :

   ```sh
   git clone https://github.com/SixteNow/phptraining.git
   ```

2. Naviguez dans le répertoire du projet :

   ```sh
   cd projet-de-blog
   ```

3. Importez la base de données :

   - Créez une base de données nommée `training`.
   - Importez le fichier `training.sql` situé dans le répertoire `sql` dans votre base de données.

4. Configurez la connexion à la base de données :

   - Ouvrez le fichier `bdconnect.php` situé dans le répertoire `bdconnect`.
   - Mettez à jour les informations d'identification de la base de données (`DB_HOST`, `DB_USER`, `DB_PASS`, `DB_NAME`) avec vos informations de base de données.

5. Démarrez votre serveur web et ouvrez le projet dans votre navigateur :

   ```sh
   http://localhost/projet-de-blog
   ```

## Utilisation

- Enregistrez un nouvel utilisateur ou connectez-vous avec des identifiants existants.
- Créez de nouveaux posts de blog, éditez-les ou supprimez-les.(buggy)
- Commentez les posts du blog.
- Affichez et gérez votre profil utilisateur.

## Contact

---
