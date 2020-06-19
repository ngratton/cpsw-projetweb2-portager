<template>

    <div>
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
                <a class="nav-link" href="https://boutique.portager.app">Boutique</a>
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
