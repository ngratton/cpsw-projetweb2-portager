import Vue from 'vue';
import VueRouter from 'vue-router';
import Accueil from './views/Accueil';
import Potager from './views/Potager';

Vue.use(VueRouter);

export default new VueRouter({

    routes: [
        
        { 
        path: '/',
        name: Accueil,
        component: Accueil
        },

        { 
        path: '/potager',
        name: Potager,
        component: Potager
        },
        
    ],
    mode: 'history'
});