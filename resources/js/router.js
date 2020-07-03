import Vue from 'vue';
import VueRouter from 'vue-router';
import Accueil from './views/Accueil';
import Potager from './views/Potager';
import ProfilUtilisateur from './views/ProfilUtilisateur';
import Inscription from './views/Inscription'
import Connexion from './views/Connexion'
import Echange from './views/Echange'
import EchangeRevue from './views/EchangeRevue'
import InscriptionJardinier from './views/InscriptionJardinier'
import InscriptionPotager from './views/InscriptionPotager'
import Recherche from './views/Recherche'
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
            meta: {
                title: 'Connexion | Portager | Cultivez votre sens du partage',
            },
        },

        {
            path: '/potager',
            name: 'Potager',
            component: Potager,
            meta: {
                title: 'Potager | Portager | Cultivez votre sens du partage',
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
            path: '/inscriptionjardinier',
            name: 'InscriptionJardinier',
            component: InscriptionJardinier,
            meta: {
                title: 'Profil | Portager | Cultivez votre sens du partage',
            },
        },

        {
            path: '/inscriptionpotager',
            name: 'InscriptionPotager',
            component: InscriptionPotager,
            meta: {
                title: 'Profil | Portager | Cultivez votre sens du partage',
            },
        },

        {
            path: '/echange',
            name: 'Echange',
            component: Echange,
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
            path: '/recherche',
            name: 'Recherche',
            component: Recherche,
            meta: {
                title: "Résultats de recherche | Portager | Cultivez votre sens du partage",
            },
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


