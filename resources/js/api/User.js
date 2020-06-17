import axios from 'axios'
import Csrf from './Csrf'

export default {
    async inscription(form) {
        await Csrf.getCookie()

        return axios.post('/register', form)
    },

    async connexion(form) {
        await Csrf.getCookie()

        return axios.post('/login', form)
    },

    async deconnexion() {
        await Csrf.getCookie()

        return axios.post('/logout')
    },
}
