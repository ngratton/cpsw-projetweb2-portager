import Api from './Api'
import Csrf from './Csrf'

export default {
    async inscription(form) {
        await Csrf.getCookie()

        return Api.post('/inscription', form)
    },

    async connexion(form) {
        await Csrf.getCookie()

        return Api.post('/connexion', form)
    },

    async deconnexion() {
        await Csrf.getCookie()

        return Api.post('/deconnexion')
    },
}
