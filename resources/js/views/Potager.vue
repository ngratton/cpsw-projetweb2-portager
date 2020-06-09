

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
        <div class="row">
            <div class="col" id="adminTitre">
                <h3>Dans ce potager...</h3>
            </div>
        </div>
        <div class="row contentPotager">
            <div class="col">
                <carte-potager></carte-potager>
            </div>
            <div class="col">
                <carte-potager></carte-potager>
            </div>
            <div class="col">
                <carte-potager></carte-potager>
            </div>
            <div class="col-6" id="carte">
                <img class="img-responsive img-center" src="/images/carte.png">
            </div>
            <div class="w-100"></div>
        </div>
        <div class="row contentPotager">
            <div class="col">
               <carte-potager></carte-potager>
            </div>
            <div class="col">
               <carte-potager></carte-potager>
            </div>
            <div class="col">
                <carte-potager></carte-potager>
            </div>
            <div class="col">
                <carte-potager></carte-potager>
            </div>
            <div class="col">
               <carte-potager></carte-potager>
            </div>
            <div class="w-100"></div>
        </div>
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
                data: 0,
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

        },
        methods: {

        },
    }
</script>
