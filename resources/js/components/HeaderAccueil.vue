<template lang="">
    <div class="container-fluid d-flex align-items-center headerAccueilLoggedout" :class="{ headerAccueilLoggedin : isLogged }">
        <div class="container">
            <div class="row h-100">
                <div class="col-md-4">
                    <h1 class="mb-4">Cultivez votre sens du partage</h1>
                    <div v-if="!isLogged">
                        <router-link :to="{ name: 'Inscription' }">
                            <button type="button" class="btn btn-primary mt-2">
                                S'enregistrer
                            </button>
                        </router-link><br />
                        <router-link :to="{ name: 'Connexion' }">
                            <button type="button" class="btn btn-tertiary mt-2">
                                Se connecter
                            </button>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'HeaderAccueil',
    data() {
        return {
            //
        }
    },
    computed: {
        isLogged() {
            return this.$store.state.logged_in
        },
    }
}
</script>

<style lang="scss" scoped>
    .headerAccueilLoggedout {
        color: white;
        z-index: -5;
        height: 480px;
        background-image: linear-gradient(to right, rgba(0,0,0, 0.8), rgba(255,255,255, 0)), url('/images/hero/accueil-logged-out.jpg');
        background-position: 0% 38%;
        background-size: cover;

        button {
            min-width: 175px;
        }
    }

    .headerAccueilLoggedin {
        color: white;
        z-index: -5;
        height: 340px;
        background-image: linear-gradient(to right, rgba(0,0,0, 0.8), rgba(255,255,255, 0)), url('/images/hero/accueil-logged-in.jpg');
        background-position: 0% 28%;
        background-size: cover;
    }
</style>
