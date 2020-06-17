<div style="text-align: center; background-color: #F0FBFF; border-radius: 16px; margin: 20px;">
    <img src="https://nicholasgratton.com/img/portager_noir_100px.png" style="height: 80px; text-align: center; margin: 20px;">
</div>

# **Portager** | Projet Web 2 | Cobayes Media

## **INSTALLATION**

### Setup de l'environnement de dev

1. Cloner le repo de GitHub **ou** faire un `pull` du `master` dans VS Code.
2. Créer un VirtualHost dans WAMP; le nommer `portager.loc` (!important) et le pointer sur le dossier `/public`
3. Taper `composer install` dans le Terminal de VS Code
4. Copier *`.env.exemple`* et renommer ***`.env`***
5. Ajouter ou ajouter les lignes suivantes :
    - `SESSION_DOMAIN=portager.loc`
	- `SESSION_DRIVER=cookie`
    - `SANCTUM_STATEFUL_DOMAINS=portager.loc`
6. Taper `php artisan key:generate` dans le Terminal
7. Taper `npm install && npm run dev` dans le Terminal

### Créer une base de données

> Si ce n'est pas déjà fait (première utilisation)

1. Ouvrir phpMyAdmin
2. Créer un table de données "projweb2_portager"
3. Modifier le fichier ***.env*** pour y ajouter `projweb2_portager` à la ligne *`DB_DATABASE=`*

---

## **DÉVELOPPEMENT**

### À chaque fois, avant de développer

1. Faire un pull de GitHub -- reprendre la branche sur laquelle vous travailliez *ou* bien en créer une nouvelle. **NE PAS TRAVAILLER SUR LE *MASTER***.
2. Pour s'assurer d'avoir les dernières informations dans votre base de données locale, refaire les migrations et les seeders. 
    - `php artisan migrate:refresh --seed`
> Un lot de plants, potagers et utilisateurs sont configuré dans le seeder pour qu'on ait en permanance de le donnée avec laquelle travailler.

    > Possible que vous ayez une erreur à ce stade-ci.
    > - Exécuter la commande `composer dump-autoload`
    > - Puis, réexécutez `php artisan migrate:refresh -seed`.

3. Commencer le développement
    - `npm run watch`

### À chaque fois qu'un feature ou que la journée est terminée

1. Faire un `commit` des changements (Stage changes)
2. Faire un `push` pour les fichiers sur GitHub
3. Lorsque le feature est terminé, faire un `merge` de la branche avec le `master`.
