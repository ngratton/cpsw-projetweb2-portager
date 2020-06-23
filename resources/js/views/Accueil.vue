<template>


<div>

     <entete></entete>
    <div class="container-fluid" id="banner">
        <div class="container">
            <div class="row"> <!--banner-->
                <div class="col">
                    <h1>Nam urna erat,<br>tempor at auctor.</h1>
                    <router-link :to="{ name: 'Inscription' }">
                        <button type="button" class="btn btn-primary">
                            S'enregistrer
                        </button>
                    </router-link><br />
                    <router-link :to="{ name: 'Connexion' }">
                        <button type="button" class="btn btn-tertiary">
                            Se connecter
                        </button>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <recherche></recherche>
    </div>
    <div class="container" id="content">
        <div class="row" id="nouveauxPlants"> <!-- Nouveaux plants -->
            <div class="col">
                <h3>Nouveaux plants près de chez vous</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
               <nouveau-plant></nouveau-plant>
            </div>
            <div class="row">
                <div class="col offset-2">
                    <img class="pubAccueil" src="/images/ad_768-90.png">
                </div>
            </div>
        </div>
            <div class="row" id="cotePlants"> <!-- Plants les mieux côtés -->
            <div class="col">
                <h3>Potagers les mieux côtés</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <plant-cote></plant-cote>
            </div>
            <div class="row" id="merch"> <!-- Marchandise -->
                <div class="col-lg">
                    <h3>Montrez fièrement votre sens du partage !</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <img src="/images/Plants_placeholders/green-bean.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nom produit</h5>
                            <p class="card-text" style="text-align: right;">Prix</p>
                            <button type="button" class="btn btn-secondary">Acheter</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="populaire"> <!-- Plants Populaire -->
                <div class="col">
                    <h3>Plants les plus populaires</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <plant-populaire></plant-populaire>
            </div>
            <div class="row" id="plus">
                <div class="col offset-5">
                    <button type="button" class="btn btn-primary">En voir plus...</button>
                </div>
            </div>
        </div>
    </div>
    <pied-page></pied-page>
</div>


</template>

<script>
    import Messagerie from '../components/Messagerie';
    import Entete from '../components/Entete';
    import Recherche from '../components/Recherche';
    import PiedPage from '../components/PiedPage';
    import PlantCote from '../components/PlantCote';
    import NouveauPlant from '../components/NouveauPlant';
    import PlantPopulaire from '../components/PlantPopulaire';
    export default {
        name: 'Accueil',
        data() {
            return {
                data: 0,
            };

        },
        props: {

        },
        components: {
            Messagerie,
            Entete,
            Recherche,
            NouveauPlant,
            PlantCote,
            PlantPopulaire,
            PiedPage,
        },
        mounted() {

        },
        methods: {

        },
    }
</script>
