import Vue from 'vue';
import router from './router.js';

require('./bootstrap');

const app = new Vue({
    el: '#app',
    router,
    data: {
        //
    },
    methods: {
        //
    },
    watch: {
        $route: {
            immediate: true,
            handler(to, from) {
                document.title = to.meta.title || 'Portager - Cultivez votre sens du partage';
            }
        },
    }
});
