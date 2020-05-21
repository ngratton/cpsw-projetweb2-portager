# Portager

## Déploiement de l'environnement dev
Rappel amical.

1. Cloner le repo avec VS Code
2. Taper "composer install" dans le Terminal de VS Code
3. Copier *.env.exemple* et renommer ***.env***
4. Taper "php artisan key:generate" dans le Terminal
5. Soit configurer Wamp avec un VirtualHost menant au dossier "/public" ou taper "php artisan serve" dans le Terminal.

## Créer une base de données

1. Ouvrir phpMyAdmin
2. Créer un table de données "projweb2_portager"
3. Modifier le fichier ***.env*** pour y ajouter le nom de la DB à la ligne *DB_DATABASE=*
