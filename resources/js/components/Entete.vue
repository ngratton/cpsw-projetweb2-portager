<template>

    <div>
        <div class="container" id="colHeader">
            <nav class="navbar navbar-expand-lg navbar-light">
                <router-link :to="{name: 'Accueil'}">
                    <img src="/images/portager_noir.svg" id="logo-principal">
                </router-link>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Plants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Carte des potagers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://boutique.portager.app">Boutique</a>
                        </li>
                        <li class="text-danger nav-item">
                            <a v-if="isLogged" class="nav-link" @click.prevent="deconnexion">Déconnexion</a>
                        </li>
                    </ul>
                </div>

                <div v-if="isLogged" class="col-2 bonjour">
                    <p>Bonjour {{ utilisateur }} </p>
                    <!-- <img src="/images/notifs.svg" alt="notifs"> -->
                    <img src="/images/user.svg" alt="user">
                </div>
            </nav>
        </div>
    </div>

</template>

<script>
    import User from '../api/User'

    export default {
        name: 'Entete',
        data() {
            return {
                utilisateur: this.$store.state.user.first_name,
            };

        },
        props: {
            //
        },
        components: {
            //
        },
        mounted() {
            //
        },
        methods: {
            deconnexion() {
                User.deconnexion()
                    .then(() => {
                        this.$store.dispatch('logout')
                        // this.$router.go()
                    })
            },
        },
        computed: {
            isLogged() {
                return this.$store.state.logged_in
            }
        }
    }
</script>

<style lang="scss">

    .bonjour {
        display: flex;
        position: relative;
        top: 10px;
        right: -250px;
    }

    .bonjour > p {
        margin-right: 30px;
    }

    #colHeader > nav > div.col-2.bonjour > img:nth-child(2),#colHeader > nav > div.col-2.bonjour > img:nth-child(3) {
        padding-right: 10px;
        width: 40px;
        height: 40px;
    }

    #colHeader {
        display: flex;
        flex-direction: row;
        width: 100%;
        height: 100px;
    }

    #logo-principal {
        height: 60px;
        max-height: 60px;
        margin-right: 50px;
        width: auto;
    }

    .nav-item {
        margin-right: 15px;
    }
</style>
