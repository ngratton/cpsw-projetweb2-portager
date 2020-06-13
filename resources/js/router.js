import Vue from 'vue';
import VueRouter from 'vue-router';
import Accueil from './views/Accueil';
import Potager from './views/Potager';
import ProfilUtilisateur from './views/ProfilUtilisateur';
import Inscription from './views/Inscription'
import Connexion from './views/Connexion'

Vue.use(VueRouter);

export default new VueRouter({

    routes: [

        {
        path: '/',
        name: 'Accueil',
        component: Accueil,
        },

        {
        path: '/inscription',
        name: 'Inscription',
        component: Inscription,
        },

        {
        path: '/connexion',
        name: 'Connexion',
        component: Connexion,
        },

        {
        path: '/potager',
        name: 'Potager',
        component: Potager,
        },

        {
        path: '/profil',
        name: 'ProfilUtilisateur',
        component: ProfilUtilisateur,
        },

    ],
    mode: 'history'
});
