# Mini E-commerce

## Technologies utilisées

- Base de données : `mini_commerce.sql`

## Prérequis

- Git
- PHP

## Procédure d'installation

1. **Cloner le dépôt**

   ```bash
   git clone https://github.com/finbux/mini_ecommerce.git
   cd mini_ecommerce
   ```

2. **Configurer l'environnement**

   Copier le fichier d'exemple puis renseigner les valeurs :

   ```bash
   cp .env.example .env   # À ADAPTER si le projet n'utilise pas de .env
   ```

   ```env
   DB_HOST=localhost
   DB_NAME=<NOM_DE_LA_BASE>
   DB_USER=<UTILISATEUR>
   DB_PASSWORD=<MOT_DE_PASSE>
   ```

3. **Créer la base de données**

   - Nom de la base : **`mini_commerce`**
   - Importer le script SQL / lancer les migrations :




## Identifiants de test

| Rôle           | Email                      | Mot de passe        |
| -------------- | -------------------------- | ------------------- |
| Administrateur | `finbux@gmail.com`         | `CRYjumper1`    |

> ⚠️ Ces comptes sont destinés uniquement aux tests. Ne jamais les utiliser en production.

## Fonctionnalités

### ✅ Réalisées

- [ ] `Création de compte, login`
- [ ] `Ajout de produit, affichage d'un produit et de tout les produits`
- [ ] `Front end`



### ❌ Non réalisées / à améliorer

- [ ] `Système de panier`
- [ ] `CRUD à finir`
- [ ] `Partie 5 : interaction sociale`


## Auteur

[finbux](https://github.com/finbux)
