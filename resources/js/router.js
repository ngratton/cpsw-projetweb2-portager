import Vue from 'vue';
import VueRouter from 'vue-router';
import Accueil from './views/Accueil';
import Potager from './views/potager';
import Monpotager from './views/Monpotager';
import ProfilUtilisateur from './views/ProfilUtilisateur';
import Inscription from './views/Inscription'
import Connexion from './views/Connexion'
import Echange from './views/Echange'
import EchangeRevue from './views/EchangeRevue'
import InscriptionJardinier from './views/InscriptionJardinier'
import InscriptionPotager from './views/InscriptionPotager'

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
            path: '/potager/:userID',
            name: 'Potager',
            component: Potager,
            meta: {
                title: 'Potager | Portager | Cultivez votre sens du partage',
            },
        },

        {
            path: '/monpotager',
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

    ],
    mode: 'history',
});


