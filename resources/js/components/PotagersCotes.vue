<template>

<div>
    <div class="row mt-5 mb-3"> <!-- Plants les mieux côtés -->
        <div class="col">
            <h3>Potagers les mieux côtés</h3>
        </div>
    </div>

    <div class="row d-flex align-items-stretch">
        <carte-potager
            v-for="(potager,index) in potagers"
            :key="index"
            :potager="potager"

        ></carte-potager>

        <div class="col">
            <div class="card h-100">
                <router-link tag="div" :to="`/potagers`" class="h-100 d-flex align-items-center justify-content-center">
                    <span>Plus...</span>
                </router-link>
            </div>
        </div>
    </div>
</div>

</template>

<script>
import CartePotager from '../components/CartePotager'

    export default {
        name: 'PotagersCotes',
        data() {
            return {
                potagers: {},
            };
        },
        components: {
            CartePotager,
        },
        mounted() {
            this.fetchPotagers()
        },
        methods: {
            fetchPotagers() {
                axios.get('/api/potagers/mieux-cotes/accueil').then(resp => {
                    this.potagers = resp.data
                })
            }
        },
    }
</script>
