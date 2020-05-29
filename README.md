<div style="text-align: center; background-color: #F0FBFF; border-radius: 16px; margin: 20px;">
    <img src="https://nicholasgratton.com/img/portager_noir_100px.png" style="height: 80px; text-align: center; margin: 20px;">
</div>

# **Portager** | Projet Web 2 | Cobayes Media

## **INSTALLATION**

### Setup de l'environnement de dev

1. Cloner le repo avec VS Code
2. Taper `composer install` dans le Terminal de VS Code
3. Copier *.env.exemple* et renommer ***.env***
4. Taper `php artisan key:generate` dans le Terminal
5. Taper `npm install && npm dev run` dans le Terminal
6. Soit configurer Wamp avec un VirtualHost pointant au dossier "/public" ou taper `php artisan serve` dans le Terminal.

### Créer une base de données

1. Ouvrir phpMyAdmin
2. Créer un table de données "projweb2_portager"
3. Modifier le fichier ***.env*** pour y ajouter `projweb2_portager` à la ligne *`DB_DATABASE=`*

---

## **DÉVELOPPEMENT**

### À chaque fois, avant de développer

1. Faire un pull de GitHub -- reprendre la branche sur laquelle vous travailliez *ou* bien en créer une nouvelle. **NE PAS TRAVAILLER SUR LE *MASTER***.
2. Pour s'assurer d'avoir les dernières informations dans votre base de données locale, refaire les migrations et les seeders.
    - `php artisan migrate:refresh -seed`
3. Commencer le développement
    - `npm run watch`

### À chaque fois qu'un feature ou que la journée est terminée

1. Faire un `commit` des changements (Stage changes)
2. Faire un `push` pour les fichiers sur GitHub
