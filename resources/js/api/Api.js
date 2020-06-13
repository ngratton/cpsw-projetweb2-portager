import axios from 'axios'

let Api = axios.create({
    baseURL: 'http://portager.localhost/api'
})

axios.defaults.withCredentials = true;

export default Api
