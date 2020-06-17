<div style="text-align: center; background-color: #F0FBFF; border-radius: 16px; border: 3px solid #9FCC3B; margin: 20px;">
    <img src="https://nicholasgratton.com/img/portager_noir_100px.png" style="height: 80px; text-align: center; margin: 20px;">
</div>

# **DOCUMENTATION**

## Table des matières
> 1. Utilisateurs par défault
> 2. Seed de la Base de données
> 3. API
>    - [Profil utilisateur](#profil-utilisateur)
>    - [Potager](#potager)
>    - [Plant](#plant)
>    - [Type de plants](#type-de-plants)
>    - [Évaluation](#évaluations)

# UTILISATEURS PAR DÉFAULT

Deux utilisateurs sont seedé dans la DB pour fin de développement.

## Administateur
- id : 1
- Prénom : Admin
- Nom de famille : Istrateur
- Courriel : **admin@portager.com**
- Mot de passe : **portager**
- Rôle : Administateur

Un profil utilisaeur n'est pas créé pour cet id.

## Utilisateur
- id : 2
- Prénom : Utilisateur
- Nom de famille: Lambda
- Courriel : **user@portager.com**
- Mot de passe : **portager**
- Rôle : Utilisateur

Un profil utilisateur de base a été créé pour cet utilisateur. Voir section ci-dessous pour plus de détails.


# Seed de la base de données

Plusieurs seeders ont été créés pour alimenter le projet. Ainsi, à chaque nouveau feature, il y a toujours au moins un minimum de données avec lesquels travailler.

- 10 utilisateurs
- 9 profils [utilisateurs 2 à 10]
- 9 potagers [utilisateurs 2 à 10]
- 50 plants [potagers aléatoires]
- Aucune évaluation


# API

L'API est publique en de moment. Les chemins seront sécurisé par *Auth* juste avant la mise en service.

---

## PROFIL UTILISATEUR

### URL : **`/api/profile/{userId}`**

Méthodes HTTP disponibles :
- **GET** : obetnir un seul profil -- retourne Objet
- **PATCH** : modification d'un profil (mise à jour)
- **DELETE** : suppression d'un profil

### URL : **`/api/profile/new`**

- **PUT** : création d'un nouveau profil - user_id fourni par *Auth*

### URL : **`/api/profile/{userId}/visit`**

- Méthode : **POST** : aucune donnée à passer à la requête pour ajouter une visite

### Exemple & données disponibles

- http://portager.loc/api/profile/2

---

## POTAGER

### URL : **`/api/potagers`**

- **GET** : obtenir tous les potagers -- retourne Array

### URL : **`/api/profile/{userId}`**

Méthodes HTTP disponibles :
- **GET** : obtenir un seul profil -- retourne Objet
- **PATCH** : modification d'un profil (mise à jour)
- **DELETE** : suppression d'un profil

### URL : **`/api/potager/new`**

- **PUT** : création d'un nouveau profil - user_id fourni par *Auth*

### URL : **`/api/profile/{userId}/visit`**

-  **POST** : aucune donnée à passer à la requête pour ajouter une visite

### Exemple & Données disponibles

- http://portager.loc/api/potager/4

---

## PLANT

### URL : **`/api/plants`**

- **GET** : Obtenir tous les plants -- retourne Array

### **`/api/plant/{plantId}`**

- **GET** : Obtenir un plant -- retourne Objet
- **PATCH** : modification d'un plant (mise à jour)
- **DELETE** : suppression d'un plant

### **`/api/plant/new`**

- **PUT** : création d'un nouveau profil - **passer `potager_id`** dans la Request.

### URL : **`/api/plant/{plantId}/visit`**

-  **POST** : aucune donnée à passer à la requête pour ajouter une visite.

### Exemple & Données disponibles

- http://portager.loc/api/plant/4

---

## TYPE DE PLANTS

### URL : **`/type-plants/all`**

- **GET** : Retourne (Array) tous les types de plants disponibles

___

## ÉVALUATIONS

> Remplacer [entitée] par `profile`, `potager` ou `plant`

### URL : **`/evaluation/[entitée]/{[entitée]Id}`**

Méthodes HTTP :
- **GET** : Obtenir toutes les évaluations pour l'entitée -- retour un Array
- **PUT** : ajout d'une note et commentaire (facultatif) à l'entitée

### URL : **`/evaluation/[entitée]/avg/{[entitée]Id}`**

- **GET** : Obtenir la note moyenne pour l'entitée -- SAUF PLANT.

### URL : **`/evaluation/[entitée]/{commentId}`**

- **DELETE** - Supprimer l'évaluation - **ATTENTION**, le paramètre ici est le ID du commentaire.
