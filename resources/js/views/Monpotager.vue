

<template>
    <div>
     <entete></entete>
    <div class="container-fluid" id="bannerPotager">
        <div class="container">
            <div class="row"> <!--banner-->
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <recherche></recherche>
    </div>
    <div class="container">
        <un-potager></un-potager>
    </div>
    <pied-page></pied-page>
    </div>
</template>

<script>
    import Entete from '../components/Entete';
    import Recherche from '../components/Recherche';
    import UnPotager from '../components/UnPotager';
    import CartePotager from '../components/CartePotager';
    import PiedPage from '../components/PiedPage';
    export default {
        name: 'Potager',
        data() {
            return {
                userid: null,
            };

        },
        props: {

        },
        components: {
            Entete,
            Recherche,
            UnPotager,
            CartePotager,
            PiedPage,
        },
        mounted() {
            this.userid = this.$store.state.user.id
        },
        methods: {
           
        },
    }
</script>
