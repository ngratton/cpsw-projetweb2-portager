<div style="text-align: center; background-color: #F0FBFF; border-radius: 16px; border: 3px solid #9FCC3B; margin: 20px;">
    <img src="https://nicholasgratton.com/img/portager_noir_100px.png" style="height: 80px; text-align: center; margin: 20px;">
</div>

# **DOCUMENTATION**

## Table des matières
1. Utilisateurs par défault
2. API
    - [Profil utilisateur](#profil-utilisateur)
    - [Potager](#potager)

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

# API

À ce stade-ci, n'importe qui peut avoir accès à l'API. Aucune mesure de sécurité n'a été implantée. À voir selon l'avancement du projet, comme ce n'est pas une requête explicite dans le devis.

## PROFIL UTILISATEUR

URL : **/api/profile/{userId}**

Méthodes HTTP disponibles :
- **GET** -- obetnir un seul profil
- **PUT** -- création d'un nouveau profil
- **PATCH** -- modification d'un profil (mise à jour)
- **DELETE** -- suppression d'un profil

Ajout d'une visite au profil
- URL : **/api/profile/{userId}/visit**
- Méthode : **POST** -- aucune donnée à passer à la requête

### Exemple & données disponibles
Taper ce URI dans votre navigateur : **/api/profile/2**

## POTAGER

URL : **/api/profile/{userId}**

Méthodes HTTP disponibles :
- **GET** -- obetnir un seul profil
- **PUT** -- création d'un nouveau profil
- **PATCH** -- modification d'un profil (mise à jour)
- **DELETE** -- suppression d'un profil

Ajout d'une visite au profil
- URL : **/api/profile/{userId}/visit**
- Méthode : **POST** -- aucune donnée à passer à la requête
