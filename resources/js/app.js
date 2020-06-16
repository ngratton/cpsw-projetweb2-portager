import Vue from 'vue';
import router from './router.js';

require('./bootstrap');

const app = new Vue({
    el: '#app',
    components: {

    },
    router,
    data: {
        active_user: {},
    },
    methods: {
        getActiveUser(user) {
            this.active_user = user
        }
    },
    watch: {
        $route: {
            immediate: true,
            handler(to, from) {
                document.title = to.meta.title || 'Some Default Title';
            }
        },
    }
});
