<template>

    <div>
        <div class="container" id="">
            <nav class="navbar navbar-expand-lg navbar-light">
                <router-link :to="{name: 'Accueil'}">
                    <img src="/images/portager_noir.svg" id="logo-principal">
                </router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/categories">Catégories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/carte">Carte des potagers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://boutique.portager.app">Boutique</a>
                        </li>
                    </ul>
                </div>

                <div v-if="isLogged" class="col d-flex align-items-center justify-content-end">
                    <span class="mr-3 d-sm">Bonjour {{ utilisateur }} !</span>
                    <div class="dropdown">
                        <button class="dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/images/user.svg" alt="user" id="profile-dropdown">
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="dropdownMenuButton">
                            <router-link to="/mon-potager" class="dropdown-item">Mon potager</router-link>
                            <router-link to="/mes-echanges" class="dropdown-item">Mes échanges</router-link>
                            <div class="dropdown-divider"></div>
                            <router-link to="/messagerie" class="dropdown-item">Messagerie</router-link>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" @click.prevent="deconnexion">Déconnexion</a>
                        </div>
                    </div>
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
                utilisateur: null,
            };
        },
        mounted() {
            this.$store.state.user ? this.utilisateur = this.$store.state.user.first_name : this.utilisateur = 'visiteur'
        },
        methods: {
            deconnexion() {
                User.deconnexion()
                    .then(resp => {
                        console.log(resp)
                        this.$store.dispatch('logout')
                        this.$router.go()
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
    .navbar {
        width: 100%;
    }

    #dropdownMenuButton {
        padding: 0;
        border: 0;
        width: 20px;
        height: 20px;

        #profile-dropdown {
            width: 20px;
            height: auto;
        }
    }

    .bonjour {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    #logo-principal {
        height: 60px;
        max-height: 60px;
        margin: 15px 40px 15px 0;
        width: auto;
    }

    .nav-item {
        margin-right: 15px;
    }
</style>
