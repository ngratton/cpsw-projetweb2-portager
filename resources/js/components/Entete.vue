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
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{name: 'Echange'}">Échange</router-link>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

</template>

<script>
    export default {
        name: 'Entete',
        data() {
            return {
                data: 0,
            };

        },
        props: {

        },
        components: {

        },
        mounted() {

        },
        methods: {

        },
    }
</script>

<style lang="scss">

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
