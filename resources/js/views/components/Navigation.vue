<template>
    <div class="container" id="colHeader">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="col">
                <img src="/images/portager_noir.svg">
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <a class="nav-link" href="#">Plants</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Carte des potagers</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Boutique</a>
                </li>
            </ul>
            </div>
            <button
                @click.prevent="deconnexion"
                v-if="is_connected"
                >Déconnexion</button>
        </nav>
    </div>
</template>

<script>
import User from '../../api/User'

export default {
    name: 'navigation',
    data() {
        return {
            is_connected: false,
        }
    },
    mounted() {
        if(localStorage.getItem('auth') == 'true') {
            this.is_connected = true
        }
    },
    methods: {
        deconnexion() {
            User.deconnexion().then(() => {
                localStorage.removeItem('auth')
                this.$router.go()
            })
        }
    }
}
</script>

<style lang="sass">

</style>
