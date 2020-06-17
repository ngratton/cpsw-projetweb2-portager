export default {
    getCookie() {
        return axios.get('sanctum/csrf-cookie')
    }
}
