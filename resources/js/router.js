import Vue from 'vue';
import VueRouter from 'vue-router';
import Accueil from './views/Accueil';

Vue.use(VueRouter);

export default new VueRouter({

    routes: [
        
        { 
        path: '/',
        name: Accueil,
        component: Accueil
        }
    ],
    mode: 'history'
});