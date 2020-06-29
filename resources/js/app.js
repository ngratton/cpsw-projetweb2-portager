import Vue from 'vue'
import Vuex from 'vuex'
import router from './router.js'
import createPersistedState from 'vuex-persistedstate'

require('./bootstrap');

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        logged_in: false,
        user: null,
    },
    mutations: {
        logsIn(state, user) {
            state.logged_in = true
            state.user = user
        },
        logsOut(state) {
            state.logged_in = false
            state.user = null
        }
    },
    actions: {
        logsIn({ commit }, user) {
            commit('logsIn', user)
        },
        logOut({ commit }) {
            commit('logsOut')
        }
    },
    plugins: [
        createPersistedState({
            storage: window.sessionStorage,
        })
    ]
})

import { mapState } from 'vuex'

const app = new Vue({
    el: '#app',
    router,
    store,
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
        $store: {

        },
    },
    computed: mapState([
        'user',
    ])
});
