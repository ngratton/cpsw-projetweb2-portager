import Vue from 'vue';
import VueRouter from 'vue-router';
import Accueil from './views/Accueil';
import Potager from './views/Potager';
import Monpotager from './views/Monpotager';
import ProfilUtilisateur from './views/ProfilUtilisateur';
import Inscription from './views/Inscription'
import Connexion from './views/Connexion'
import Echange from './views/Echange'
import EchangeRevue from './views/EchangeRevue'
import Inscriptionjardinier from './views/InscriptionJardinier'
import Inscriptionpotager from './views/InscriptionPotager'
import Recherche from './views/Recherche'
import PageNotFound from './views/PageNotFound'
import Plant from './views/Plant'
import Carte from './views/Carte'
import Categories from './views/Categories'

Vue.use(VueRouter);

export default new VueRouter({

    routes: [

        {
            path: '/',
            name: 'Accueil',
            component: Accueil,
            meta: {
                title: 'Portager | Cultivez votre sens du partage',
            },
        },

        {
            path: '/inscription',
            name: 'Inscription',
            component: Inscription,
            meta: {
                title: 'Inscription | Portager | Cultivez votre sens du partage',
            },
        },

        {
            path: '/connexion',
            name: 'Connexion',
            component: Connexion,
            props(route) {
                return  route.query || {}
            },
            meta: {
                title: 'Connexion | Portager | Cultivez votre sens du partage',
            },
        },

        {
            path: '/potager/:userID',
            name: 'Potager',
            component: Potager,
            meta: {
                title: 'Potager | Portager | Cultivez votre sens du partage',
            },
        },

        {
            path: '/mon-potager',
            name: 'Monpotager',
            component: Monpotager,
            meta: {
                title: 'Mon potager | Portager | Cultivez votre sens du partage',
            },
        },

        {
            path: '/profil',
            name: 'ProfilUtilisateur',
            component: ProfilUtilisateur,
            meta: {
                title: 'Profil | Portager | Cultivez votre sens du partage',
            },
        },

        {
            path: '/inscription/creation-profil/:id',
            name: 'InscriptionJardinier',
            component: Inscriptionjardinier,
            meta: {
                title: 'Profil | Portager | Cultivez votre sens du partage',
            },
        },

        {
            path: '/inscription/creation-potager/:id',
            name: 'InscriptionPotager',
            component: Inscriptionpotager,
            meta: {
                title: 'Profil | Portager | Cultivez votre sens du partage',
            },
        },

        {
            path: '/echange',
            name: 'Echange',
            component: Echange,
            props(route) {
                return  route.query || {}
            },
            meta: {
                title: 'Proposer un échange | Portager | Cultivez votre sens du partage',
            },
        },

        {
            path: '/echange/:echange_id',
            name: 'EchangeRevue',
            component: EchangeRevue,
            meta: {
                title: "Résume de l'échange | Portager | Cultivez votre sens du partage",
            },
        },

        {
            path: '/plant/:plant_id',
            name: 'Plant',
            component: Plant,
            meta: {
                title: "Plant | Portager | Cultivez votre sens du partage",
            },
        },

        {
            path: '/recherche',
            name: 'Recherche',
            component: Recherche,
            meta: {
                title: "Résultats de recherche | Portager | Cultivez votre sens du partage",
            },
        },

        {
            path: "*",
            name: '404',
            component: PageNotFound,
            meta: {
                title: "Oops... Erreur 404 | Portager | Cultivez votre sens du partage",
            }
        },

        {
            path: '/carte',
            name: 'Carte',
            component: Carte,
            meta: {
                title: "Carte des potagers | Portager | Cultivez votre sens du partage",
            },
        },

        {
            path: '/categories',
            name: 'Categories',
            component: Categories,
            meta: {
                title: "Filtre par catégories | Portager | Cultivez votre sens du partage",
            },
        },

    ],
    mode: 'history',
});


