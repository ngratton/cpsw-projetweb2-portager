import axios from 'axios'

let Api = axios.create({
    baseURL: '/api'
})

axios.defaults.withCredentials = true;

export default Api
