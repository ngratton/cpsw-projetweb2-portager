import Vue from 'vue';
import VueRouter from 'vue-router';
import Accueil from './views/Accueil';
import Potager from './views/Potager';
import ProfilUtilisateur from './views/ProfilUtilisateur';
import Inscription from './views/Inscription'
import Connexion from './views/Connexion'
import InscriptionJardinier from './views/InscriptionJardinier'

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

    ],
    mode: 'history',
});


